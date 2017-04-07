<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;
use App\Models\Role;

class BasePolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->role->id == 1) {
            return true;
        }
    }

    public function admin($user)
    {
        if ($user->role->id == 1) {
            return true;
        }
    }

    public function isSeller($user)
    {
        return $user->role->id == 2;
    }

    public function isShipper($user)
    {
        return $user->role->id == 3;
    }
}
