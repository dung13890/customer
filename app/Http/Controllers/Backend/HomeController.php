<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Contracts\Services\MediaInterface;

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

    public function summernoteImage(Request $request, MediaInterface $service)
    {
        $path = $service->summernote($request->all());

        return [
            'url' => route('image', app()['glide.builder']->getUrl($path))
        ];
    }
}
