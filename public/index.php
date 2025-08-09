<?php

if (file_exists($maintenance = dirname(__DIR__) . '/storage/app/maintenance.php')) {
    require $maintenance;
}

require_once dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Load Application instan.
 *
 * @var Omega\Integrate\Application
 */
$app = require_once dirname(__DIR__) . '/bootstrap/init.php';

/**
 * Declare http karnel.
 *
 * @var Omega\Integrate\Http\Karnel
 */
$karnel = $app->make(Omega\Integrate\Http\Karnel::class);

/**
 * Handle Respone from httpkarnel.
 */
$response = $karnel->handle(
    $request = (new Omega\Http\RequestFactory())->getFromGloball()
)->send();

$karnel->terminate($request, $response);
