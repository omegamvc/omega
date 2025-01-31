<?php

/**
 * Part of Omega CMS - App/Http Package.
 * php version 8.3
 *
 * @link      https://omegamvc.github.io
 * @author    Adriano Giovannini <agisoftt@gmail.com>
 * @copyright Copyright (c) 2024 Adriano Giovannini. (https://omegamvc.github.io)
 * @license   https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version   1.0.0
 */

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use Omega\Facade\Facades\Cache;
use Omega\Facade\Facades\Router;
use Omega\Facade\Facades\Session;
use Omega\Facade\Facades\View;

use function array_map;

/**
 * Show home page controller class.
 *
 * @category   App
 * @package    App\Http
 * @subpackage Controllers\Users
 * @link       https://omegamvc.github.io
 * @author     Adriano Giovannini <agisoftt@gmail.com>
 * @copyright  Copyright (c) 2024 Adriano Giovannini. (https://omegamvc.github.io)
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

            if (!Cache::has($key)) {
                Cache::put($key, Router::route('view-product', [ 'product' => $product->id ]));
            }

            $product->route = Cache::get($key);

            return $product;
        }, $products);

        return View::render('home', [
            'user_id'  => $user_id,
            'products' => $productsWithRoutes,
        ]);
    }
}
