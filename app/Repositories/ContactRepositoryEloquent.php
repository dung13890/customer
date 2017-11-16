<?php

namespace App\Repositories;

use App\Contracts\Repositories\ContactRepository;
use App\Traits\ValidatableTrait;
use App\Eloquent\Contact;

class ContactRepositoryEloquent extends AbstractRepositoryEloquent implements ContactRepository
{
    use ValidatableTrait;

    protected $rules = [
        'store' => [
        ],
        'update' => [
        ],
    ];

    public function __construct(Contact $contact)
    {
        parent::__construct($contact);
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
