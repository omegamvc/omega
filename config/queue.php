<?php

/**
 * Omega Application - config/queue configuration file.
 *
 * @link      https://omegamvc.github.io
 * @author    Adriano Giovannini <agisoftt@gmail.com>
 * @copyright Copyright (c) 2024 - 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license   https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 */

declare(strict_types=1);

/**
 * Return an array of queue configuration parameters.
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
     * Default Queue Connection Name.
     *
     * Omega queue API supports an assortment of back-ends via s single
     * API, giving you  convenient  access to  each back-end using  the
     * same  syntax  for  every one.  Here  you  may  define  a default
     * connection.
     */
    'default' => 'database',

    /**
     * Queue Connections.
     *
     * Here  you may configure  the  connection  information  for  each
     * server  that is used your  application. A  default configuration
     * has for each back-end shipped  with Omega.  You are free to  add
     * more.
     *
     * Driver:
     *
     * `Database`
     */
    'database' => [
        'type'     => 'database',
        'table'    => 'jobs',
        'attempts' => 3,
    ],
];
