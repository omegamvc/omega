<?php

/**
 * Omega App - config/cache configuration file.
 *
 * @link      https://omegamvc.github.io
 * @author    Adriano Giovannini <agisoftt@gmail.com>
 * @copyright Copyright (c) 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license   https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 */

declare(strict_types=1);

/**
 * Return an array of cache configuration parameters.
 *
 * @category  App
 * @package   Config
 * @link      https://omegamvc.github.io
 * @author    Adriano Giovannini <agisoftt@gmail.com>
 * @copyright Copyright (c) 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license   https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 */
return [
    'cache' => [
        /**
         * Default Cache Store.
         *
         * This option controls the default cache connection  that gets used while
         * using this caching library. This connection is used when another is not
         * explicit specified when executing a given config function.
         */
        'default'   => env('CACHE_DRIVER', 'file'),

        /**
         * Cache Store
         *
         * Here you may define all the cache `stores for your application as
         * well as their drivers. You may even define multiple stores for the
         * same cache driver to group types of items stored in your caches.
         *
         * Supported drivers:
         *
         * - `apcu`
         * - `fie`
         * - `memcached`
         * - `redis`
         */
        'apcu'      => [
            'type'    => 'apcu',
            'seconds' => (int) env('CACHE_SECONDS', '31536000'), // TTL predefinito (1 anno)
        ],
        'file'      => [
            'type'    => 'file',
            'seconds' => (int) env('CACHE_SECONDS', '31536000'),
            'path'    => cache_path(),
        ],
        'memcached' => [
            'type'    => 'memcached',
            'host'    => (string) env('MEMCACHED_HOST', '127.0.0.1'),
            'port'    => (int) env('MEMCACHED_PORT', '11211'),
            'seconds' => (int) env('CACHE_SECONDS', '31536000'),
        ],
        'redis'     => [
            'type'    => 'redis',
            'host'    => (string) env('REDIS_HOST', '127.0.0.1'),
            'port'    => (int) env('REDIS_PORT', '6379'),
            'seconds' => (int) env('CACHE_SECONDS', '31536000'),
        ]
    ]
];
