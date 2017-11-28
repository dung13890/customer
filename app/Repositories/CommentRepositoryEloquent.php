<?php

namespace App\Repositories;

use App\Contracts\Repositories\CommentRepository;
use App\Traits\ValidatableTrait;
use App\Eloquent\Comment;

class CommentRepositoryEloquent extends AbstractRepositoryEloquent implements CommentRepository
{
    use ValidatableTrait;

    protected $rules = [
        'store' => [
        ],
        'update' => [
        ],
    ];

    public function __construct(Comment $comment)
    {
        parent::__construct($comment);
    }

    public function attributes()
    {
    }

    public function getCommentUnRead()
    {
        return $this->model->where('is_read', false)->orderBy('id', 'desc')->get(['id']);
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
