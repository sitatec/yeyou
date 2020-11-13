<?php
namespace App\Domain\Entities;


class User implements UserInterface
{
    public string $userName;

    public string $email;

    public array $phoneNumbers;

    public string $avatarUrl;

    public string $password;

    public function __construct(string $userName, string $password, ?string $email, ?string $avatarUrl, ?string ...$phoneNumbers)
    {       
        $this->userName = $userName;
        $this->email = $email;
        $this->phoneNumbers = $phoneNumbers;
        $this->avatarUrl = $avatarUrl;
        $this->password = $password;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Get the value of avatarUrl
     */ 
    public function getAvatarUrl(): ?string
    {
        return $this->avatarUrl;
    }

    /**
     * Get the value of phoneNumbers
     */ 
    public function getPhoneNumbers(): ?array
    {
        return $this->phoneNumbers;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Get the value of userName
     */ 
    public function getUserName(): ?string
    {
        return $this->userName;
    }
}
