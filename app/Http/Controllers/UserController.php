<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    
    /**
     * Login and Register Form
     *
     * @return Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('login-register');
    }

    
        
    /**
     * Store/Register User Credentials
     *
     * @param  mixed $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(UserFormRequest $request): \Illuminate\Http\RedirectResponse
    {
        try{
            $this->userRepository->create($request->validated());
            return redirect()->back()->with('message', 'User Registered.');
        }catch (\Exception $e){
            Log::error('Caught Exception: '. $e);
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
