<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\Repositories\PostRepository;
use App\Contracts\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Jobs\Post\StoreJob;
use App\Jobs\Post\UpdateJob;
use App\Jobs\Post\DestroyJob;
use App\Traits\ControllableTrait;

class PostController extends BackendController
{
    use ControllableTrait;

    protected $repoCategory;
    protected $dataSelect = ['id', 'name', 'ceo_keywords', 'locked', 'slug'];
    protected $categorySelect = ['id', 'name', 'parent_id'];

    public function __construct(PostRepository $post, CategoryRepository $category)
    {
        parent::__construct($post);
        $this->repoCategory = $category;
    }

    public function index(Request $request)
    {
        parent::__index();
        $this->compacts['categories'] = $this->repoCategory->getRootByType('post', $this->categorySelect)->pluck('name', 'id')->prepend('---', 0);
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
        $this->compacts['categories'] = $this->repoCategory->getRootByType('post', $this->categorySelect)->pluck('name', 'id')->prepend('---', 0);
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
        $this->compacts['categories'] = $this->repoCategory->getRootByType('post', $this->categorySelect)->pluck('name', 'id');
        $this->compacts['rootCategories'] = $this->repoCategory->getRootByType('product', $this->categorySelect);

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

    public function destroy($id)
    {
        return $this->doRequest(function () use ($id) {
            return $this->dispatch(new DestroyJob($id));
        }, __FUNCTION__);
    }
}
