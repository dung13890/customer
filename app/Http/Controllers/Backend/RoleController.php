<?php

namespace App\Http\Controllers\Backend;

use Bouncer;
use Illuminate\Http\Request;
use Silber\Bouncer\Database\Role;

class RoleController extends BackendController
{
    protected $abilities;

    public function __construct(Role $role)
    {
        parent::__construct($role);
        $this->abilities = Bouncer::Ability()->all()->groupBy(function ($item, $key) {
            $parts = explode('-', $item->name);
            $item->name = __('repositories.title.' . $parts[1]) . '-' . __('repositories.' . $parts[0] . '.name');

            return __('repositories.' . $parts[0] . '.name');
        });
        $this->repositoryName = 'role';
    }

    public function index(Request $request)
    {
        parent::__index();
        $this->compacts['roles'] = Bouncer::Role()->with('abilities')->get();

        return $this->viewRender();
    }

    public function create()
    {
        parent::__create();
        $this->compacts['abilities'] = $this->abilities;

        return $this->viewRender();
    }

    public function edit($id)
    {
        parent::__edit($id);
        $this->compacts['abilities'] = $this->abilities;

        return $this->viewRender();
    }
}
