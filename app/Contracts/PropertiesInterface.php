<?php

namespace App\Contracts;

interface PropertiesInterface
{
    public function addProperty($property, $value);

    public function getProperties(): array;
}
