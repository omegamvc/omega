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
 * Profile model.
 *
 * @category   App
 * @package    Http
 * @subpackage Models
 * @link       https://omegamvc.github.io
 * @author     Adriano Giovannini <agisoftt@gmail.com>
 * @copyright  Copyright (c) 2024 - 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license    https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version    1.0.0
 */
class Profile extends AbstractModel
{
    /**
     * Orders table.
     *
     * @var string $table Holds the name for the orders table.
     */
    protected string $table = 'profiles';

    /**
     * User model.
     *
     * @return Relationship Return the current relationship instance.
     */
    public function user(): Relationship
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
