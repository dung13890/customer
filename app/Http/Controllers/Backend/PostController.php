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
    protected $dataSelect = ['id', 'name', 'ceo_keywords', 'locked', 'category_id', 'slug'];
    protected $categorySelect = ['id', 'name'];

    public function __construct(PostRepository $post, CategoryRepository $category)
    {
        parent::__construct($post);
        $this->repoCategory = $category;
    }

    public function type(Request $request, $type)
    {
        $this->before(__FUNCTION__);
        if (!in_array($type, config('common.post.type'))) {
            abort(403);
        }
        parent::__index();
        $this->compacts['type'] = $type;
        $this->compacts['categories'] = $this->repoCategory->getDataByType($type, $this->categorySelect)->pluck('name', 'id')->prepend('---', 0);
        if ($request->ajax() && $request->has('datatables')) {
            $params = $request->all();
            $datatables = \DataTables::of($this->repository->datatables($this->dataSelect, ['category'])->where('type', $type));
            $this->filterDatatable($datatables, $params, function ($query, $params) {
                if (array_has($params, 'category_id') && $params['category_id']) {
                    $query->byCategory($params['category_id']);
                }
            });

            return $this->columnDatatable($datatables)
            ->addColumn('category', function ($item) {
                return $item->category->name;
            })->make(true);
        }

        return $this->viewRender();
    }

    public function create($type)
    {
        $this->before(__FUNCTION__);
        parent::__create();
        $this->compacts['type'] = $type;
        $this->compacts['categories'] = $this->repoCategory->getDataByType($type, $this->categorySelect)->pluck('name', 'id')->prepend('---', 0);

        return $this->viewRender();
    }

    public function store(Request $request)
    {
        $this->before(__FUNCTION__);
        $this->validation($request, __FUNCTION__);
        $data = $request->all();
        $type = $request->type;

        return $this->doRequest(function () use ($data) {
            $this->dispatch(new StoreJob($data));
        }, __FUNCTION__, false, route($this->prefix . 'post.type', $type));
    }

    public function edit($id)
    {
        $this->before(__FUNCTION__);
        parent::__edit($id);
        $this->compacts['categories'] = $this->repoCategory->getDataByType($this->compacts['item']->type, $this->categorySelect)->pluck('name', 'id');

        return $this->viewRender();
    }

    public function update(Request $request, $id)
    {
        $this->before(__FUNCTION__);
        $item = $this->repository->find($id);
        $this->validation($request, __FUNCTION__, $item);
        $data = $request->all();

        return $this->doRequest(function () use ($data, $item) {
            return $this->dispatch(new UpdateJob($data, $item));
        }, __FUNCTION__, false, route($this->prefix . 'post.type', $item->type));
    }

    public function destroy($id)
    {
        $this->before(__FUNCTION__);
        return $this->doRequest(function () use ($id) {
            return $this->dispatch(new DestroyJob($id));
        }, __FUNCTION__);
    }
}
