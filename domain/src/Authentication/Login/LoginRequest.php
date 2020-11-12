<?php

namespace Domain\Authentication\Login;

class LoginRequest
{
    public $identifier;
    public $password;

    public function __construct($identifier, $password)
    {
        $this->identifier = $identifier;
        $this->password = $password;
    }
}
