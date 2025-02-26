<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Application\DTO;

class ConditionValueDto
{
    public function __construct(
        public readonly int $conditionId,
        public readonly int $ruleId,
        public readonly mixed $value
    ) {}
}
