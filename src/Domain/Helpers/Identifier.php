<?php
namespace App\Domain\Helpers;

use MyCLabs\Enum\Enum;

class Identifier extends Enum 
{
    const EMAIL = 0;
    const PHONE_NUMBER = 1;
}
