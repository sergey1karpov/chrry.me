<?php

namespace Tests\Unit;

use App\Services\PropertiesService;
use PHPUnit\Framework\TestCase;

class PropertyServiceTest extends TestCase
{
    /**
     * @var array|string[]
     */
    private array $array = [
        'propertyName1' => 'propertyValue1',
        'propertyName2' => 'propertyValue2',
        'propertyName3' => 'propertyValue3',
    ];

    /**
     * @return void
     */
    public function test_service(): void
    {
        $service = new PropertiesService();

        foreach($this->array as $propertyName => $propertyValue) {
            $service->addProperty($propertyName, $propertyValue);
        }

        $this->assertArrayHasKey('propertyName1', $service->getProperties());
        $this->assertArrayHasKey('propertyName2', $service->getProperties());
        $this->assertArrayHasKey('propertyName3', $service->getProperties());
    }
}
