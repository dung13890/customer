<?php

namespace App\Contracts\Repositories;

use App\Contracts\Traits\ValidatableInterface;

interface CommentRepository extends ValidatableInterface
{
    public function getCommentUnRead();
}
