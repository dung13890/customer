<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class ProductController extends FrontendController
{
    public function show($slug)
    {
        $this->view = 'product.index';
        $this->compacts['heading'] = __('repositores.product');

        return $this->viewRender();
    }
}
