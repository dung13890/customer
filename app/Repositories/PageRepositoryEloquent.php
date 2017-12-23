<?php

namespace App\Repositories;

use App\Contracts\Repositories\PageRepository;
use App\Traits\ValidatableTrait;
use App\Eloquent\Page;

class PageRepositoryEloquent extends AbstractRepositoryEloquent implements PageRepository
{
    use ValidatableTrait;

    protected $rules = [
        'store' => [
            'name' => 'required|min:2|max:175',
            'ceo_title' => 'nullable|max:200',
            'ceo_description' => 'nullable|max:250',
            'ceo_keywords' => 'nullable|max:150',
            'image'=> 'nullable|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            'file' => 'nullable|mimes:pdf,xls,xlsx,doc,docx',
            'create_dt' => 'required|date_format:d/m/Y H:i',
            'type' => 'required|in:introduce,distributor,recruitment,investor',
        ],
        'update' => [
            'name' => 'required|min:2|max:175',
            'ceo_title' => 'nullable|max:200',
            'ceo_description' => 'nullable|max:250',
            'ceo_keywords' => 'nullable|max:150',
            'create_dt' => 'required|date_format:d/m/Y H:i',
            'image'=> 'nullable|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            'file' => 'nullable|mimes:pdf,xls,xlsx,doc,docx',
        ],
    ];

    public function __construct(Page $page)
    {
        parent::__construct($page);
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
            'create_dt' => __('repositories.label.create_dt'),
        ];
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getHome($limit, $columns = ['*'])
    {
        return $this->model
            ->where('locked', false)
            ->where('is_home', true)
            ->take($limit)
            ->orderBy('updated_at', 'desc')
            ->get($columns);
    }

    public function getDataLimit($type, $limit, $columns = ['*'])
    {
        return $this->model
            ->where('locked', false)
            ->where('type', $type)
            ->take($limit)
            ->orderBy('updated_at', 'desc')
            ->get($columns);
    }

    public function findBySlug($slug)
    {
        return $this->model->findBySlugOrFail($slug);
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
