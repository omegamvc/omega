<?php

/**
 * Part of Omega CMS - App/Models Package
 * php version 8.3
 *
 * @link      https://omegamvc.github.io
 * @author    Adriano Giovannini <agisoftt@gmail.com>
 * @copyright Copyright (c) 2024 - 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license   https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version   1.0.0
 */

declare(strict_types=1);

namespace App\Models;

use Omega\Database\AbstractModel;
use Omega\Database\Relationship;

/**
 * Model order class.
 *
 * @category    App
 * @package     Http
 * @subpackage  Models
 * @link        https://omegamvc.github.io
 * @author      Adriano Giovannini <agisoftt@gmail.com>
 * @copyright   Copyright (c) 2024 - 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 * @method static Order all(string $user_id): string
 * @method static Order where(string $string, array $array)
 * @method static Order first()
 */
class Order extends AbstractModel
{
    /**
     * Orders table.
     *
     * @var string Holds the name for the orders table.
     */
    protected string $table = 'orders';

    /**
     * User method.
     *
     * @return Relationship Return the current relationship instance.
     */
    public function user(): Relationship
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Product method.
     *
     * @return Relationship Return the current relationship instance.
     */
    public function product(): Relationship
    {
        return $this->belongsTo(Product::class, 'user_id');
    }
}
