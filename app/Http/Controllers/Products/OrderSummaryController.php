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

namespace App\Http\Controllers\Products;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Omega\Support\Facade\Facades\Csrf;
use Omega\Support\Facade\Facades\Router;
use Omega\Support\Facade\Facades\Session;
use Omega\Support\Facade\Facades\View;

/**
 * Order summary controller class.
 *
 * @category   App
 * @package    App\Http
 * @subpackage Controllers\Products
 * @link       https://omegamvc.github.io
 * @author     Adriano Giovannini <agisoftt@gmail.com>
 * @copyright  Copyright (c) 2024 - 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license    https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version    1.0.0
 */
class OrderSummaryController
{
    /**
     * Handle the controller.
     *
     * @return \Omega\View\View Return an instance of View.
     */
    public function handle(): \Omega\View\View
    {
        $orderId             = Session::get('order_id');
        $order               = Order::find((int)$orderId);
        $order->user_name    = User::find($order->user_id)->name;
        $order->product_name = Product::find($order->product_id)->name;

        return View::render('products/summary', [
            'order'        => $order,
            'deleteAction' => Router::route('delete-product'),
            'buyAction'    => Router::route('buy-product'),
            'csrf'         => Csrf::generateToken(),
        ]);
    }
}
