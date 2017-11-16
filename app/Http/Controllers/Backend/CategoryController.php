<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Jobs\Category\StoreJob;
use App\Jobs\Category\UpdateJob;
use App\Jobs\Category\DestroyJob;
use App\Traits\ControllableTrait;

class CategoryController extends BackendController
{
    use ControllableTrait;

    protected $dataSelect = ['id', 'name', 'type', 'locked'];

    protected function indexRender($type, $action = 'create')
    {
        if (!in_array($type, config('common.category.type'))) {
            abort(403);
        }
        $this->view = $this->repositoryName . '.index';
        $this->compacts['heading'] = __('repositories.title.category') . ' ' . __('repositories.title.' . $type);
        $this->compacts['action'] = __('repositories.title.' . $action);
        $this->compacts['items'] = $this->repository->getDataByType($type, $this->dataSelect);

        return $this->viewRender();
    }

    public function __construct(CategoryRepository $category)
    {
        parent::__construct($category);
    }

    public function type($type)
    {
        $this->compacts['type'] = $type;

        return $this->indexRender($type);
    }

    public function store(Request $request)
    {
        $this->validation($request, __FUNCTION__);
        $data = $request->all();

        return $this->doRequest(function () use ($data) {
            return $this->dispatch(new StoreJob($data));
        }, __FUNCTION__, false, url()->previous());
    }

    public function edit($id)
    {
        parent::__edit($id);

        return $this->indexRender($this->compacts['item']->type, 'edit');
    }

    public function update(Request $request, $id)
    {
        $item = $this->repository->find($id);
        $this->validation($request, __FUNCTION__, $item);
        $data = $request->all();

        return $this->doRequest(function () use ($data, $item) {
            return $this->dispatch(new UpdateJob($data, $item));
        }, __FUNCTION__, false, url()->previous());
    }

    public function destroy($id)
    {
        return $this->doRequest(function () use ($id) {
            $status = $this->dispatch(new DestroyJob($id));
            if (!$status) {
                throw new \Exception();
            }
        }, __FUNCTION__);
    }
}
