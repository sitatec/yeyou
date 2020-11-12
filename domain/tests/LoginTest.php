<?php

namespace Domain\Tests;
use PHPUnit\Framework\TestCase;
use Domain\Authentication\Login\Classes\User;
use Domain\Authentication\Login\LoginRequest;
use Domain\Authentication\Login\Implementation\Login;
use Domain\Authentication\Login\Classes\UserRepository;
use Domain\Authentication\Login\Helpers\Identifier;
use Domain\Authentication\Login\Helpers\IdentifierParser;

class LoginTest extends TestCase {

    private $login;

    /**
     * @before
     */
    public function initLogin()
    {
        $this->login = new Login(new UserRepository, IdentifierParser::class, Identifier::class);

    }

        // -----   IDENTIFIER  ----- //
    public function test_user_login_with_invalid_identifier()
    {
        $loginRequest = new LoginRequest("false", "motdepasse");
        $loginResponse = $this->login->execute($loginRequest);
        $this->assertNull( $loginResponse->user);
        $this->assertTrue(!empty($loginResponse->errors['identifier']));
    }

    public function test_user_login_with_valid_phone_number()
    {
        $loginRequest = new LoginRequest("111111111", "motdepasse");
        $loginResponse = $this->login->execute($loginRequest);
        $this->assertInstanceOf(User::class , $loginResponse->user);
    }

    
    public function test_user_login_with_unexisting_phone_number()
    {     
        //This test simulate a login process with a phone number that doesn't exist in the database.
        //But any database doesn't exist yet the database is simulated by an ``array In UserRepository implementation``

        $loginRequest = new LoginRequest("111111211", "motdepasse");
        $loginResponse = $this->login->execute($loginRequest);
        $this->assertNull( $loginResponse->user);
    }
    
    
    public function test_user_login_with_valid_email()
    {
        $loginRequest = new LoginRequest("sita@gmail.com", "motdepasse");
        $loginResponse = $this->login->execute($loginRequest);
        $this->assertInstanceOf(User::class, $loginResponse->user);
    }
    
    public function test_user_login_with_unexisting_email()
    {
        //This test simulate a login process with an email that doesn't exist in the database.
        //But any database doesn't exist yet the database is simulated by an ``array In UserRepository implementation``

        $loginRequest = new LoginRequest("sitsa@gmail.com", "motdepasse");
        $loginResponse = $this->login->execute($loginRequest);
        $this->assertNull($loginResponse->user);
        $this->assertTrue(!empty($loginResponse->errors['identifier']));
    }

        // -----    PASSWORD    ----- //

    
}