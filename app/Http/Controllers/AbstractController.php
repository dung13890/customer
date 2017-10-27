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
}
