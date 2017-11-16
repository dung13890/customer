<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\CategoryRepository;
use App\Contracts\Repositories\SlideRepository;

class CategoryController extends FrontendController
{
    protected $repoSlide;

    public function __construct(CategoryRepository $category, SlideRepository $slide)
    {
        parent::__construct($category);
        $this->repoSlide = $slide;
    }

    public function show($slug)
    {
        $item = $this->repository->findBySlug($slug);
        switch ($item->type) {
            case 'post':
                $this->posts($item);
                break;
            case 'product':
                $this->products($item);
                break;
        }

        return $this->viewRender();
    }

    protected function posts($item)
    {
        $this->view = 'category.post';
        $this->compacts['slides'] = $this->repoSlide->getData(5, ['image', 'name']);
        $this->compacts['item'] = $item;
        $this->compacts['heading'] = $item->name;
        $this->compacts['categories'] = $this->repository->getLimitWithOut('post', 3, $item->id, ['name', 'slug', 'id']);
    }

    protected function products($item)
    {
        $this->view = 'category.product';
        $this->compacts['item'] = $item;
        $this->compacts['products'] = $item->products()->paginate(9);
        $this->compacts['heading'] = $item->name;
    }
}
