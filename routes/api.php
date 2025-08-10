<?php

declare(strict_types=1);

// register router

use App\Controllers\ApiController;
use Omega\Router\Router;

// also support (json) format output
Router::any('/API/(:any)/(:any)', function ($unit, $action) {
    return (new ApiController())->index($unit, $action, 'v1.0');
});
