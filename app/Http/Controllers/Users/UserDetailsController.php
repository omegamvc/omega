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
use App\Models\User;
use Omega\Support\Facade\Facades\Csrf;
use Omega\Support\Facade\Facades\Router;
use Omega\Support\Facade\Facades\Session;
use Omega\Support\Facade\Facades\View;

/**
 * User details controller.
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
class UserDetailsController
{
    /**
     * Handle the controller.
     *
     * @return \Omega\View\View Return the rendered view.
     * @throws Exception
     */
    public function handle(): \Omega\View\View
    {
        $user_id = Session::get('user_id');
        $user    = User::where('id', $user_id)->first();

        return View::render('users/details', [
            'user'                 => $user,
            'updateDetailsAction'  => Router::route('update-details'),
            'changePasswordAction' => Router::route('change-password'),
            'csrf'                 => Csrf::generateToken(),
        ]);
    }
}
