<?php

declare(strict_types=1);

use App\Http\Controllers\IndexController;
use Omega\Router\Router;

Router::get('/', [IndexController::class, 'handle']);

Router::get('/say/(:any)', function ($text) {
    return "say $text";
});
