<?php

declare(strict_types=1);

use App\Exceptions\Handler;
use App\Kernels\ConsoleKernel;
use App\Kernels\Web;
use Omega\Application\Application;
use Omega\Exceptions\ExceptionHandler;
use Omega\Http\HttpKernel;
use Omega\Console\ApplicationConsole;
use Omega\Support\Env;

Env::load(dirname(__DIR__));

$app = new Application(dirname(__DIR__));

$app->set(
    HttpKernel::class,
    fn() => new Web($app)
);

$app->set(
    ApplicationConsole::class,
    fn () => new ConsoleKernel($app)
);

$app->set(
    ExceptionHandler::class,
    fn () => new Handler($app)
);

return $app;
