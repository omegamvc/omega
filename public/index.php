<?php

/**
 * Omega Application.
 *
 * @link       https://omegamvc.github.io
 * @author     Adriano Giovannini <agisoftt@gmail.com>
 * @copyright  Copyright (c) 2024 - 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license    https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 */

declare(strict_types=1);

define('OMEGA_START', microtime(true));

/**
 * Register the autoload.
 *
 * Composer  provides  a  convenient automatically generated class
 * loader for this application. We just need to utilize it!. We'll
 * simply  require  it  into  the script here,so we don't  need to
 * manually load our classes.
 */
require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Run the application.
 *
 * Once we have the application, we can handle the incoming request
 * using  the application's HTTP  kernel.  Then,  we  will send the
 * response  to this  client's  browser,  allowing the to enjoy our
 * application.
 */
$application = require_once __DIR__ . '/../bootstrap/app.php';
try {
    $application->bootstrap()->send();
} catch (Throwable $e) {

}
