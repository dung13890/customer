<?php

namespace App\Http\Controllers\Backend;

class HomeController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->compacts['heading'] = __('repositories.home.name');
        $this->view = 'home.index';
        return $this->viewRender();
    }
}
