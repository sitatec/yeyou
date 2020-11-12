<?php

namespace Domain\Authentication\Login;

use Domain\Authentication\Login\Classes\User;

class LoginResponse
{
    public $user;

    public $errors;

    public function __construct(?User $user, array $errors = [])
    {
        $this->user = $user;
        $this->errors = $errors;
    }
}
