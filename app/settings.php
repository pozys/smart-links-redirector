<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Pozys\SmartLinks\Application\Settings\Settings;
use Pozys\SmartLinks\Application\Settings\SettingsInterface;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        SettingsInterface::class => function () {
            return new Settings([
                'displayErrorDetails' => true,
                'logError' => false,
                'logErrorDetails' => false,
                'db' => [
                    'driver' => 'sqlite',
                    // 'host' => 'localhost',
                    'database' => __DIR__ . '/../database/database.sqlite3',
                    // 'username' => 'user',
                    // 'password' => 'password',
                    // 'charset' => 'utf8',
                    // 'collation' => 'utf8_unicode_ci',
                    // 'prefix' => '',
                ],
            ]);
        }
    ]);
};
