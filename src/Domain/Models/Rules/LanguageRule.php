<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Domain\Models\Rules;

use Pozys\SmartLinks\Domain\Interfaces\ValueWrapperInterface;

class LanguageRule extends AbstractRule
{
    public function getCurrentValue(): ValueWrapperInterface
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

    protected static function booted(): void
    {
        static::created(function ($rule) {
            dd(static::class);

            $rule->name = 'static::class';
            $rule->save();
        });
    }
}
