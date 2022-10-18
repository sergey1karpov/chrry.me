<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderProductRequest extends FormRequest
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
            'client_name' => 'required|min:5|max:100',
            'client_email' => 'required|email|max:150',
            'client_phone' => 'required|min:5|max:20',
            'client_text' => 'required|min:5|max:1000',
        ];
    }
}
