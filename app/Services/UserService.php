<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * @param string $oldPassword
     * @param string $currentPassword
     * @return bool
     */
    public function checkHashPassword(string $oldPassword, string $currentPassword): bool
    {
        return Hash::check($oldPassword, $currentPassword);
    }
}
