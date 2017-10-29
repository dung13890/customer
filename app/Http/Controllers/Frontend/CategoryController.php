<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\CategoryRepository;

class CategoryController extends FrontendController
{
    public function __construct(CategoryRepository $category)
    {
        parent::__construct($category);
    }

    public function show($slug)
    {
        $item = $this->repository->findBySlug($slug);
        switch ($item->type) {
            case 'post':
                $this->view = 'category.post';
                $this->compacts['item'] = $item;
                $this->compacts['heading'] = $item->name;
                break;
            case 'product':
                $this->view = 'category.product';
                $this->compacts['item'] = $item;
                $this->compacts['heading'] = $item->name;
                break;
            case 'page':
                $this->compacts['item'] = $item->pages->first();
                $this->compacts['heading'] = $this->compacts['item']->name ?? $item->name;
                $this->view = 'page.index';
                break;
        }

        return $this->viewRender();
    }
}
