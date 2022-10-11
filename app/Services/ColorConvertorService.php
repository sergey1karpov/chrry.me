<?php

namespace App\Services;

class ColorConvertorService
{
    /**
     * Возвращает цвет, конвертируемый в формат hex
     *
     * @param $color
     * @return string
     */
    public static function convertBackgroundColor(string $color): string
    {
        list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");
        return $r.', '.$g.', '.$b;
    }
}
