<?php

namespace App\Contracts\Repositories;

use App\Contracts\Traits\ValidatableInterface;

interface ProductRepository extends ValidatableInterface
{
    public function findBySlug($slug);
    public function getDataByCategory($id, $limit, $columns = ['*']);
    public function getDataByPaginate($paginate, $columns = ['*']);
}
