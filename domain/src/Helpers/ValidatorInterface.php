<?php

namespace Domain\Helpers;

interface ValidatorInterface
{
  public function validate(): bool;
  public function getErrors(): array;
}
