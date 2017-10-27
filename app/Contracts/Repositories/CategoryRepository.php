<?php

namespace App\Contracts\Repositories;

use App\Contracts\Traits\ValidatableInterface;

interface CategoryRepository extends ValidatableInterface
{
    public function attributes();
    public function getDataByType($type, $columns = ['*']);
    public function getRootByType($type, $columns = ['*']);
    public function find($id);
    public function store($data);
    public function update(array $data, $id);
    public function destroy($id);
}
