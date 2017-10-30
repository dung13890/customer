<?php

namespace App\Repositories;

use App\Contracts\Repositories\SlideRepository;
use App\Traits\ValidatableTrait;
use App\Eloquent\Slide;

class SlideRepositoryEloquent extends AbstractRepositoryEloquent implements SlideRepository
{
    use ValidatableTrait;

    protected $rules = [
        'store' => [
            'name' => 'required|min:2|max:50',
            'description' => 'nullable|max:200',
            'image'=> 'required|nullable|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
        ],
        'update' => [
            'name' => 'required|min:2|max:50',
            'description' => 'nullable|max:200',
            'image'=> 'nullable|nullable|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
        ],
    ];

    public function __construct(Slide $slide)
    {
        parent::__construct($slide);
    }

    public function attributes()
    {
        return [
            'name' => __('repositories.label.name'),
            'description' => __('repositories.label.description'),
            'image' => __('repositories.label.image'),
        ];
    }

    public function getData()
    {
        return $this->model->get();
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
