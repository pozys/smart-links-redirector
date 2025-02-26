<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Domain\Models\Rules;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Pozys\SmartLinks\Domain\Interfaces\{RuleInterface, ValueWrapperInterface};

abstract class AbstractRule extends Model implements RuleInterface
{
    use Notifiable;

    protected $table = 'rules';

    abstract public function getCurrentValue(): ValueWrapperInterface;

    public function conditions(): Collection
    {
        return collect();
    }
}
