<?php

declare(strict_types=1);

namespace App\Providers;

use Memcached as M;
use Redis as R;
use Omega\Cache\Adapter\Apcu;
use Omega\Cache\Adapter\File;
use Omega\Cache\Adapter\Memcached;
use Omega\Cache\Adapter\Redis;
use Omega\Cache\Exceptions\UnsupportedAdapterException;
use Omega\Container\Provider\AbstractServiceProvider;
use Omega\Support\Facades\Config;

class CacheServiceProvider extends AbstractServiceProvider
{
    public function boot(): void
    {
        $config  = Config::get('cache');
        $default = $config['default'];

        $this->registerAllDrivers($config, $default);

        $type = $config[$default]['type'] ?? null;

        if (!$type) {
            throw new UnsupportedAdapterException('Type is not defined.');
        }

        $instance = match ($type) {
            'apcu'      => new Apcu($config[$default]),
            'file'      => new File($config[$default]),
            'memcached' => $this->createMemcached($config[$default]),
            'redis'     => $this->createRedis($config[$default]),
            default     => throw new UnsupportedAdapterException('Unrecognized type.')
        };

        $this->app->instance('cache', $instance);
    }

    public function registerAllDrivers(array $config, string $default): void
    {
        $map = [];

        foreach ($config as $key => $driverConfig) {
            if (! is_array($driverConfig) || ! isset($driverConfig['type'])) {
                continue;
            }

            $type = $driverConfig['type'];

            if ($key === $default) {
                continue;
            }

            $callback = match ($type) {
                'apcu'      => fn () => new Apcu($driverConfig),
                'file'      => fn () => new File($driverConfig),
                'memcached' => fn () => $this->createMemcached($driverConfig),
                'redis'     => fn () => $this->createRedis($driverConfig),
                default     => fn () => throw new UnsupportedAdapterException("Unrecognized cache type: $type")
            };

            $this->app->set("cache.{$key}", $callback);

            $map[$key] = "cache.{$key}";
        }

        $this->app->set('caches', $map);
    }

    public function createMemcached(array $config): Memcached
    {
        $memcached = new M();

        /** @var string $host */
        $host = Config::get('cache.memcached.host');

        /** @var int $port */
        $port = Config::get('cache.memcached.port');

        $memcached->addServer($host, $port);

        return new Memcached($memcached, $config);
    }

    public function createRedis(array $config): Redis
    {
        $redis = new R();

        /** @var string $host */
        $host = Config::get('cache.redis.host');

        /** @var int $port */
        $port = Config::get('cache.redis.port');

        $redis->connect($host, $port);

        return new Redis($redis, $config);
    }
}
