<?php

namespace App\Contracts\Repositories;

use App\Contracts\Traits\ValidatableInterface;

interface MenuRepository extends ValidatableInterface
{
    public function getData($columns = ['*']);
    public function getDataLimit($limit, $columns = ['*']);
    public function findByType($type);
}
