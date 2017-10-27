<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepository;
use App\Traits\ValidatableTrait;
use App\Eloquent\User;

class UserRepositoryEloquent extends AbstractRepositoryEloquent implements UserRepository
{
    use ValidatableTrait;

    protected $rules = [
        'store' => [
            'name' => "required|min:4|max:255",
            'username' => "required|alpha_dash|min:4|max:255|unique:users",
            'email' => "required|email|max:255|unique:users",
            'password' => 'required|alpha_dash|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ],
        'update' => [
            'name' => "required|min:4|max:255",
            'username' => "required|alpha_dash|min:4|max:255|unique:users,username,{id}",
            'email' => "required|email|max:255|unique:users,email,{id}",
            'password' => 'confirmed|alpha_dash|min:6',
            'password_confirmation' => 'min:6',
        ],
    ];

    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function attributes()
    {
        return [
            'name' => __('repositories.label.name'),
            'username' => __('repositories.label.username'),
            'email' => __('repositories.label.email'),
            'password' => __('repositories.label.password'),
            'password_confirmation' => __('repositories.label.password_confirmation'),
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
        return $this->model->find($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->model->where('id', $id)->delete();
    }
}
