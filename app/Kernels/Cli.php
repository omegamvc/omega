<?php

declare(strict_types=1);

namespace App\Kernels;

use Omega\Application\Application;
use Omega\Console\ConsoleKernel;
use Whoops\Handler\PlainTextHandler;
use Whoops\Run;
use Whoops\Handler\Handler;

class Cli extends ConsoleKernel
{
    /** @var Run */
    private Run $run;

    /** @var Handler */
    private Handler $handler;

    public function __construct(Application $app)
    {
        parent::__construct($app);

        $this->app->bootedCallback(function () {
            /* @var PlainTextHandler $handler */
            $this->handler = $this->app->make('error.PlainTextHandler');

            /* @var Run $run */
            $this->run = $this->app->make('error.handle');
            $this->run
              ->pushHandler($this->handler)
              ->register();
        });
    }
}
