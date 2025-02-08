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

use function mb_strimwidth;
use function mb_strwidth;
use function rtrim;
use function ucwords;

/**
 * Product model.
 *
 * @category   App
 * @package    Http
 * @subpackage Models
 * @link       https://omegamvc.github.io
 * @author     Adriano Giovannini <agisoftt@gmail.com>
 * @copyright  Copyright (c) 2024 - 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license    https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version    1.0.0
 *
 * @method static Product all(): string
 * @method static Product where(string $string, array $array)
 * @method static Product first()
 */
class Product extends AbstractModel
{
    /**
     * Orders table.
     *
     * @var string $table Holds the name for the orders table.
     */
    protected string $table = 'products';

    /**
     * Get name attribute.
     *
     * @param string $value Holds the attribute value.
     * @return string Return the attribute.
     */
    public function getNameAttribute(string $value): string
    {
        return ucwords($value);
    }

    /**
     * Set description attribute.
     *
     * @param string $value Holds the attribute value.
     * @return string Return the attribute.
     */
    public function setDescriptionAttribute(string $value): string
    {
        $limit = 50;
        $ending = '...';

        if (mb_strwidth($value, 'UTF-8') <= $limit) {
            return $value;
        }

        return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')) . $ending;
    }
}
