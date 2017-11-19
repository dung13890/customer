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
            'icon'=> 'nullable|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            'type' => 'required|in:product,post,article,introduce,distributor,recruitment,investor',
        ],
        'update' => [
            'name' => 'required|min:2|max:100',
            'image'=> 'nullable|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            'banner'=> 'nullable|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            'icon'=> 'nullable|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
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
            'icon' => __('repositories.label.icon'),
            'type' => __('repositories.label.type'),
        ];
    }

    public function getDataByType($type, $columns = ['*'])
    {
        return $this->model->where('type', $type)->get($columns);
    }

    public function getDataIsPage($columns = ['*'])
    {
        return $this->model->where('is_page', true)->get($columns);
    }

    public function getLimitByType($type, $limit, $columns = ['*'])
    {
        return $this->model
            ->where('type', $type)
            ->where('locked', false)
            ->where('id', '<>', config('common.category.id_system')[1])
            ->take($limit)
            ->orderBy('updated_at', 'desc')
            ->get($columns);
    }

    public function getHome($limit, $type, $with = [], $columns = ['*'])
    {
        return $this->model->with($with)
            ->where('is_home', true)
            ->where('locked', false)
            ->where('type', $type)
            ->take($limit)
            ->orderBy('updated_at', 'desc')
            ->get($columns);
    }

    public function getFirstByRand($type, $columns = ['*'])
    {
        return $this->model
            ->where('locked', false)
            ->where('type', $type)
            ->inRandomOrder()
            ->first($columns);
    }

    public function getLimitWithOut($type, $limit, $id, $columns = ['*'])
    {
        return $this->model
            ->where('locked', false)
            ->where('type', $type)
            ->where('id', '<>', $id)
            ->take($limit)
            ->inRandomOrder()
            ->get($columns);
    }

    public function findBySlug($slug)
    {
        return $this->model->findBySlugOrFail($slug);
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
