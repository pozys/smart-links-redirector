<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Application\Settings;

class Settings implements SettingsInterface
{
    public function __construct(private array $settings) {}

    public function get(string $key = ''): mixed
    {
        return (empty($key)) ? $this->settings : $this->settings[$key];
    }
}
