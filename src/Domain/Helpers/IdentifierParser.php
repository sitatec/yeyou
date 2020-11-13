<?php
namespace App\Domain\Helpers;

class IdentifierParser
{

    private static function isValidPhoneNumber(string $number):bool
    {
        $number = (int) $number;
        return !empty($number) && (strlen((string)$number) === 9);
    }

    public static function parse(string $id): ?Identifier
    {
        if(filter_var($id, FILTER_VALIDATE_EMAIL)){
            return Identifier::EMAIL();
        }elseif(self::isValidPhoneNumber($id)){
            return Identifier::PHONE_NUMBER();
        }
        return null;
    }
}
