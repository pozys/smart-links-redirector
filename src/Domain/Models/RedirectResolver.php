<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Domain\Models;

use Pozys\SmartLinks\Domain\Interfaces\{
    LinkInterface,
    RedirectLinkInterface,
    RedirectLinkProviderInterface,
    RedirectResolverInterface,
    RuleInterface,
    RuleProviderInterface
};

class RedirectResolver implements RedirectResolverInterface
{
    public function __construct(
        private readonly RuleProviderInterface $ruleProvider,
        private readonly RedirectLinkProviderInterface $redirectLinkProvider,
    ) {}

    public function resolve(LinkInterface $link): ?RedirectLinkInterface
    {
        $redirects = $this->redirectLinkProvider->findRedirects($link);

        return collect($redirects)
            ->first(
                static fn(RedirectLinkInterface $candidate): bool => $candidate->rules()->every(
                    static fn(RuleInterface $rule): bool => $rule->matches()
                )
            );
    }
}
