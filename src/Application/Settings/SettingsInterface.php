<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Application\Settings;

interface SettingsInterface
{
    public function get(string $key = ''): mixed;
}
