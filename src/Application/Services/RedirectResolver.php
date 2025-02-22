<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Application\Services;

use Pozys\SmartLinks\Application\Interfaces\RedirectLinkRepositoryInterface;
use Pozys\SmartLinks\Application\Interfaces\RedirectResolverInterface;
use Pozys\SmartLinks\Domain\Interfaces\{
    LinkInterface,
    RedirectLinkInterface,
    RuleInterface,
};

class RedirectResolver implements RedirectResolverInterface
{
    public function __construct(private readonly RedirectLinkRepositoryInterface $redirectLinkRepository) {}

    public function resolve(LinkInterface $link): ?RedirectLinkInterface
    {
        $redirects = $this->redirectLinkRepository->findRedirects($link);

        return collect($redirects)
            ->first(
                static fn(RedirectLinkInterface $candidate): bool => $candidate->rules()->every(
                    static fn(RuleInterface $rule): bool => $rule->matches()
                )
            );
    }
}
