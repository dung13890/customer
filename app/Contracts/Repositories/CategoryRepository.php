<?php

namespace App\Contracts\Repositories;

use App\Contracts\Traits\ValidatableInterface;

interface CategoryRepository extends ValidatableInterface
{
    public function getDataByType($type, $columns = ['*']);
    public function getDataIsPage($columns = ['*']);
    public function getLimitByType($type, $limit, $columns = ['*']);
    public function findBySlug($slug);
    public function getHome($limit, $type, $with = [], $columns = ['*']);
    public function getFirstByRand($type, $columns = ['*']);
    public function getLimitWithOut($type, $limit, $id, $columns = ['*']);
    public function getDistributorByCode($code, $columns = ['*']);
    public function getCodeDistributor();
}
