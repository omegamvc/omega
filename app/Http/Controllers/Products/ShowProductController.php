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
use App\Models\Product;
use Omega\Support\Facade\Facades\Csrf;
use Omega\Support\Facade\Facades\Router;
use Omega\Support\Facade\Facades\View;

/**
 * Show product controller.
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
class ShowProductController
{
    /**
     * Handle the controller.
     *
     * @return \Omega\View\View Return an instance of View.
     *
     * @throws Exception
     */
    public function handle(): \Omega\View\View
    {
        $parameters = Router::getCurrent()->getParameters();
        $product    = Product::find((int)$parameters['product']);

        return View::render('products/view', [
            'product'     => $product,
            'orderAction' => Router::route('order-product', [
                'product' => $product->id,
            ]),
            'csrf' => Csrf::generateToken(),
        ]);
    }
}
