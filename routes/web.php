<?php

/**
 * Omega Application - config/cache configuration file.
 *
 * @link       https://omegamvc.github.io
 * @author     Adriano Giovannini <agisoftt@gmail.com>
 * @copyright  Copyright (c) 2024 - 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license    https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 */

declare(strict_types=1);

use App\Http\Controllers\ShowHomePageController;
use App\Http\Controllers\Products\BuyProductController;
use App\Http\Controllers\Products\DeleteProductController;
use App\Http\Controllers\Products\OrderProductController;
use App\Http\Controllers\Products\OrderSummaryController;
use App\Http\Controllers\Products\ShowProductController;
use App\Http\Controllers\Users\LogInUserController;
use App\Http\Controllers\Users\LogOutUserController;
use App\Http\Controllers\Users\RegisterUserController;
use App\Http\Controllers\Users\ShowRegisterFormController;
use App\Http\Controllers\Users\ShowLoginFormController;
use App\Http\Controllers\Users\UpdateUserDetailsController;
use App\Http\Controllers\Users\ChangeUserPasswordController;
use App\Http\Controllers\Users\UserDashboardController;
use App\Http\Controllers\Users\UserDetailsController;
use App\Http\Controllers\Users\UserOrdersController;
use App\Http\Controllers\Errors\ResponseNotAllowedController;
use App\Http\Controllers\Errors\PageNotFoundController;
use App\Http\Controllers\Errors\InternalServerErrorController;
use Omega\Support\Facade\Facades\Router;

/**
 * Return an array of route path.
 */
return function () {
    Router::errorHandler(
        400,
        [new ResponseNotAllowedController(), 'handle']
    );

    Router::errorHandler(
        404,
        [new PageNotFoundController(), 'handle']
    );

    Router::errorHandler(
        500,
        [new InternalServerErrorController(), 'handle']
    );

    Router::get(
        '/',
        [ShowHomePageController::class, 'handle'],
    )->name('show-home-page');

    Router::get(
        '/products/view/{product}',
        [ShowProductController::class, 'handle'],
    )->name('view-product');

    Router::post(
        '/products/order/{product}',
        [OrderProductController::class, 'handle'],
    )->name('order-product');

    Router::get(
        '/products/summary',
        [new OrderSummaryController(), 'handle'],
    )->name('show-order-summary-page');

    Router::post(
        '/products/buy-product',
        [BuyProductController::class, 'handle']
    )->name('buy-product');

    Router::post(
        '/products/delete-product',
        [DeleteProductController::class, 'handle']
    )->name('delete-product');

    Router::get(
        '/register',
        [ShowRegisterFormController::class, 'handle'],
    )->name('show-register-form');

    Router::get(
        '/user/log-in',
        [new ShowLoginFormController(), 'handle'],
    )->name('show-login-form');

    Router::post(
        '/register',
        [new RegisterUserController(), 'handle'],
    )->name('register-user');

    Router::post(
        '/user/log-in',
        [new LogInUserController(), 'handle'],
    )->name('log-in-user');

    Router::get(
        '/user/log-out',
        [new LogOutUserController(), 'handle'],
    )->name('log-out-user');

    Router::get(
        '/user/dashboard',
        [new UserDashboardController(), 'handle'],
    )->name('show-user-dashboard');

    Router::get(
        '/user/details',
        [new UserDetailsController(), 'handle']
    )->name('user-details');

    Router::get(
        '/user/orders',
        [new UserOrdersController(), 'handle']
    )->name('user-orders');

    Router::post(
        '/user/details',
        [new UpdateUserDetailsController(), 'handle']
    )->name('update-details');

    Router::post(
        '/user/change',
        [new ChangeUserPasswordController(), 'handle']
    )->name('change-password');
};