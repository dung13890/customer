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

    public function getLimitRoot($type, $limit, $with = [], $columns = ['*'])
    {
        return $this->model->with($with)
            ->where('type', $type)
            ->where('locked', false)
            ->where('parent_id', 0)
            ->take($limit)
            ->orderBy('updated_at', 'desc')
            ->get($columns);
    }

    public function getDataByIds(array $ids, $with = [], $columns = ['*'])
    {
        return $this->model->with($with)
            ->whereIn('id', $ids)
            ->orderBy('id')
            ->get($columns);
    }

    public function getHome($limit, $type, $with = [], $columns = ['*'])
    {
        return $this->model->with($with)
            ->where('is_home', true)
            ->where('locked', false)
            ->where('type', $type)
            ->where('parent_id', 0)
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
