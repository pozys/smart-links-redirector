<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Tests;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Pozys\SmartLinks\Domain\Interfaces\{
    LinkInterface,
    RedirectLinkInterface,
    RedirectLinkProviderInterface,
    RuleInterface,
    RuleProviderInterface
};
use Pozys\SmartLinks\Domain\Models\RedirectResolver;
use Pozys\SmartLinks\Tests\Traits\UseFaker;

final class RedirectResolverTest extends TestCase
{
    use UseFaker;

    public function testResolvePositive(): void
    {
        $ruleProvider = $this->createMock(RuleProviderInterface::class);

        $redirectLinkProvider = $this->createMock(RedirectLinkProviderInterface::class);

        $rightRedirect = $this->mockRightRedirect();

        $wrongRedirect = $this->mockWrongRedirect();

        $redirectLinkProvider->method('findRedirects')->willReturn([$wrongRedirect, $rightRedirect]);

        $link = $this->createMock(LinkInterface::class);
        $redirectResolver = new RedirectResolver($ruleProvider, $redirectLinkProvider);

        $this->assertSame($rightRedirect, $redirectResolver->resolve($link));
    }

    public function testResolveRulesNotFound(): void
    {
        $ruleProvider = $this->createMock(RuleProviderInterface::class);

        $redirectLinkProvider = $this->createMock(RedirectLinkProviderInterface::class);

        $redirectLinkProvider->method('findRedirects')->willReturn([]);

        $link = $this->createMock(LinkInterface::class);
        $redirectResolver = new RedirectResolver($ruleProvider, $redirectLinkProvider);

        $this->assertNull($redirectResolver->resolve($link));
    }

    public function testResolveRulesNotMatch(): void
    {
        $ruleProvider = $this->createMock(RuleProviderInterface::class);

        $redirectLinkProvider = $this->createMock(RedirectLinkProviderInterface::class);

        $wrongRedirect1 = $this->mockWrongRedirect();

        $wrongRedirect2 = $this->mockWrongRedirect();

        $redirectLinkProvider->method('findRedirects')->willReturn([$wrongRedirect1, $wrongRedirect2]);

        $link = $this->createMock(LinkInterface::class);
        $redirectResolver = new RedirectResolver($ruleProvider, $redirectLinkProvider);

        $this->assertNull($redirectResolver->resolve($link));
    }

    private function mockRightRedirect(): MockObject
    {
        $rule1 = $this->createMock(RuleInterface::class);
        $rule1->method('matches')->willReturn(true);
        $rule2 = $this->createMock(RuleInterface::class);
        $rule2->method('matches')->willReturn(true);
        $redirectLink = $this->createMock(RedirectLinkInterface::class);
        $redirectLink->method('getLink')->willReturn($this->faker()->safeEmail());
        $redirectLink->method('rules')->willReturn(collect([$rule1, $rule2]));

        return $redirectLink;
    }

    private function mockWrongRedirect(): MockObject
    {
        $rule1 = $this->createMock(RuleInterface::class);
        $rule1->method('matches')->willReturn(true);
        $rule2 = $this->createMock(RuleInterface::class);
        $rule2->method('matches')->willReturn(false);
        $redirectLink = $this->createMock(RedirectLinkInterface::class);
        $redirectLink->method('getLink')->willReturn($this->faker()->safeEmail());
        $redirectLink->method('rules')->willReturn(collect([$rule1, $rule2]));

        return $redirectLink;
    }
}
