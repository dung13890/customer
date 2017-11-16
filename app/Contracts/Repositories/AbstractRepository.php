<?php

namespace App\Contracts\Repositories;

interface AbstractRepository
{
    public function datatables($columns = ['*'], $with = []);
    public function attributes();
    public function find($id);
    public function store($data);
    public function update(array $data, $id);
    public function destroy($id);
}
