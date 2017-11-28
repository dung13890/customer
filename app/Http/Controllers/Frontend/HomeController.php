<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\CategoryRepository;
use App\Contracts\Repositories\ContactRepository;
use App\Contracts\Repositories\CommentRepository;
use App\Contracts\Repositories\PageRepository;
use App\Contracts\Repositories\SlideRepository;

class HomeController extends FrontendController
{
    protected $repoPage;
    protected $repoSlide;
    protected $repoContact;
    protected $repoComment;

    public function __construct(
        CategoryRepository $category,
        PageRepository $page,
        SlideRepository $slide,
        ContactRepository $contact,
        CommentRepository $comment
    ) {
        parent::__construct($category);
        $this->repoPage = $page;
        $this->repoSlide = $slide;
        $this->repoContact = $contact;
        $this->repoComment = $comment;
    }

    public function index()
    {
        $this->view = 'home.index';
        $this->compacts['is_home'] = true;
        $this->compacts['slides'] = $this->repoSlide->getDataByType(5, 'slide', ['image', 'name']);
        $this->compacts['productCategories'] = $this->repository->getHome(9, 'product', [], ['image', 'slug', 'name']);
        $this->compacts['postCategories'] = $this->repository->getHome(3, 'post', [], ['id', 'image', 'slug', 'name']);
        $this->compacts['pages'] = $this->repoPage->getHome(3, ['id', 'name', 'slug', 'image']);

        return $this->viewRender();
    }

    public function contact(Request $request)
    {
        if ($request->name) {
            $data = $request->only($this->repoContact->model->getFillable());
            $this->repoContact->store($request->all());
        }

        return redirect(route('home.page.contact'))->with('message', __('repositories.text.message_contact'));
    }

    public function comment(Request $request)
    {
        if ($request->name) {
            $data = $request->only(['name', 'email', 'content', 'url']);
            $data['url'] = parse_url($data['url'], PHP_URL_PATH);
            $data['commentable_id'] = $request->type_id;
            $type = $request->type;
            switch ($type) {
                case 'post':
                    $data['commentable_type'] = \App\Eloquent\Post::class;
                    break;
                case 'product':
                    $data['commentable_type'] = \App\Eloquent\Product::class;
                    break;
                case 'page':
                    $data['commentable_type'] = \App\Eloquent\Page::class;
                    break;
            }
            \Cache::forget('countComment');
            $this->repoComment->store($data);
        }

        return redirect()->back()->with('message', __('repositories.text.message_comment'));
    }

    public function pageContact()
    {
        $this->view = 'home.contact';
        $this->compacts['heading'] = __('repositories.title.contact');

        return $this->viewRender();
    }
}
