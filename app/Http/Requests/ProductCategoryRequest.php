<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductCategoryRequest extends FormRequest
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
        $slug = $this->request->get("slug");

        return [
            'name' => 'required|min:3|max:50',
            'slug' => ['required','min:3','max:255','alpha_dash', Rule::unique('product_categories')->ignore($slug,'slug')],
        ];
    }
}
