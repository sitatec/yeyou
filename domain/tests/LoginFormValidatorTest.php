<?php

use Domain\Authentication\Login\Helpers\Identifier;
use Domain\Authentication\Login\Helpers\LoginFormValidator;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

class LoginFormValidatorTest extends TestCase
{
    /** @test */
    public function test_validation_with_valid_email_and_password()
    {
        $formV = new LoginFormValidator(["id" => "sita@gmail.com", "password" => "motdepasse"]);
        assertTrue($formV->validate());
    }

    public function test_validation_with_valid_phone_number_and_password()
    {
        $formV = new LoginFormValidator(["id" => "456436543", "password" => "motdepasse"]);
        assertTrue($formV->validate());
    }

    
    public function test_validation_with_invalid_email()
    {
        $formV = new LoginFormValidator(["id" => "sita@gmail_com", "password" => "motdepasse"]);
        assertFalse($formV->validate());
    }

    public function test_validation_with_valid_phone_number_that_length_is_smaller_than_the_required_length()
    {
        $formV = new LoginFormValidator(["id" => "45643654", "password" => "motdepasse"]);
        assertFalse($formV->validate());
    }
    
    
    public function test_validation_with_invalid_password()
    {
        $formV = new LoginFormValidator(["id" => "sita@gmail.com", "password" => "motde"]);
        assertFalse($formV->validate());
        assertTrue((count($formV->getErrors()) === 1) && count($formV->getErrors()["password"]) === 1 );
    }
    
}