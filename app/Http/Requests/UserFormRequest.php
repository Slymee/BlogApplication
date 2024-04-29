<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $routeName = $this->route()->getName();

        if($routeName = 'user-register'){
            return [
                'username' => ['required', 'bail', 'string', 'max:255', 'unique:users'],
                'email' => ['required', 'bail', 'email', 'string', 'max:255', 'unique:users'],
                'password' => [
                    'required', 'string', 'min:8',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
                    'confirmed',
                ],
            ];
        }

        return [
            'username_or_email' => ['required', 'bail'],
            'password' => ['required', 'bail'],
        ];
    }
}
