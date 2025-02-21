<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Domain\Interfaces;

interface RedirectResolverInterface
{
    public function resolve(LinkInterface $link): ?RedirectLinkInterface;
}
