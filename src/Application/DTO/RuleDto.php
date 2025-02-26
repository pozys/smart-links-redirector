<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Application\DTO;

class RuleDto
{
    /**
     * @param ConditionValueDto[]|null $conditionValues
     */
    public function __construct(
        public readonly string $name,
        public readonly ?array $conditionValues = null
    ) {}
}
