<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait IconsAndFonts
{
    /**
     * Get icons for links
     * @return array
     */
    public function getIcons(): array
    {
        $icons = public_path('images/social');
        return File::files($icons);
    }

    /**
     * Get fonts
     * @return array
     */
    public function getFonts(): array
    {
        $fonts = public_path('fonts');
        return File::files($fonts);
    }
}
