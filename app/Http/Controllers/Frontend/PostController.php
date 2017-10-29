<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\PostRepository;

class PostController extends FrontendController
{

    public function __construct(PostRepository $post)
    {
        parent::__construct($post);
    }

    public function show($slug)
    {
        $this->view = 'post.index';
        $this->compacts['item'] = $this->repository->findBySlug($slug);
        $this->compacts['heading'] = $this->compacts['item']->name;
        $this->compacts['description'] = $this->compacts['item']->description;
        
        return $this->viewRender();
    }
}
