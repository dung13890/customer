<?php

namespace App\Http\Controllers\Backend;

use Bouncer;
use Illuminate\Http\Request;
use Silber\Bouncer\Database\Role;

class RoleController extends BackendController
{
    protected $abilities;
    protected $role;

    public function __construct(Role $role)
    {
        parent::__construct($role);
        $this->abilities = Bouncer::Ability()->all()->groupBy(function ($item, $key) {
            $parts = explode('-', $item->name);
            $item->name = __('repositories.title.' . $parts[1]) . '-' . __('repositories.' . $parts[0] . '.name');

            return __('repositories.' . $parts[0] . '.name');
        });
        $this->role = $role;
        $this->repositoryName = 'role';
    }

    public function index(Request $request)
    {
        $this->before(__FUNCTION__, $this->role);
        parent::__index();
        $this->compacts['roles'] = Bouncer::Role()->with('abilities')->get();

        return $this->viewRender();
    }

    public function create()
    {
        $this->before(__FUNCTION__, $this->role);
        parent::__create();
        $this->compacts['abilities'] = $this->abilities;

        return $this->viewRender();
    }

    public function store(Request $request)
    {
        $this->before(__FUNCTION__, $this->role);
        $request->validate([
                'name' => 'required|alpha_dash|min:4|max:255',
                'ability_ids' => 'required',
            ],
            [], [
                'name' => __('repositories.label.name'),
                'ability_ids' => __('repositories.label.ability_ids'),
            ]
        );
        $data = $request->only(['name', 'ability_ids']);

        return $this->doRequest(function () use ($data) {
            Bouncer::allow($data['name'])->to($data['ability_ids']);
        }, __FUNCTION__);
    }

    public function edit($id)
    {
        $this->before(__FUNCTION__, $this->role);
        parent::__edit($id);
        $this->compacts['abilities'] = $this->abilities;

        return $this->viewRender();
    }

    public function update(Request $request, $id)
    {
        $this->before(__FUNCTION__, $this->role);
        $request->validate([
                'name' => 'required|alpha_dash|min:4|max:255',
                'ability_ids' => 'required',
            ],
            [], [
                'name' => __('repositories.label.name'),
                'ability_ids' => __('repositories.label.ability_ids'),
            ]
        );
        $data = $request->only(['name', 'ability_ids']);

        return $this->doRequest(function () use ($data, $id) {
            $item = Bouncer::Role()->findOrFail($id);
            $item->update(['name' => $data['name']]);
            if (isset($data['ability_ids'])) {
                $item->abilities()->sync($data['ability_ids']);
            }
        }, __FUNCTION__);
    }

    public function destroy($id)
    {
        $this->before(__FUNCTION__, $this->role);
        return $this->doRequest(function () use ($id) {
            $item = Bouncer::Role()->findOrFail($id);
            if ($id == 1) {
                throw new \Exception();
            }
            $item->delete();
        }, __FUNCTION__);
    }
}
