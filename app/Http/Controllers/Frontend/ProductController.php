<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\ProductRepository;

class ProductController extends FrontendController
{
    public function __construct(ProductRepository $product)
    {
        parent::__construct($product);
    }

    public function show($slug)
    {
        $this->view = 'product.index';
        $this->compacts['item'] = $this->repository->findBySlug($slug);
        $this->compacts['heading'] = $this->compacts['item']->name;
        $this->compacts['image'] = $this->compacts['item']->image;
        $this->compacts['advantage'] = $this->compacts['item']->advantage;
        $this->compacts['coordination'] = $this->compacts['item']->coordination;
        $this->compacts['information'] = $this->compacts['item']->information;
        $this->compacts['conduct'] = $this->compacts['item']->conduct;
        $this->compacts['produce'] = $this->compacts['item']->produce;

        return $this->viewRender();
    }
}
