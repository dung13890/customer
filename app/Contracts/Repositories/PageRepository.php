<?php

namespace App\Contracts\Repositories;

use App\Contracts\Traits\ValidatableInterface;

interface PageRepository extends ValidatableInterface
{
    public function findBySlug($slug);
    public function getHome($limit, $columns = ['*']);
    public function getDataLimit($type, $limit, $columns = ['*']);
}
