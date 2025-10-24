<?php

declare(strict_types=1);

return [
    'cache' => [
        'default' => env('CACHE_STORAGE', 'file'),
        'storage' => [
            'file'      => [],
            'array'     => [],
            'memcached' => [],
            'redis'     => [],
            'database'  => [],
        ],
    ]
];
