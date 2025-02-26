<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Application\Interfaces;

use Pozys\SmartLinks\Domain\Interfaces\RuleInterface;

interface RuleCheckerInterface
{
    public function isAcceptable(RuleInterface $rule): bool;
}
