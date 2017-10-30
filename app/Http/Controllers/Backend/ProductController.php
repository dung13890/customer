<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\Repositories\ProductRepository;
use App\Contracts\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Jobs\Product\StoreJob;
use App\Jobs\Product\UpdateJob;
use App\Jobs\Product\DestroyJob;
use App\Jobs\Media\ImageStoreJob;
use App\Traits\ControllableTrait;
use Illuminate\Http\Response;

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

    public function create()
    {
        parent::__create();
        $this->compacts['rootCategories'] = $this->repoCategory->getRootByType('product', $this->categorySelect);

        return $this->viewRender();
    }

    public function store(Request $request)
    {
        $this->validation($request, __FUNCTION__);
        $data = $request->all();

        return $this->doRequest(function () use ($data) {
            $this->dispatch(new StoreJob($data));
        }, __FUNCTION__);
    }

    public function edit($id)
    {
        parent::__edit($id);
        $this->compacts['rootCategories'] = $this->repoCategory->getRootByType('product', $this->categorySelect);
        $this->compacts['images'] = $this->compacts['item']->images;

        return $this->viewRender();
    }

    public function update(Request $request, $id)
    {
        $item = $this->repository->find($id);
        $this->validation($request, __FUNCTION__, $item);
        $data = $request->all();

        return $this->doRequest(function () use ($data, $item) {
            return $this->dispatch(new UpdateJob($data, $item));
        }, __FUNCTION__);
    }

    public function imageStore(Request $request)
    {
        $this->validation($request, __FUNCTION__);
        $data = $request->only('name', 'src', 'size', 'type');

        try {
            $result = $this->dispatch(new ImageStoreJob($data));
        } catch (\Exception $e) {
            return response()->json(__('repositories.actions.imatestore.unsuccessfully'), Response::HTTP_PAYMENT_REQUIRED);
        }

        return $result;
    }
}
