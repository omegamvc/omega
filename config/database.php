<?php

declare(strict_types=1);

return [
    'db' => [
        'default'     => env('DB_CONNECTION', 'mysql'),
        'connections' => [
            'mysql' => [
                'driver'    => 'mysql',
                'host'      => env('DB_HOST', 'localhost'),
                'username'  => env('DB_USER', 'root'),
                'password'  => env('DB_PASS', ''),
                'database'  => env('DB_NAME', ''),
                'port'      => (int) env('DB_PORT', 3306),
                'charset'   => env('DB_CHARSET', 'utf8mb4'),
                'options'   => [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ],
            ],
            'mariadb' => [
                'driver'    => 'mariadb',
                'host'      => env('DB_HOST', 'localhost'),
                'username'  => env('DB_USER', 'root'),
                'password'  => env('DB_PASS', ''),
                'database'  => env('DB_NAME', ''),
                'port'      => (int) env('DB_PORT', 3306),
                'charset'   => env('DB_CHARSET', 'utf8mb4'),
                'options'   => [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ],
            ],
            'pgsql' => [
                'driver'   => 'pgsql',
                'host'     => env('DB_HOST', 'localhost'),
                'username' => env('DB_USER', 'root'),
                'password' => env('DB_PASS', ''),
                'database' => env('DB_NAME', ''),
                'port'     => (int) env('DB_PORT', 5432),
                'charset'  => env('DB_CHARSET', 'utf8'),
                'options'  => [
                    PDO::ATTR_CASE               => PDO::CASE_NATURAL,
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_ORACLE_NULLS       => PDO::NULL_NATURAL,
                    PDO::ATTR_STRINGIFY_FETCHES  => false,
                ],
            ],
            'sqlite' => [
                'driver'   => 'sqlite',
                'database' => DIRECTORY_SEPARATOR
                    . 'database'
                    . DIRECTORY_SEPARATOR
                    . env('DB_DATABASE', 'database.sqlite'),
                'options'  => [
                    PDO::ATTR_CASE               => PDO::CASE_NATURAL,
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_ORACLE_NULLS       => PDO::NULL_NATURAL,
                    PDO::ATTR_STRINGIFY_FETCHES  => false,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ],
            ],
        ],
    ],
];
