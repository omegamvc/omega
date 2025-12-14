<?php

declare(strict_types=1);

namespace App\Providers;

use App\Middlewares\AppMiddleware;
use Omega\Container\Provider\AbstractServiceProvider;
use Omega\Router\Router;

use function file_exists;
use function is_string;
use function str_contains;
use function unserialize;

class RouteServiceProvider extends AbstractServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        if (file_exists($cache = $this->app->getApplicationCachePath() . 'route.php')) {
            $routes = require $cache;

            foreach ($routes as $route) {
                if (is_string($route['function']) && str_contains($route['function'], 'SerializableClosure')) {
                    $route['function'] = unserialize($route['function'])->getClosure();
                }
                Router::addRoutes($route);
            }
        } else {
            Router::middleware([
                // middleware
                AppMiddleware::class,
            ])->group(
                fn () => [
                    require_once get_path('path.base', '/routes/web.php'),
                    require_once get_path('path.base', '/routes/api.php'),
                ]
            );
        }

        require_once get_path('path.base', '/routes/schedule.php');
    }
}
