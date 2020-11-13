<?php
namespace App\Domain\Helpers;

interface ValidatorInterface
{
  public function validate(): bool;
  public function getErrors(): array;
}
