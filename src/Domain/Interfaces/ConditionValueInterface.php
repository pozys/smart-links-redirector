<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Domain\Interfaces;

interface ConditionValueInterface
{
    public function isSatisfiedBy(ValueWrapperInterface $value): bool;
}
