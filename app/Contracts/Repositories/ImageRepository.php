<?php

namespace App\Contracts\Repositories;

use App\Contracts\Traits\ValidatableInterface;

interface ImageRepository extends ValidatableInterface
{
    public function findByIds(array $ids);
}
