<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Domain\Interfaces;

interface RuleProviderInterface
{
    public function getRule(): RuleInterface;
}
