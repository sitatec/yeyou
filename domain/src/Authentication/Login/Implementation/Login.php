<?php
namespace Domain\Authentication\Login\Implementation;

use Domain\Authentication\Login\Helpers\IdentifierParser;
use Domain\Authentication\Login\LoginRequest;
use Domain\Authentication\Login\LoginResponse;
use Domain\Authentication\Login\LoginInterface;
use Domain\Authentication\Repository\UserRepositoryInterface;


class Login implements LoginInterface {
    
    public UserRepositoryInterface $userRepository;
    public string $idParser;
    public string $id;

    public function __construct(UserRepositoryInterface $userRepository, string $idParser, string $id)
    {   
        $this->idParser = $idParser;
        $this->userRepository = $userRepository;
        $this->id = $id;
    }

    public function execute(LoginRequest $request): LoginResponse
    {
        $user = null;
        $errors = [];
        $idType = $this->idParser::parse($request->identifier);
        if($idType === null){
            return new LoginResponse(null, ['identifier' => "Identifian invalid"]);
        }
        if($idType->getValue() == $this->id::EMAIL){
            $user = $this->userRepository->getByEmail($request->identifier);
        }else{
            $user = $this->userRepository->getByPhoneNumber($request->identifier);
        }
        if (isset($user)) {
            if(!password_verify($request->password, $user->password)){
                $errors['password'] = "Mot de passe invalide";
            }
        }else{
            $errors['identifier'] = "Identifiant invalide";
        }
        return new LoginResponse($user, $errors);
    }
}