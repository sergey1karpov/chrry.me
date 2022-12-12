<?php

namespace App\Services;

use App\Contracts\ProductCardPropertiesInterface;

class ProductCardPropertiesService implements ProductCardPropertiesInterface
{
    private array $propertyContainer = [];

    public function addProperty($property, $value): void
    {
        $this->propertyContainer[$property] = $value;
    }

    public function getProperties(): array
    {
        return $this->propertyContainer;
    }
}
