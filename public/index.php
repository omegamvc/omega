<?php

use DI\DependencyException;
use DI\NotFoundException;
use Omega\Http\RequestFactory;
use Omega\Integrate\Application;
use Omega\Integrate\Http\Kernel;

if (file_exists($maintenance = dirname(__DIR__) . '/storage/app/maintenance.php')) {
    require $maintenance;
}

require_once dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Application instance.
 *
 * @var Application $app
 */
$app = require_once dirname(__DIR__) . '/bootstrap/app.php';

/**
 * Declare http kernel.
 *
 * @var Kernel $kernel
 */
try {
    $kernel = $app->make(Kernel::class);
} catch (DependencyException|NotFoundException $e) {

}

/**
 * Handle Response from HttpKernel.
 */
$response = $kernel->handle(
    $request = (new RequestFactory())->getFromGlobal()
)->send();

$kernel->terminate($request, $response);
