<?php

namespace App\Repositories;

use App\Contracts\Repositories\ImageRepository;
use App\Traits\ValidatableTrait;
use App\Eloquent\Image;

class ImageRepositoryEloquent extends AbstractRepositoryEloquent implements ImageRepository
{
    use ValidatableTrait;

    protected $rules = [
        'store' => [
        ],
        'update' => [
        ],
    ];

    public function __construct(Image $image)
    {
        parent::__construct($image);
    }

    public function attributes()
    {
        return [
            'name' => __('repositories.label.name'),
        ];
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
    }

    public function destroy($id)
    {
        return $this->model->where('id', $id)->delete();
    }
}
