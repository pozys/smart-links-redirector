<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Domain\Models;

use Pozys\SmartLinks\Domain\Interfaces\{ConditionInterface, ConditionValueInterface, ValueWrapperInterface};

class ConditionValue implements ConditionValueInterface
{
    public function __construct(private readonly ConditionInterface $condition, private readonly string $value) {}

    public function isSatisfiedBy(ValueWrapperInterface $valueWrapper): bool
    {
        return $this->condition->isValid($valueWrapper->getValue(), $valueWrapper->cast($this->value));
    }
}
