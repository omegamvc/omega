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
use Omega\Support\Facade\Facades\View;

/**
 * Delete product controller class.
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
class DeleteProductController
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

        $order_id = $_POST['order_id'];

        $order = Order::where('id', $order_id)->first();

        Order::where('id', $order_id)->delete();

        return View::render('products/delete-product', [
            'order' => $order,
        ]);
    }
}
