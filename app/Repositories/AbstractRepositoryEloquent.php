<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepositoryEloquent
{
    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function datatables($columns = ['*'], $with = [])
    {
        return $this->model->select($columns)->with($with);
    }
}
