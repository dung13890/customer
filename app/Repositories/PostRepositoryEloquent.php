<?php

namespace App\Repositories;

use App\Contracts\Repositories\PostRepository;
use App\Traits\ValidatableTrait;
use App\Eloquent\Post;

class PostRepositoryEloquent extends AbstractRepositoryEloquent implements PostRepository
{
    use ValidatableTrait;

    protected $rules = [
        'store' => [
            'name' => 'required|min:2|max:100',
            'ceo_title' => 'nullable|max:100',
            'ceo_description' => 'nullable|max:200',
            'ceo_keywords' => 'nullable|max:150',
            'image'=> 'required|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            'category_id' => 'required|integer|not_in:0',
            'type' => 'required|in:post,article',
        ],
        'update' => [
            'name' => 'required|min:2|max:100',
            'ceo_title' => 'nullable|max:100',
            'ceo_description' => 'nullable|max:200',
            'ceo_keywords' => 'nullable|max:150',
            'image'=> 'nullable|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            'category_id' => 'required|integer|not_in:0',
        ],
    ];

    public function __construct(Post $post)
    {
        parent::__construct($post);
    }

    public function attributes()
    {
        return [
            'name' => __('repositories.label.name'),
            'ceo_title' => __('repositories.label.ceo_title'),
            'ceo_description' => __('repositories.label.ceo_description'),
            'ceo_keywords' => __('repositories.label.ceo_keywords'),
            'image' => __('repositories.label.image'),
            'category_id' => __('repositories.category.name'),
            'category_ids' => __('repositories.label.category_ids'),
        ];
    }

    public function getDataByCategory($id, $limit, $columns = ['*'])
    {
        return $this->model
            ->where('category_id', $id)
            ->where('locked', false)
            ->take($limit)
            ->orderBy('updated')
            ->get($columns);
    }

    public function getDataByRand($limit, $columns)
    {
        return $this->model->inRandomOrder()
            ->where('locked', false)
            ->take($limit)
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
        return $this->model->find($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->model->where('id', $id)->delete();
    }
}
