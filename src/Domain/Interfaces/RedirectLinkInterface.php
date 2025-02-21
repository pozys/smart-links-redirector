<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Domain\Interfaces;

use Illuminate\Support\Collection;

interface RedirectLinkInterface
{
    public function getLink(): string;

    /**
     * @return Collection<RuleInterface>
     */
    public function rules(): Collection;
}
