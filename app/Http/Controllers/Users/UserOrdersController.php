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

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Omega\Support\Facade\Facades\Session;
use Omega\Support\Facade\Facades\View;

/**
 * User order controller.
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
class UserOrdersController
{
    /**
     * Handle the controller.
     *
     * @return \Omega\View\View Return the rendered view.
     */
    public function handle(): \Omega\View\View
    {
        $user_id = Session::get('user_id');
        $orders  = Order::all($user_id);

        foreach ($orders as $order) {
            $order->name         .= User::where('id', $user_id)->first()->name;
            $order->product_name .= Product::where('id', $order->product_id)->first()->name;
        }

        return View::render('users/orders', [
            'orders' => $orders,
        ]);
    }
}
