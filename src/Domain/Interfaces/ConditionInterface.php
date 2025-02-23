<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Domain\Interfaces;

interface ConditionInterface
{
    public function isValid(mixed $value, mixed $expect): bool;
}
