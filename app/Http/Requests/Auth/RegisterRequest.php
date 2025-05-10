<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
    public function rules(){
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => ['required', 'confirmed', Password::min(8)],
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Zadajte svoje meno.',
            'email.required' => 'Zadajte email.',
            'email.email' => 'Email musí byť v platnom formáte.',
            'password.required' => 'Zadajte svoje heslo.',
            'password.min' => 'Heslo musí obsahovať aspoň 8 znakov.',
            'password.confirmed' => 'Heslá sa musia zhodovať.',
        ];
    }
}
