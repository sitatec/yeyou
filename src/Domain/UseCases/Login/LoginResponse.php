<?php
namespace App\Domain\UseCases\Login;

use App\Domain\Entities\User;


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
