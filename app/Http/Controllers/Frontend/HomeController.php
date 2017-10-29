<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\CategoryRepository;
use App\Contracts\Repositories\PageRepository;

class HomeController extends FrontendController
{
    protected $repoPage;
    public function __construct(CategoryRepository $category, PageRepository $page)
    {
        parent::__construct($category);
        $this->repoPage = $page;
    }

    public function index()
    {
        $this->view = 'home.index';
        $this->compacts['heading'] = __('repositores.home');
        //$this->compacts['pages'] = $this->repository->find(3)->pages;

        return $this->viewRender();
    }
}
