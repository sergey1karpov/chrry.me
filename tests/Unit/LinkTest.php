<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\ColorConvertorService;
use PHPUnit\Framework\TestCase;

class LinkTest extends TestCase
{
    //Конвертор цветов для ссылки
    public function test_convertor_color()
    {
        $response = ColorConvertorService::convertBackgroundColor('#ffffff');

        $this->assertEquals('255, 255, 255', $response);
    }
}
