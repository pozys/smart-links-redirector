<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Domain\Interfaces;

interface RedirectLinkProviderInterface
{
    /**
     * @return RedirectLinkInterface[]
     */
    public function findRedirects(LinkInterface $link): array;
}
