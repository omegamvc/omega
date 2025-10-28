<?php

declare(strict_types=1);

namespace App\Providers;

use Omega\Cache\CacheFactory;
use Omega\Container\Definition\Exceptions\InvalidDefinitionException;
use Omega\Container\Exceptions\DependencyException;
use Omega\Container\Exceptions\NotFoundException;
use Omega\Container\Provider\AbstractServiceProvider;
use Omega\Middleware\ThrottleMiddleware;
use Omega\RateLimiter\RateLimiterFactory;

class RateLimiterServiceProvider extends AbstractServiceProvider
{
    /**
     * @throws InvalidDefinitionException
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function boot(): void
    {
        $this->registerRateLimiterResolver();
        $this->registerThrottleMiddleware();
    }

    /**
     * @throws InvalidDefinitionException
     * @throws DependencyException
     * @throws NotFoundException
     */
    protected function registerRateLimiterResolver(): void
    {
        /** @var CacheFactory $cache */
        $cache   = $this->app->get('cache');
        $rate    = new RateLimiterFactory($cache);

        $this->app->set(RateLimiterFactory::class, fn () => $rate);
    }

    protected function registerThrottleMiddleware(): void
    {
        $rate = $this->app[RateLimiterFactory::class];
        $this->app->set(ThrottleMiddleware::class, fn() => new ThrottleMiddleware(
            limiter: $rate->createFixedWindow(
                limit: 60,
                windowSeconds: 60,
            )
        ));
    }
}
