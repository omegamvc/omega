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

/**
 * Update details controller.
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
class UpdateUserDetailsController
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
            'user_id'  => $_POST['user_id'],
            'address'  => $_POST['address'],
            'address2' => $_POST['address2'],
        ];

        $user = User::where('id', $data['user_id'])->first();

        $user->address  = $data['address'];
        $user->address2 = $data['address2'];
        $user->save();

        return View::render('users/dashboard');
    }
}
