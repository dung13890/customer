<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\PostRepository;
use App\Contracts\Repositories\CategoryRepository;

class PostController extends FrontendController
{
    protected $repoCate;

    public function __construct(PostRepository $post, CategoryRepository $category)
    {
        parent::__construct($post);
        $this->repoCate = $category;
    }

    public function show($slug)
    {
        $this->view = 'post.index';
        $this->compacts['class'] = 'single-post';
        $item = $this->repository->findBySlug($slug);
        $this->compacts['item'] = $item;
        $this->compacts['heading'] = $item->ceo_title;
        $this->compacts['description'] = $item->ceo_description;
        $this->compacts['keywords'] = $item->ceo_keywords;
        $this->compacts['image_social'] = route('image', $item->image_small);

        $this->compacts['posts'] = $this->repository->getDataByRand(4, ['name', 'image', 'slug', 'ceo_description']);
        $this->compacts['category'] = $this->repoCate->getFirstByRand('post', ['name', 'id']);

        return $this->viewRender();
    }
}
