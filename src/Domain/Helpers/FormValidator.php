<?php
namespace App\Domain\Helpers;

use Valitron\Validator;

abstract class FormValidator implements ValidatorInterface
{
    /**
     * @var Validator
     * Valitron validator
     */
    protected Validator $validator;
    
    
    public function __construct(array $formData)
    {
        Validator::lang('fr');
        $this->validator = new Validator($formData);
    }

    abstract protected function applyRules(): void;
    abstract protected function setLabels(): void;
}
