<?php

namespace App\Http\Requests;

use App\Services\ColorConvertorService;
use Illuminate\Foundation\Http\FormRequest;

class MassUpdateEventRequest extends FormRequest
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
            //
        ];
    }
}
