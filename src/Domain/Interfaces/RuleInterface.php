<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Domain\Interfaces;

interface RuleInterface
{
    public function matches(): bool;
}
