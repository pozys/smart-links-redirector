<?php

declare(strict_types=1);

use Illuminate\Database\Capsule\Manager;
use Pozys\SmartLinks\Application\Settings\SettingsInterface;
use Pozys\SmartLinks\Domain\Models\Conditions\EqualCondition;
use Pozys\SmartLinks\Domain\Models\ConditionValue;
use Pozys\SmartLinks\Domain\Models\Rules\LanguageRule;

use function DI\autowire;
use function DI\get;

return [
    LanguageRule::class => autowire()
        ->constructor(autowire(ConditionValue::class)
            ->constructor(get(EqualCondition::class), get('language'))),
    'db' => function ($container) {
        $capsule = new Manager();
        $settings = $container->get(SettingsInterface::class);
        $capsule->addConnection($settings->get('db'));

        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        return $capsule;
    },
];
