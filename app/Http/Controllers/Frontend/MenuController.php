<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\PageRepository;
use App\Contracts\Repositories\MenuRepository;
use App\Contracts\Repositories\CategoryRepository;
use App\Contracts\Repositories\ProductRepository;
use Illuminate\Http\Response;

class MenuController extends FrontendController
{
    protected $menuRepo;
    protected $cateRepo;
    protected $prodRepo;

    public function __construct(PageRepository $page, MenuRepository $menu, CategoryRepository $category, ProductRepository $product)
    {
        parent::__construct($page);
        $this->menuRepo = $menu;
        $this->cateRepo = $category;
        $this->prodRepo = $product;
    }

    public function index($type, $code = null)
    {
        switch ($type) {
            case 'introduce':
            case 'distributor':
            case 'recruitment':
            case 'investor':
                return $this->listPage($type, $code);
                break;
            case 'product':
                return $this->listProduct();
                break;
            case 'post':
                $slug = $this->cateRepo->find(config('common.category.id_system')[0])->slug;
                return app('App\Http\Controllers\Frontend\CategoryController')->show($slug);
                break;
            default:
                return abort(Response::HTTP_NOT_FOUND);
                break;
        }
    }

    protected function listPage($type, $code = null)
    {
        $this->view =  $type == 'distributor' ? 'menu.distributor' : 'menu.category';
        if ($type == 'distributor') {
            if ($code && !in_array($code, array_keys(config('common.districts')))) {
                abort(403);
            }
            $this->compacts['distributor'] = $this->cateRepo->getDistributorByCode($code, ['name', 'slug', 'description']);
            $this->compacts['distributorCds'] = $this->cateRepo->getCodeDistributor()->pluck('district_cd');
            $this->compacts['distributorCd'] = $code;
        }
        $this->compacts['categories'] = $this->cateRepo->getLimitByType($type, 15, ['name', 'slug', 'image', 'banner', 'description']);
        $this->compacts['heading'] = $this->menuRepo->findByType($type)->name;

        return $this->viewRender();
    }

    protected function listProduct()
    {
        $this->view = 'category.product';
        $item = $this->cateRepo->find(config('common.category.id_system')[1]);
        $this->compacts['item'] = $item;
        $this->compacts['products'] = $this->prodRepo->getDataByPaginate(9);
        $this->compacts['heading'] = $item->name;

        return $this->viewRender();
    }
}
