<?php

namespace App\Repositories;

use App\Contracts\Repositories\MenuRepository;
use App\Traits\ValidatableTrait;
use App\Eloquent\Menu;

class MenuRepositoryEloquent extends AbstractRepositoryEloquent implements MenuRepository
{
    use ValidatableTrait;

    protected $rules = [
        'store' => [
            'name' => 'required|min:2|max:30',
            'locked' => 'sometimes|boolean',
            'type' => 'required|in:product,post,introduce,distributor,recruitment,investor,link',
            'url' => 'required',
            'sort' => 'required|integer|max:50',
        ],
        'update' => [
            'name' => 'required|min:2|max:30',
            'locked' => 'sometimes|boolean',
            'type' => 'required|in:product,post,introduce,distributor,recruitment,investor,link',
            'url' => 'required',
            'sort' => 'required|integer|max:50',
        ],
    ];

    public function __construct(Menu $category)
    {
        parent::__construct($category);
    }

    public function attributes()
    {
        return [
            'name' => __('repositories.label.name'),
            'locked' => __('repositories.label.locked'),
            'sort' => __('repositories.label.sort'),
            'type' => __('repositories.label.type'),
            'url' => __('repositories.label.url'),
        ];
    }

    public function getData($columns = ['*'])
    {
        return $this->model->orderBy('sort')->get($columns);
    }

    public function getDataLimit($limit, $columns = ['*'])
    {
        return $this->model->where('locked', false)->orderBy('sort')->take($limit)->get($columns);
    }

    public function findByType($type)
    {
        return $this->model->where('type', $type)->first();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function destroy($id)
    {
        return $this->model->where('id', $id)->delete();
    }
}
