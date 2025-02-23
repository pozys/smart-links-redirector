<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Domain\Models\Rules;

use Pozys\SmartLinks\Domain\Interfaces\{ConditionValueInterface, ValueWrapperInterface, RuleInterface};

class LanguageRule implements RuleInterface
{
    /** @var ConditionValueInterface[] */
    private readonly array $conditions;

    public function __construct(ConditionValueInterface ...$conditions)
    {
        $this->conditions = $conditions;
    }

    public function matches(): bool
    {
        return collect($this->conditions)->every(
            fn(ConditionValueInterface $condition): bool => $condition->isSatisfiedBy($this->prepareValue())
        );
    }

    private function prepareValue(): ValueWrapperInterface
    {
        return new class() implements ValueWrapperInterface {
            public function getValue(): string
            {
                return $this->cast($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '');
            }

            public function cast(mixed $value): string
            {
                return strtolower((string) $value);
            }
        };
    }
}
