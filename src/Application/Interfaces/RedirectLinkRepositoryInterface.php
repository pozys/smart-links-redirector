<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Application\Interfaces;

use Pozys\SmartLinks\Application\DTO\RedirectLinkDto;
use Pozys\SmartLinks\Domain\Interfaces\LinkInterface;

interface RedirectLinkRepositoryInterface
{
    /**
     * @return RedirectLinkInterface[]
     */
    public function findRedirects(LinkInterface $link): array;

    public function save(RedirectLinkDto $redirect): void;
}
