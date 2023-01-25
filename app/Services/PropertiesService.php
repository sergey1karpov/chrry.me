<?php

namespace App\Services;

use App\Contracts\PropertiesInterface;

class PropertiesService implements PropertiesInterface
{
    private array $propertyContainer = [];

    /**
     * Add Property
     *
     * @param $property
     * @param $value
     * @return void
     */
    public function addProperty($property, $value): void
    {
        $this->propertyContainer[$property] = $value;
    }

    /**
     * Get properties
     *
     * @return array
     */
    public function getProperties(): array
    {
        return $this->propertyContainer;
    }
}
