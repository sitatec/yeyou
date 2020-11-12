<?php
namespace Domain\Authentication\Login;

use Domain\Authentication\Login\LoginRequest;
use Domain\Authentication\Login\LoginResponse;

interface LoginInterface {
    public function execute(LoginRequest $request): LoginResponse;
}