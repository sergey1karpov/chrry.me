<?php

namespace App\Contracts;

interface ProductCardPropertiesInterface
{
    public function addProperty($property, $value);

    public function getProperties(): array;
}
