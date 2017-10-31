<?php

namespace App\Contracts\Repositories;

use App\Contracts\Traits\ValidatableInterface;

interface PageRepository extends ValidatableInterface
{
    public function getDataByCategory($id, $limit, $columns = ['*']);
    public function findBySlug($slug);
    public function getHome($limit, $columns = ['*']);
    public function getLimit($limit, $columns = ['*'], $orderBy = 'desc');
}
