<?php

declare(strict_types=1);

namespace Pozys\SmartLinks\Tests\Traits;

trait UseFaker
{
    public function faker(): \Faker\Generator
    {
        return \Faker\Factory::create();
    }
}
