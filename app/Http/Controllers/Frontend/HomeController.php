<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\CategoryRepository;
use App\Contracts\Repositories\PageRepository;
use App\Contracts\Repositories\SlideRepository;

class HomeController extends FrontendController
{
    protected $repoPage;
    protected $repoSlide;

    public function __construct(CategoryRepository $category, PageRepository $page, SlideRepository $slide)
    {
        parent::__construct($category);
        $this->repoPage = $page;
        $this->repoSlide = $slide;
    }

    public function index()
    {
        $this->view = 'home.index';
        $this->compacts['heading'] = __('repositores.home');
        $this->compacts['slides'] = $this->repoSlide->model->all();
        
        return $this->viewRender();
    }
}
