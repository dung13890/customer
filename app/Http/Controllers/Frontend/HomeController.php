<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\CategoryRepository;

class HomeController extends FrontendController
{
    public function __construct(CategoryRepository $category)
    {
        parent::__construct($category);
    }

    public function index()
    {
        $this->view = 'home.index';
        $this->compacts['heading'] = __('repositores.home');

        return $this->viewRender();
    }
}
