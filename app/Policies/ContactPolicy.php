<?php

namespace App\Policies;

use App\Eloquent\User;
use App\Eloquent\Contact;

class ContactPolicy extends AbstractPolicy
{
    public function read(User $user, Contact $ability)
    {
        if (! $this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }

    public function create(User $user, Contact $ability)
    {
        if (! $this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }

    public function edit(User $user, Contact $ability)
    {
        if (! $this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }

    public function destroy(User $user, Contact $ability)
    {
        if (! $this->checkAbility($user, __FUNCTION__, $ability)) {
            return false;
        }

        return true;
    }
}
