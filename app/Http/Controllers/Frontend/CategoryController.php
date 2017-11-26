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
                $item->is_page ? $this->landingPage($item) : $this->products($item);
                break;
            case 'introduce':
            case 'distributor':
            case 'recruitment':
            case 'investor':
                $this->pages($item);
                break;
        }

        return $this->viewRender();
    }

    protected function posts($item)
    {
        $this->view = 'category.post';
        $this->compacts['slides'] = $this->repoSlide->getDataByType(5, 'slide', ['image', 'name']);
        $this->compacts['item'] = $item;
        $this->compacts['heading'] = $item->name;
        $this->compacts['categories'] = $this->repository->getLimitWithOut('post', 3, $item->id, ['name', 'slug', 'id']);
    }

    protected function products($item)
    {
        $this->compacts['item'] = $item;
        $this->compacts['products'] = $item->products()->paginate(9);
        $this->compacts['heading'] = $item->name;
        $this->view = 'category.product';
    }

    protected function pages($item)
    {
        $this->view = 'category.page';
        $this->compacts['pages'] = $item->pages;
        $this->compacts['heading'] = $item->name;
    }

    protected function landingPage($item)
    {
        $this->compacts['class'] = 'landing-page';
        $this->compacts['item'] = $item;
        $this->compacts['heading'] = $item->name;
        $this->view = 'category.landingpage';
    }

    public function ajaxDistributor(Request $request)
    {
        $code = $request->code;
        $item = $this->repository->getDistributorByCode($code, ['name', 'slug', 'description']);

        return response()->json([
            'status' => $item ? true : false,
            'item' => $item ?: null,
        ]);
    }
}
