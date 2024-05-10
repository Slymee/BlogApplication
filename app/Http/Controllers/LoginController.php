<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LoginRegisterRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\AuthService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    private $authService;
    
    /**
     * __construct
     *
     * @param  mixed $authService
     * @return void
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Login and Register Form
     *
     * @return Illuminate\Contracts\View\View
     */
    public function showLoginForm(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        Redirect::setIntendedUrl(url()->previous());
        return view('login-register');
    }

    public function login(LoginRegisterRequest $request)
    {
        if($this->checkUsernameOrEmail($request->username_or_email)){
            $credentials = ['email' => $request->username_or_email, 'password' => $request->password];

            if ($this->authService->login($credentials)) {
                return redirect()->intended();
            }

            // return $this->authService->login($credentials) ? redirect()->intended() : 
            //         redirect()->back()->with('message', 'Invalid Credentials!');
        }

        $credentials = ['username' => $request->username_or_email, 'password' => $request->password];

        if ($this->authService->login($credentials)) {
            return redirect()->intended();
        }

        // return $this->authService->login($credentials) ? redirect()->intended() : 
        //         redirect()->back()->with('message', 'Invalid Credentials!');

        return redirect()->back()->with('message', 'Invalid Credentials!');
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
