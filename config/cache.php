<?php

/**
 * Omega Application - config/cache configuration file.
 *
 * @link      https://omegamvc.github.io
 * @author    Adriano Giovannini <agisoftt@gmail.com>
 * @copyright Copyright (c) 2024 Adriano Giovannini. (https://omegamvc.github.io)
 * @license   https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 */

declare(strict_types=1);

/**
 * Return an array of cache configuration parameters.
 *
 * @category  Omega
 * @package   Config
 * @link      https://omegamvc.github.io
 * @author    Adriano Giovannini <agisoftt@gmail.com>
 * @copyright Copyright (c) 2024 Adriano Giovannini. (https://omegamvc.github.io)
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
    'default'  => env('CACHE_DRIVER', 'file'),
    'memory'   => [
        'type'    => 'memory',
        'seconds' => env('CACHE_SECONDS', '31536000'),
    ],
    'file'     => [
        'type'    => 'file',
        'seconds' => env('CACHE_SECONDS', '31536000'),
        'path'    => get_storage_path('framework/data/cache'),
    ],
    'memcache' => [
        'type'    => 'memcache',
        'host'    => env('MEMCACHE_HOST', '127.0.0.1'),
        'port'    => env('MEMCACHE_PORT', '11211'),
        'seconds' => env('CACHE_SECONDS', '31536000'),
    ],
];
