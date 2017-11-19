<?php

namespace App\Policies;

use App\Eloquent\User;
use App\Eloquent\Category;

class CategoryPolicy extends AbstractPolicy
{
    public function read(User $user, Category $ability)
    {
        if (! $this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }

    public function create(User $user, Category $ability)
    {
        if (! $this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }

    public function edit(User $user, Category $ability)
    {
        if (! $this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }

    public function destroy(User $user, Category $ability)
    {
        if (! $this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }
}
