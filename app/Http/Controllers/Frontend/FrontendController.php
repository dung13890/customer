<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\AbstractController;

class FrontendController extends AbstractController
{
    protected $prefix = 'frontend.';

    public function viewRender($view = null)
    {
        $view = $view ?: $this->view;

        return view($this->prefix . $view, $this->compacts);
    }
}
