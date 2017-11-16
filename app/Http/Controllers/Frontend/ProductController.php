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
        $this->view = 'product.show';
        $item = $this->repository->findBySlug($slug);
        $this->compacts['item'] = $item;
        $this->compacts['class'] = 'single-product';
        $this->compacts['heading'] = $item->ceo_title;
        $this->compacts['description'] = $item->ceo_description;
        $this->compacts['keywords'] = $item->ceo_keywords;
        $this->compacts['image_social'] = route('image', $item->image_small);

        $this->compacts['categories'] = $item->categories;

        return $this->viewRender();
    }

    public function search(Request $request)
    {
        $this->view = "product.search";
        $this->compacts['value'] = $request->keyword;
        $this->compacts['productSearch'] = $this->repository->model
            ->byKeywords($this->compacts['value'])
            ->orderBy('id','DESC')
            ->take(9)
            ->get();

        return $this->viewRender();
    }
}
