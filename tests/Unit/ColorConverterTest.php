<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\ColorConvertorService;
use PHPUnit\Framework\TestCase;

class ColorConverterTest extends TestCase
{
    /**
     * Color convertor from hex to rgb
     * @return void
     */
    public function test_convertor_color(): void
    {
        $response = ColorConvertorService::convertBackgroundColor('#ffffff');

        $this->assertEquals('255, 255, 255', $response);
    }
}
