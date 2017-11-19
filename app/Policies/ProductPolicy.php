<?php

namespace App\Policies;

use App\Eloquent\User;
use App\Eloquent\Product;

class ProductPolicy extends AbstractPolicy
{
    public function read(User $user, Product $ability)
    {
        if (! $this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }

    public function create(User $user, Product $ability)
    {
        if (! $this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }

    public function edit(User $user, Product $ability)
    {
        if (! $this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }

    public function destroy(User $user, Product $ability)
    {
        if (! $this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }
}
