<?php

/**
 * Omega Application - config/database configuration file.
 *
 * @link      https://omegamvc.github.io
 * @author    Adriano Giovannini <agisoftt@gmail.com>
 * @copyright Copyright (c) 2024 - 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license   https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 */

declare(strict_types=1);

use Omega\Support\Path;

/**
 * Return an array of database configuration parameters.
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
     * Default Database Connection Name.
     *
     * here you may specify which of the database connection below you wish
     * to use as your default connection for all database work.  Of course,
     * you may use many connection at once using the Database library.
     */
    'default' => env('DB_CONNECTION', 'mysql'),

    /**
     * Database connection.
     *
     * Here are each of the database connections setup for your application.
     * Of course,  example  of configuring  each database  platform that  is
     * supported by Omega is shown below to make development simple.
     *
     * All database work in Omega  is done through the PH PDO  facilities so
     * make sure you have the  driver for your particular  database of cache
     * installed on your machine before you being development.
     */
    'mysql'   => [
        'type'     => 'mysql',
        'host'     => env('DB_HOST', '127.0.0.1'),
        'port'     => env('DB_PORT', '3306'),
        'database' => env('DB_DATABASE', 'omega'),
        'username' => env('DB_USERNAME', 'root'),
        'password' => env('DB_PASSWORD', ''),
        'charset'  => env('DB_CHARSET', 'utf8mb4'),
    ],
    'sqlite'  => [
        'type' => 'sqlite',
        'path' => Path::getPath('database', 'sqlite/database.sqlite'),
    ],
];
