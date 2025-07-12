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
use Omega\Support\Facade\Facades\View;

use function password_verify;
use function password_hash;

/**
 * User change password controller.
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
class ChangeUserPasswordController
{
    /**
     * Handle the controller.
     *
     * @return \Omega\View\View Return an instance of View.
     * @throws Exception
     */
    public function handle(): \Omega\View\View
    {
        session();

        Csrf::validateToken($_POST['csrf']);

        $data = [
            'user_id'     => $_POST['user_id'],
            'oldpassword' => $_POST['oldpassword'],
            'password'    => $_POST['password'],
            'password2'   => $_POST['password2'],
        ];

        $user = User::where('id', $data['user_id'])->first();

        if (!password_verify($data['oldpassword'], $user->password)) {
            throw new Exception('Wrong old password');
        }

        if ($data['password'] === $data['password2']) {
            $user->password = password_hash($data['password'], PASSWORD_BCRYPT);
            $user->save();
        }

        return View::render('users/dashboard');
    }
}
