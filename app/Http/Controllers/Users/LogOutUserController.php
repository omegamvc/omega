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

namespace App\Http\Controllers\Users;

use Exception;
use Omega\Support\Facade\Facades\Response;
use Omega\Support\Facade\Facades\Router;
use Omega\Support\Facade\Facades\Session;

/**
 * Logout user controller.
 *
 * @category   App
 * @package    App\Http
 * @subpackage Controllers\Users
 * @link       https://omegamvc.github.io
 * @author     Adriano Giovannini <agisoftt@gmail.com>
 * @copyright  Copyright (c) 2024 - 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license    https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version    1.0.0
 */
class LogOutUserController
{
    /**
     * Handle the controller.
     *
     * @return \Omega\Http\Response Redirect to appropriate page.
     * @throws Exception
     */
    public function handle(): \Omega\Http\Response
    {
        Session::flush('user_id');

        return Response::redirect(Router::route('show-home-page'));
    }
}
