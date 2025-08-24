<?php

declare(strict_types=1);

namespace App\Providers;

use App\Middlewares\AppMiddleware;
use Omega\Container\Definition\Exceptions\InvalidDefinitionException;
use Omega\Container\Exceptions\DependencyException;
use Omega\Container\Exceptions\NotFoundException;
use Omega\Container\Provider\AbstractServiceProvider;
use Omega\Router\Router;

class RouteServiceProvider extends AbstractServiceProvider
{
    /**
     * @throws InvalidDefinitionException
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function boot(): void
    {
        Router::middleware([
            // middleware
            AppMiddleware::class,
        ])->group(
            fn () => [
                require_once get_path('path.base', '/routes/web.php'),
                require_once get_path('path.base', '/routes/api.php'),
            ]
        );

        require_once get_path('path.base', '/routes/schedule.php');
    }
}
