<?php
namespace App\Domain\UseCases\Login;


interface LoginInterface {
    public function execute(LoginRequest $request): LoginResponse;
}