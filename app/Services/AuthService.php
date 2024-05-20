<?php
declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(array $credentials)
    {
        if(Auth::guard('web')->attempt($credentials)){
            return true;
        }
        return false;
    }
}