<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegNewUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:5', 'max:100'],
            'slug' => ['required', 'unique:users', 'min:5', 'max:150', 'alpha_dash'],
            'email' => ['required', 'email', 'unique:users', 'max:255'],
            'password' =>['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
