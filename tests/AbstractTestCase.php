<?php

declare(strict_types=1);

namespace Tests;

use Omega\Testing\TestCase as IntegrateTestCase;

abstract class AbstractTestCase extends IntegrateTestCase
{
    use CreateApplicationTrait;

    protected function setUp(): void
    {
        $this->app = $this->createApplication();
    }
}
