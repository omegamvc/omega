<?php

/**
 * Omega Application - config/cache configuration file.
 *
 * @link      https://omegamvc.github.io
 * @author    Adriano Giovannini <agisoftt@gmail.com>
 * @copyright Copyright (c) 2024 - 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license   https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 */

declare(strict_types=1);

use Omega\Support\Path;

/**
 * Return an array of cache configuration parameters.
 *
 * @category  Omega
 * @package   Config
 * @link      https://omegamvc.github.io
 * @author    Adriano Giovannini <agisoftt@gmail.com>
 * @copyright Copyright (c) 2024 - 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license   https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 */
return [
    /**
     * Default Cache Store.
     *
     * This option controls the default cache connection  that gets used while
     * using this caching library. This connection is used when another is not
     * explicit specified when executing a given config function.
     */
    'default'   => env('CACHE_DRIVER', 'file'),
    'apcu'      => [
        'type'    => 'apcu',
        'seconds' => (int) env('CACHE_SECONDS', '31536000'), // TTL predefinito (1 anno)
    ],
    'database'  => [
        'type'    => 'database',
        'table'   => env('DATABASE_CACHE_TABLE', 'omega_cache'),
        'seconds' => (int) env('CACHE_SECONDS', '31536000'),
    ],
    'file'      => [
        'type'    => 'file',
        'seconds' => (int) env('CACHE_SECONDS', '31536000'),
        'path'    => Path::getPath('storage', 'framework/data/cache'),
    ],
    'memcached' => [
        'type'    => 'memcached',
        'host'    => (string) env('MEMCACHE_HOST', '127.0.0.1'),
        'port'    => (int) env('MEMCACHE_PORT', '11211'),
        'seconds' => (int) env('CACHE_SECONDS', '31536000'),
    ],
    'memory'    => [
        'type'    => 'memory',
        'seconds' => env('CACHE_SECONDS', '31536000'),
    ],
    'redis'     => [
        'type'    => 'redis',
        'host'    => (string) env('REDIS_HOST', '127.0.0.1'),
        'port'    => (int) env('REDIS_PORT', '6379'),
        'seconds' => (int) env('CACHE_SECONDS', '31536000'),
    ]
];
