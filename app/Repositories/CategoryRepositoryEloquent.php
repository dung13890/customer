<?php

namespace App\Repositories;

use App\Contracts\Repositories\CategoryRepository;
use App\Traits\ValidatableTrait;
use App\Eloquent\Category;

class CategoryRepositoryEloquent extends AbstractRepositoryEloquent implements CategoryRepository
{
    use ValidatableTrait;

    protected $rules = [
        'store' => [
            'name' => 'required|min:2|max:100',
            'locked' => 'sometimes|boolean',
            'image'=> 'nullable|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            'banner'=> 'nullable|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            'type' => 'required|in:product,post,page',
        ],
        'update' => [
            'name' => 'required|min:2|max:100',
            'image'=> 'nullable|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            'banner'=> 'nullable|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            'locked' => 'sometimes|boolean',
        ],
    ];

    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

    public function attributes()
    {
        return [
            'name' => __('repositories.label.name'),
            'locked' => __('repositories.label.locked'),
            'image' => __('repositories.label.image'),
            'banner' => __('repositories.label.banner'),
            'type' => __('repositories.label.type'),
        ];
    }

    public function getDataByType($type, $columns = ['*'])
    {
        return $this->model->where(function ($query) use ($type) {
            if ($type) {
                $query->where('type', $type);
            }
        })->get($columns);
    }

    public function getRootByType($type, $columns = ['*'])
    {
        return $this->model->with(['children' => function ($query) use ($columns) {
            $query->select($columns);
        }])->where('parent_id', 0)->where(function ($query) use ($type) {
            if ($type) {
                $query->where('type', $type);
            }
        })->get($columns);
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
