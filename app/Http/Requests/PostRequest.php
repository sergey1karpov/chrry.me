<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:1|max:100',
            'full_text' => 'nullable',
            'photos[]' => 'nullable|image|mimes:jpeg,jpg,png|max:10000',
            'check_last_link' => 'nullable',
        ];
    }
}
