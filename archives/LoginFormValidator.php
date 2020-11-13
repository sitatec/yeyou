<?php

namespace Domain\Authentication\Login\Helpers;

use App\Domain\Helpers\FormValidator;


/**
 * Login form Validator
 */
class LoginFormValidator extends FormValidator
{

    
    /**
     * Applies the validation rules
     * according to the registration form 
     * 
     * @return void
     */
    protected function applyRules(): void
    {
        $rules = [
            "required" => ["id", "password"],
            "lengthBetween" => [["password", 6, 100]]
        ];
        $id = $this->validator->data()['id'];
        if(str_contains($id, "@")){
            $rules["email"] = "id";
        }else{
            $rules["integer"] = "id";
            $rules["length"] = [["id", 9]];
        }
        $this->validator->rules($rules);
    }

    /**
     * Set the labels that will be show in the error messages 
     * if their corresponding field is invalid
     *
     * @return void
     */
    protected function setLabels(): void
    {
        $this->validator->labels([
            "id" => "Email ou Téléphone",
            "password" => "Mot de passe"
        ]);
    }

    public function validate(): bool
    {
        $this->applyRules();
        $this->setLabels();
        return $this->validator->validate();
    }

    /**
     * Return an array that contains
     * all of the invalid fields label as keys
     * and the corresponding error messages as values
     * 
     * @return array
     */
    public function getErrors(): array
    {
        return $this->validator->errors();
    }
}
