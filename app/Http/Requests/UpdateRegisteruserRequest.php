<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRegisteruserRequest extends FormRequest
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
            'name' => 'nullable|min:3|max:100',
            'slug' => 'nullable|unique:users|min:3|max:150|alpha_dash',
            'description' => 'nullable|max:150',
            'name_color' => 'nullable',
            'description_color' => 'nullable',
            'verify_color' => 'nullable',
            'background_color' => 'nullable',
            'banner' => 'nullable|mimes:jpeg,png,jpg,gif|max:5000',
            'avatar' => 'nullable|mimes:jpeg,png,jpg,gif|max:5000',
            'favicon' => 'nullable|mimes:jpeg,png,jpg,gif|max:5000',
            'locale' => 'nullable',
            'social' => 'nullable',
        ];
    }
}
