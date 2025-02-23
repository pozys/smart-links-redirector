<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Tests;

use PHPUnit\Framework\TestCase;
use Pozys\SmartLinks\Domain\Models\Conditions\EqualCondition;
use Pozys\SmartLinks\Domain\Models\ConditionValue;
use Pozys\SmartLinks\Domain\Models\Rules\LanguageRule;

final class LanguageRuleTest extends TestCase
{
    public function testRuleMatchesSuccessfully(): void
    {
        $rule = $this->makeRule('en');

        $_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'en';

        $this->assertTrue($rule->matches());
    }

    public function testRuleDoesNotMatch(): void
    {
        $rule = $this->makeRule('en');

        $_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'ru';

        $this->assertFalse($rule->matches());
    }

    public function testRuleDoesNotMatchWithoutAcceptLanguageHeader(): void
    {
        $rule = $this->makeRule('en');

        $this->assertFalse($rule->matches());
    }

    private function makeRule(string $language): LanguageRule
    {
        $conditionValue = new ConditionValue(new EqualCondition(), $language);

        return new LanguageRule($conditionValue);
    }
}
