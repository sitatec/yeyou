<?php

namespace Domain\Authentication\Login\Helpers;

use MyCLabs\Enum\Enum;

class Identifier extends Enum 
{
    const EMAIL = 0;
    const PHONE_NUMBER = 1;
}
