<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Application\Interfaces;

use Pozys\SmartLinks\Domain\Interfaces\{LinkInterface, RedirectLinkInterface};

interface RedirectResolverInterface
{
    public function resolve(LinkInterface $link): ?RedirectLinkInterface;
}
