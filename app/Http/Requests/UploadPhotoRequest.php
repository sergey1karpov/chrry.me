<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadPhotoRequest extends FormRequest
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
            'verify_icon' => 'nullable|mimes:jpeg,png,jpg,gif|max:10000',
            'favicon'     => 'nullable|mimes:jpeg,png,jpg|max:10000',
            'banner'      => 'nullable|mimes:jpeg,png,jpg,gif|max:10000',
            'avatar'      => 'nullable|mimes:jpeg,png,jpg,gif|max:10000',
        ];
    }
}
