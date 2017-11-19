<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\PageRepository;
use App\Contracts\Repositories\MenuRepository;
use App\Contracts\Repositories\CategoryRepository;

class MenuController extends FrontendController
{
    protected $menuRepo;
    protected $cateRepo;

    public function __construct(PageRepository $page, MenuRepository $menu, CategoryRepository $category)
    {
        parent::__construct($page);
        $this->menuRepo = $menu;
        $this->cateRepo = $category;
    }

    public function index($type)
    {
        switch ($type) {
            case 'introduce':
            case 'distributor':
            case 'recruitment':
            case 'investor':
                return $this->listPage($type);
                break;
            case 'product':
                $slug = $this->cateRepo->find(config('common.category.id_system')[1])->slug;
                return app('App\Http\Controllers\Frontend\CategoryController')->show($slug);
                break;
            case 'post':
                $slug = $this->cateRepo->find(config('common.category.id_system')[0])->slug;
                return app('App\Http\Controllers\Frontend\CategoryController')->show($slug);
                break;
        }
    }

    protected function listPage($type)
    {
        $this->view =  $type == 'distributor' ? 'menu.distributor' : 'menu.page';
        $this->compacts['pages'] = $this->repository->getDataLimit($type, 16);
        $this->compacts['heading'] = $this->menuRepo->findByType($type)->name;

        return $this->viewRender();
    }
}
