<?php

declare(strict_types=1);

use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions(
        [...require __DIR__ . '/dependencies/core/index.php']
    );
};
