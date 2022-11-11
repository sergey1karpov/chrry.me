<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => 'required|min:3|max:100',
            'product_categories_id' => 'required',
            'description' => 'required|min:3|max:255',
            'main_photo' => 'required|mimes:jpeg,png,jpg,gif|max:2500',
            'additional_photos' => 'nullable|array|max:5',
            'additional_photos.*' => 'nullable|mimes:jpeg,png,jpg,gif|max:5000',
            'price' => 'required|integer',
            'visible' => 'required|boolean',
            'full_description' => 'nullable|max:2500',
        ];
    }
}
