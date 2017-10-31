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
        $item = $this->repository->findBySlug($slug);
        $this->compacts['item'] = $item;
        $this->compacts['heading'] = $item->ceo_title;
        $this->compacts['description'] = $item->ceo_description;
        $this->compacts['keywords'] = $item->ceo_keywords;
        $this->compacts['image_social'] = route('image', $item->image_small);

        return $this->viewRender();
    }
}
