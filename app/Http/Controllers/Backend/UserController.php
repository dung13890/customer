<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Jobs\User\StoreJob;
use App\Jobs\User\UpdateJob;
use App\Jobs\User\DestroyJob;
use App\Traits\ControllableTrait;
use Bouncer;

class UserController extends BackendController
{
    use ControllableTrait;

    protected $dataSelect = ['id', 'username', 'name', 'email'];
    protected $roleList;

    public function __construct(UserRepository $user)
    {
        parent::__construct($user);
        $this->roleList = Bouncer::role()->pluck('name', 'id');
    }

    public function index(Request $request)
    {
        parent::__index();
        $this->compacts['roles'] = $this->roleList;

        if ($request->ajax() && $request->has('datatables')) {
            $params = $request->all();
            $datatables = \DataTables::of($this->repository->datatables($this->dataSelect));
            $this->filterDatatable($datatables, $params, function ($query, $params) {
                if (array_has($params, 'role_id') && $params['role_id']) {
                    $query->byRole($params['role_id']);
                }
            });

            return $this->columnDatatable($datatables)->make(true);
        }

        return $this->viewRender();
    }

    public function create()
    {
        parent::__create();
        $this->compacts['roles'] = $this->roleList;

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

    public function show($id)
    {
        parent::__show($id);

        return $this->viewRender();
    }

    public function edit($id)
    {
        $this->compacts['roles'] = $this->roleList;
        parent::__edit($id);

        return $this->viewRender();
    }

    public function update(Request $request, $id)
    {
        if (!$request->password) {
            $request->replace($request->except(['password', 'password_confirmation']));
        }

        $item = $this->repository->find($id);
        $this->validation($request, __FUNCTION__, $item);
        $data = $request->all();

        return $this->doRequest(function () use ($data, $id) {
            return $this->dispatch(new UpdateJob($data, $id));
        }, __FUNCTION__);
    }

    public function destroy($id)
    {
        return $this->doRequest(function () use ($id) {
            return $this->dispatch(new DestroyJob($id));
        }, __FUNCTION__);
    }
}
