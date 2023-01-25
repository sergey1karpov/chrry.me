<?php

namespace App\Enums;

enum EntityPropertiesPrefix: string
{
    case Product = 'dp_';
    case Event = 'de_';
    case Link = 'dl_';
}
