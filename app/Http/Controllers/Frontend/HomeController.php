<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\CategoryRepository;
use App\Contracts\Repositories\PageRepository;
use App\Contracts\Repositories\SlideRepository;
use App\Contracts\Repositories\ContactRepository;

class HomeController extends FrontendController
{
    protected $repoPage;
    protected $repoSlide;
    protected $repoContact;

    public function __construct(CategoryRepository $category, PageRepository $page, SlideRepository $slide, ContactRepository $contact)
    {
        parent::__construct($category);
        $this->repoPage = $page;
        $this->repoSlide = $slide;
        $this->repoContact = $contact;
    }

    public function index()
    {
        $this->view = 'home.index';
        $this->compacts['slides'] = $this->repoSlide->getData(5, ['image', 'name']);
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

        return redirect(route('home'));
    }
}
