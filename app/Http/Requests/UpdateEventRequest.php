<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            'city' => 'required',
            'location' => 'required|max:255',
            'time' => 'required|max:50',
            'date' => 'nullable',
            'banner' => 'nullable|mimes:jpeg,png,jpg,gif|max:5000',
            'description' => 'max:2500'
        ];
    }
}