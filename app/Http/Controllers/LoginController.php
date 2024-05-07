<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Http\Requests\UserFormRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /**
     * Login and Register Form
     *
     * @return Illuminate\Contracts\View\View
     */
    public function showLoginForm(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('login-register');
    }

    public function login(LoginRequest $request)
    {
        dd($request->validated());


    }
    
    /**
     * Check if email or username
     *
     * @param  mixed $usernameOrEmail
     * @return void
     */
    public function checkUsernameOrEmail($usernameOrEmail)
    {
        return filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL);
    }

    
}
