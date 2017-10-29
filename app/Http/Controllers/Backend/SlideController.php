<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\SlideRepository;
use App\Jobs\Slide\StoreJob;
use App\Jobs\Slide\UpdateJob;
use App\Jobs\Slide\DestroyJob;
use App\Traits\ControllableTrait;

class SlideController extends BackendController
{
    use ControllableTrait;

    protected $dataSelect = ['id', 'name', 'description', 'locked'];

    public function __construct(SlideRepository $slide)
    {
        parent::__construct($slide);
    }

    public function index(Request $request)
    {
        parent::__index();

        if ($request->ajax() && $request->has('datatables')) {
            $params = $request->all();
            $datatables = \DataTables::of($this->repository->datatables($this->dataSelect));
            $this->filterDatatable($datatables, $params);

            return $this->columnDatatable($datatables)->make(true);
        }

        return $this->viewRender();
    }

    public function create()
    {
        parent::__create();

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
