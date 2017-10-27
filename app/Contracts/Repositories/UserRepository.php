<?php

namespace App\Contracts\Repositories;

use App\Contracts\Traits\ValidatableInterface;

interface UserRepository extends ValidatableInterface
{
    public function attributes();
    public function find($id);
    public function store($data);
    public function update(array $data, $id);
    public function destroy($id);
}
