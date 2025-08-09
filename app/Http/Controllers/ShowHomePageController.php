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

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use Omega\Support\Facade\Facades\Cache;
use Omega\Support\Facade\Facades\Router;
use Omega\Support\Facade\Facades\Session;
use Omega\Support\Facade\Facades\View;

use function array_map;

/**
 * Show home page controller class.
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
class ShowHomePageController
{
    /**
     * Handle the controller.
     *
     * @return \Omega\View\View Return an instance of View.
     * @throws Exception
     */
    public function handle(): \Omega\View\View
    {
        $user_id            = Session::get('user_id');
        $products           = Product::all();
        $productsWithRoutes = array_map(function ($product) {
            $key = "route-for-product-{$product->id}";

            if (!Cache::hasItem($key)) {
                Cache::set($key, Router::route('view-product', [ 'product' => $product->id ]));
            }

            $product->route = Cache::getItem($key);

            return $product;
        }, (array) $products);

        return View::render('home', [
            'user_id'  => $user_id,
            'products' => $productsWithRoutes,
        ]);
    }
}
