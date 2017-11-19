<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\PageRepository;
use App\Contracts\Repositories\PostRepository;
use App\Contracts\Repositories\CategoryRepository;

class PageController extends FrontendController
{
    protected $repoPost;

    public function __construct(PageRepository $page, PostRepository $post, CategoryRepository $category)
    {
        parent::__construct($page);
        $this->repoPost = $post;
        $this->repoCate = $category;
    }

    public function show($slug)
    {
        $this->compacts['class'] = 'single-post';
        $item = $this->repository->findBySlug($slug);
        $this->view = $item->type == 'distributor' ? 'page.distributor' : 'page.show';
        $this->compacts['item'] = $item;
        $this->compacts['heading'] = $item->ceo_title;
        $this->compacts['description'] = $item->ceo_description;
        $this->compacts['keywords'] = $item->ceo_keywords;
        $this->compacts['image_social'] = route('image', $item->image_small);

        $this->compacts['posts'] = $this->repoPost->getDataByRand(4, ['name', 'image', 'slug', 'ceo_description']);
        $this->compacts['category'] = $this->repoCate->getFirstByRand('post', ['name', 'id']);

        return $this->viewRender();
    }
}
