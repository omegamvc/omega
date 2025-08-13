<?php

declare(strict_types=1);

use App\Exceptions\Handler;
use App\Kernels\Cli;
use App\Kernels\Web;
use Omega\Http\HttpKernel;
use Omega\Console\ConsoleKernel;

Dotenv\Dotenv::createImmutable(dirname(__DIR__))->load();

$app = new Omega\Integrate\Application(dirname(__DIR__));

$app->set(
    HttpKernel::class,
    fn() => new Web($app)
);

$app->set(
    ConsoleKernel::class,
    fn () => new Cli($app)
);

$app->set(
    Omega\Integrate\Exceptions\Handler::class,
    fn () => new Handler($app)
);

return $app;
