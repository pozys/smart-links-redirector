<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Domain\Interfaces;

interface LinkInterface
{
    public function getLink(): string;
}
