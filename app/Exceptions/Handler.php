<?php

/**
 * Part of Omega CMS - App/Exceptions Package
 * php version 8.3
 *
 * @link      https://omegamvc.github.io
 * @author    Adriano Giovannini <agisoftt@gmail.com>
 * @copyright Copyright (c) 2024 - 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license   https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version   1.0.0
 */

declare(strict_types=1);

namespace App\Exceptions;

use Throwable;
use Omega\Exceptions\ExceptionHandler;

/**
 * Exception handler class.
 *
 * @category    App
 * @package     App\Exceptions
 * @link        https://omegamvc.github.io
 * @author      Adriano Giovannini <agisoftt@gmail.com>
 * @copyright   Copyright (c) 2024 - 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
class Handler extends ExceptionHandler
{
    /**
     * Thrown an exception.
     *
     * @param Throwable $throwable Holds an instance of Throwable.
     * @return mixed
     * @throws Throwable
     */
    public function showThrowable(Throwable $throwable): mixed
    {
        return parent::showThrowable($throwable);
    }
}
