<?php

declare(strict_types=1);

use App\Exceptions\Handler;
use App\Kernels\ConsoleKernel;
use App\Kernels\HttpKernel;

Dotenv\Dotenv::createImmutable(dirname(__DIR__))->load();

$app = new Omega\Integrate\Application(dirname(__DIR__));

$app->set(
    Omega\Integrate\Http\Kernel::class,
    fn() => new HttpKernel($app)
);

$app->set(
    Omega\Integrate\Console\Kernel::class,
    fn () => new ConsoleKernel($app)
);

$app->set(
    Omega\Integrate\Exceptions\Handler::class,
    fn () => new Handler($app)
);

return $app;
