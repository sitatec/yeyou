<?php

namespace Domain\Authentication\Login\Classes;


use Domain\Authentication\Entity\UserInterface;
use Domain\Authentication\Repository\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    private $phoneNumber = ["111111111", "363434634"];
    private $emails = ["sita@gmail.com", "tech@gmail.com"];
    public function getByEmail(string $email): ?UserInterface
    {
        if(in_array($email, $this->emails))
        {
            $password = password_hash('motdepasse',PASSWORD_BCRYPT);
            return new User("sita", $password,$email, "avatarUrl", "456468465468"); 
        }
        return null; 
    }
    public function getByPhoneNumber(string $userName): ?UserInterface
    {
        if(in_array($userName, $this->phoneNumber))
        {
            $password = password_hash('motdepasse',PASSWORD_BCRYPT);
            return new User($userName, $password, "email@gmail.com", "avatarUrl", "456468465468");   
        }
        return null;
    }
}
