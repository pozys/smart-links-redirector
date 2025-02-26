<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Domain\Interfaces;

use Illuminate\Support\Collection;

interface RuleInterface
{

    /** @return Collection<ConditionValueInterface> $conditions */
    public function conditions(): Collection;

    public function getCurrentValue(): ValueWrapperInterface;
}
