<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class AbstractController extends Controller
{
    protected $repository;

    protected $repositoryName;

    protected $user;

    protected $compacts;

    public function __construct($repository = null)
    {
        $this->repositorySetup($repository);
        $this->middleware(function ($request, $next) {
            $this->user = $request->user($this->getGuard());

            return $next($request);
        });
    }

    protected function repositorySetup($repository = null)
    {
        $this->repository = $repository;
        $this->repositoryName = $repository ? strtolower(class_basename($repository->model)) : null;
    }

    protected function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }

    protected function before($action, $object = null)
    {
        switch ($action) {
            case 'index':
            case 'show':
            case 'type':
                $action = 'read';
                break;
            case 'create':
            case 'store':
                $action = 'create';
                break;
            case 'edit':
            case 'update':
                $action = 'edit';
                break;
            case 'destroy':
                $action = 'destroy';
                break;
        }

        if (!$object && $this->repository) {
            $object = $this->repository->model;
        }

        if ($this->user->cannot($action, $object)) {
            return abort(Response::HTTP_FORBIDDEN, __('repositories.text.forbiden_to_perform'));
        }

        return true;
    }
}
