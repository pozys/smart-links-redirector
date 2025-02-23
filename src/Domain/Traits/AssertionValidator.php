<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Domain\Traits;

use Closure;

trait AssertionValidator
{
    private function assertIsValid(Closure $assertion, mixed ...$values): bool
    {
        try {
            call_user_func($assertion, ...$values);
        } catch (\Throwable $th) {
            return false;
        }

        return true;
    }
}
