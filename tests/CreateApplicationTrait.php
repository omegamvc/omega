<?php

declare(strict_types=1);

namespace Tests;

use Omega\Application\Application;

trait CreateApplicationTrait
{
    public function createApplication(): Application
    {
        return require dirname(__DIR__) . '/bootstrap/ap.php';
    }
}
