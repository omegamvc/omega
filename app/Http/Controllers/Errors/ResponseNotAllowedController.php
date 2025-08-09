<?php

/**
 * Part of Omega CMS - App/Http Package.
 * php version 8.3
 *
 * @link      https://omegamvc.github.io
 * @author    Adriano Giovannini <agisoftt@gmail.com>
 * @copyright Copyright (c) 2024 - 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license   https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version   1.0.0
 */

declare(strict_types=1);

namespace App\Http\Controllers\Errors;

use Omega\Support\Facade\Facades\View;

/**
 * Error 400 controller.
 *
 * @category   App
 * @package    App\Http
 * @subpackage Controllers\Errors
 * @link       https://omegamvc.github.io
 * @author     Adriano Giovannini <agisoftt@gmail.com>
 * @copyright  Copyright (c) 2024 - 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license    https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version    1.0.0
 */
class ResponseNotAllowedController
{
    /**
     * Handle the controller.
     *
     * @return \Omega\View\View|string Return the view with 400 error message.
     */
    public function handle(): \Omega\View\View|string
    {
        return View::render('errors/error400');
    }
}
