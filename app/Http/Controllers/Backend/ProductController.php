<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\Repositories\ProductRepository;
use App\Contracts\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Jobs\Product\StoreJob;
use App\Jobs\Product\UpdateJob;
use App\Jobs\Product\DestroyJob;
use App\Traits\ControllableTrait;

class ProductController extends BackendController
{
    use ControllableTrait;

    protected $repoCategory;
    protected $dataSelect = ['id', 'name', 'ceo_keywords', 'locked', 'slug'];
    protected $categorySelect = ['id', 'name', 'parent_id'];

    public function __construct(ProductRepository $product, CategoryRepository $category)
    {
        parent::__construct($product);
        $this->repoCategory = $category;
    }

    public function index(Request $request)
    {
        parent::__index();
        $this->compacts['categories'] = $this->repoCategory->getRootByType('product', $this->categorySelect)->pluck('name', 'id')->prepend('---', 0);
        if ($request->ajax() && $request->has('datatables')) {
            $params = $request->all();
            $datatables = \DataTables::of($this->repository->datatables($this->dataSelect));
            $this->filterDatatable($datatables, $params, function ($query, $params) {
                if (array_has($params, 'category_id') && $params['category_id']) {
                    $query->byCategory($params['category_id']);
                }
            });

            return $this->columnDatatable($datatables)->make(true);
        }

        return $this->viewRender();
    }
}
