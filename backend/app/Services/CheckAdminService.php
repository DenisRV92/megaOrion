<?php

namespace App\Services;

use App\Models\User;

class CheckAdminService
{
    public static function check(User $user)
    {
        return (User::ROLE_ADMIN === auth()->user()->role);
    }
}
