<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateRegisterUserRequest extends FormRequest
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
            'name' => 'required|min:3|max:100',
            'slug' => ['min:3', 'max:150', 'alpha_dash', Rule::unique('users')->ignore(Auth::user()->id)],
            'description' => 'nullable|max:150',
            'name_color' => 'nullable',
            'description_color' => 'nullable',
            'verify_color' => 'nullable',
            'background_color' => 'nullable',
            'locale' => 'nullable',
            'social' => 'nullable',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
        ];
    }
}
