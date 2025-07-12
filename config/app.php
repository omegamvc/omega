<?php

/**
 * Omega Application - config/app file.
 *
 * @link      https://omegamvc.github.io
 * @author    Adriano Giovannini <agisoftt@gmail.com>
 * @copyright Copyright (c) 2024 - 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license   https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 */

declare(strict_types=1);

use Omega\Config\ServiceProvider\ConfigServiceProvider;
use Omega\Cache\ServiceProvider\CacheServiceProvider;
use Omega\Csrf\ServiceProvider\CsrfServiceProvider;
use Omega\Database\ServiceProvider\DatabaseServiceProvider;
use Omega\Filesystem\ServiceProvider\FilesystemServiceProvider;
use Omega\Http\ServiceProvider\ResponseServiceProvider;
use Omega\Logging\ServiceProvider\LoggingServiceProvider;
use Omega\Queue\ServiceProvider\QueueServiceProvider;
use Omega\Routing\ServiceProvider\RouterServiceProvider;
use Omega\Session\ServiceProvider\SessionServiceProvider;
use Omega\Validation\ServiceProvider\ValidationServiceProvider;
use Omega\View\ServiceProvider\ViewServiceProvider;
use Omega\Facade\Facades\Cache;
use Omega\Facade\Facades\Csrf;
use Omega\Facade\Facades\Config;
use Omega\Facade\Facades\Database;
use Omega\Facade\Facades\Filesystem;
use Omega\Facade\Facades\Logger;
use Omega\Facade\Facades\Queue;
use Omega\Facade\Facades\Response;
use Omega\Facade\Facades\Router;
use Omega\Facade\Facades\Session;
use Omega\Facade\Facades\Validation;
use Omega\Facade\Facades\View;

/**
 * Return an array with common application parameters.
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
     * Application Timezone.
     *
     * Specifies the default timezone used by application. This determines
     * how date and time values are formatted and displayed based on the
     * geographical location of the application.
     */
    'timezone'  => 'Europe/Rome',

    /**
     * Array of ServiceProviders.
     */
    'providers' => [
        ConfigServiceProvider::class,
        CacheServiceProvider::class,
        CsrfServiceProvider::class,
        DatabaseServiceProvider::class,
        //\Omega\Email\ServiceProvider\EmailServiceProvider::class,
        FilesystemServiceProvider::class,
        LoggingServiceProvider::class,
        QueueServiceProvider::class,
        ResponseServiceProvider::class,
        RouterServiceProvider::class,
        SessionServiceProvider::class,
        ValidationServiceProvider::class,
        ViewServiceProvider::class,
    ],

    /**
     * Array of facades class.
     */
    'facades'   => [
        'Config'     => Config::class,
        'Cache'      => Cache::class,
        'Csrf'       => Csrf::class,
        'Database'   => Database::class,
        //'Email' => \Omega\Facade\Facades\Email::class,
        'Filesystem' => Filesystem::class,
        'Logger'     => Logger::class,
        'Queue'      => Queue::class,
        'Response'   => Response::class,
        'Router'     => Router::class,
        'Session'    => Session::class,
        'Validator'  => Validation::class,
        'View'       => View::class,
    ],
];
