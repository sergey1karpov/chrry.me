<?php

namespace App\Http\Requests;

use App\Services\ColorConvertorService;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLinkRequest extends FormRequest
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
            'dl_background_color' => ColorConvertorService::convertBackgroundColor($this->request->get('dl_background_color')),
            'dl_background_color_hex' => $this->request->get('dl_background_color'),
        ]);

        return [];
    }
}
