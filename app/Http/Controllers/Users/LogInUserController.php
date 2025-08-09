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
use Omega\Support\Facade\Facades\Response;
use Omega\Support\Facade\Facades\Router;
use Omega\Support\Facade\Facades\Session;
use Omega\Support\Facade\Facades\Validation;

use function password_verify;

/**
 * Login user controller.
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
class LogInUserController
{
    /**
     * Handle the controller.
     *
     * @return \Omega\Http\Response Redirect to proper page.
     * @throws Exception
     */
    public function handle(): \Omega\Http\Response
    {
        Csrf::validateToken($_POST['csrf']);

        $data = Validation::validate($_POST, [
            'email'    => ['required', 'email'],
            'password' => ['required', 'min:10'],
        ], 'login_errors');

        $user = User::where('email', $data['email'])->first();

        if ($user && password_verify($data['password'], $user->password)) {
            Session::put('user_id', $user->id);
        }

        return Response::redirect(Router::route('show-home-page'));
    }
}
