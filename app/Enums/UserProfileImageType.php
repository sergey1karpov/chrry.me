<?php

namespace App\Enums;

enum UserProfileImageType: string
{
    case AVATAR = 'avatar';

    case BANNER = 'banner';

    case FAVICON = 'favicon';

    case LOGOTYPE = 'logotype';
}
