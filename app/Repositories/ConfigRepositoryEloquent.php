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
            'name' => 'required|min:4|max:255',
            'email' => 'required|email|min:4|max:255',
            'phone' => 'required|min:4|max:255',
            'address' => 'required|min:4|max:255',
            'logo' => 'nullable|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
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

    public function findByKey($key)
    {
        return $this->model->where('key', $key)->first();
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
