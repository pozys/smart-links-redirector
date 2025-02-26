<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Application\Services;

use Pozys\SmartLinks\Application\Interfaces\RuleCheckerInterface;
use Pozys\SmartLinks\Domain\Interfaces\{ConditionValueInterface, RuleInterface};

class StrictRuleChecker implements RuleCheckerInterface
{
    public function isAcceptable(RuleInterface $rule): bool
    {
        return $rule->conditions()->every(
            fn(ConditionValueInterface $condition): bool => $condition->isSatisfiedBy($rule->getCurrentValue())
        );
    }
}
