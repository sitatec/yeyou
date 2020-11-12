<?php

namespace Domain\Authentication\Repository;

use Domain\Authentication\Entity\UserInterface;

interface UserRepositoryInterface
{
    public function getByPhoneNumber(string $userName): ?UserInterface;
    public function getByEmail(string $email): ?UserInterface;
}
