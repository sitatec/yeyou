<?php
namespace App\Domain\Repositories;

use App\Domain\Entities\UserInterface;


interface UserRepositoryInterface
{
    public function getByPhoneNumber(string $userName): ?UserInterface;
    public function getByEmail(string $email): ?UserInterface;
}
