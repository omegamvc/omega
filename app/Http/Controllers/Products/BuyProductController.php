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

use Exception;
use App\Models\Order;
use Omega\Support\Facade\Facades\Csrf;
use Omega\Support\Facade\Facades\View;

/**
 * Buy product controller class.
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
class BuyProductController
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

        $order_id = $_POST['order_id'];
        $order    = Order::where('id', $order_id)->first();

        $data = [
            'is_confirmed'         => true,
            'completed_at'         => now(),
            'notes'                => $_POST['notes']                ?? null,
            'delivery_instruction' => $_POST['delivery_instruction'] ?? null,
        ];

        $order->is_confirmed         = $data['is_confirmed'];
        $order->completed_at         = $data['completed_at'];
        $order->notes                = $data['notes'];
        $order->delivery_instruction = $data['delivery_instruction'];

        $order->save();

        return View::render('products/buy-product', [
            'order' => $order,
        ]);
    }
}
