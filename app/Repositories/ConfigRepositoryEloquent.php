<?php

namespace App\Repositories;

use App\Contracts\Repositories\ConfigRepository;
use App\Traits\ValidatableTrait;
use App\Eloquent\Config;

class ConfigRepositoryEloquent extends AbstractRepositoryEloquent implements ConfigRepository
{
    use ValidatableTrait;

    protected $rules = [
        'store' => [

        ],
        'update' => [

        ],
    ];

    public function __construct(Config $config)
    {
        parent::__construct($config);
    }

    public function attributes()
    {
        return [

        ];
    }

    public function getData($columns = ['*'])
    {
        return $this->model->get($columns);
    }

    public function find($id)
    {
    }

    public function store($data)
    {
    }

    public function update(array $data, $id)
    {
    }

    public function destroy($id)
    {
    }
}
