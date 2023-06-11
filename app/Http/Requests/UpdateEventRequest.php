<?php

namespace App\Http\Requests;

use App\Services\ColorConvertorService;
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
        $this->request->add([
            'de_background_color_rgba' => ColorConvertorService::convertBackgroundColor($this->request->get('de_background_color_hex')),
            'de_background_color_hex' => $this->request->get('de_background_color_hex'),
        ]);

        return [
            'city_id' => 'required',
            'location' => 'required|max:255',
            'time' => 'required|max:50|date_format:H:i',
            'date' => 'required',
            'banner' => 'mimes:jpeg,png,jpg,gif|max:10000',
            'description' => 'required|max:2500',
            'title' => 'required|max:255',
            'video' => 'nullable|url',
            'tickets' => 'required|url',
            'btn_text' => 'required|max:50',
//            'city' => 'required',
//            'location' => 'required|max:255',
//            'time' => 'required|max:50',
//            'date' => 'nullable',
//            'description' => 'nullable|max:2500',
//            'video' => 'nullable|url',
//            'tickets' => 'nullable|url',
//            'btn_text' => 'nullable|max:50'
//            'banner' => 'required|mimes:jpeg,png,jpg,gif|max:10000',
        ];
    }
}
