<?php

namespace Domain\Tests;
use Domain\Login\Classes\User;
use Domain\Login\UseCase\Login;
use PHPUnit\Framework\TestCase;
use Domain\Login\LoginResponse;
use Login\Classes\UserRepository;

class LoginTest extends TestCase {

    private $login;

    public function __construct()
    {
        $this->login = new Login(new UserRepository);
    }
    
    public function test_user_login_with_username()
    {
        $loginResponse = new LoginResponse;
        $this->login->execute("sitatech", "motdepasse", $loginResponse);
        $this->assertInstanceOf(User::class , $loginResponse->user);
    }
    
}