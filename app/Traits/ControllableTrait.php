<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ControllableTrait
{
    public function validation(Request $request, $action = 'store', $item = null)
    {
        $request->validate(
            $this->repository->validation($action, $item),
            [],
            $this->repository->attributes()
        );
    }
}
