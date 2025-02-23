<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Domain\Models\Conditions;

use Pozys\SmartLinks\Domain\Interfaces\ConditionInterface;
use Pozys\SmartLinks\Domain\Traits\AssertionValidator;
use Webmozart\Assert\Assert;

class EqualCondition implements ConditionInterface
{
    use AssertionValidator;

    public function isValid(mixed $value, mixed $expect): bool
    {
        return $this->assertIsValid(fn(mixed $value, mixed $expect) => Assert::same($value, $expect), $value, $expect);
    }
}
