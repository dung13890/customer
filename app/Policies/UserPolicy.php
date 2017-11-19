<?php

namespace App\Policies;

use App\Eloquent\User;

class UserPolicy extends AbstractPolicy
{
    public function read(User $user, User $ability)
    {
        if (! $this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }

    public function create(User $user, User $ability)
    {
        if (! $this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }

    public function edit(User $user, User $ability)
    {
        if (! $this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }

    public function destroy(User $user, User $ability)
    {
        if (! $this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }
}
