<?php
namespace App\Domain\Entities;

interface UserInterface
{
    public function getUserName():?string;    
    public function getEmail():?string;    
    public function getAvatarUrl():?string;    
    public function getPhoneNumbers():?array;    
    public function getPassword():string;    
}
