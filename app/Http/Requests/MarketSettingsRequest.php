<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarketSettingsRequest extends FormRequest
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
            'delivery_rules' => 'required|min:10|max:1200',
            'payment_rules' => 'required|min:10|max:1200',
            'refund_rules' => 'required|min:10|max:1200',
            'other_rules' => 'nullable|max:1200',
        ];
    }
}
