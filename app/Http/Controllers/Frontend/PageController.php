<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\PageRepository;

class PageController extends FrontendController
{
    public function __construct(PageRepository $page)
    {
        parent::__construct($page);
    }

    public function show($slug)
    {
        $this->view = 'page.index';
        $this->compacts['item'] = $this->repository->findBySlug($slug);
        $this->compacts['heading'] = $this->compacts['item']->name;

        return $this->viewRender();
    }
}
