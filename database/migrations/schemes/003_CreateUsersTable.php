<?php

/**
 * Omega Application.
 *
 * @link       https://omegamvc.github.io
 * @author     Adriano Giovannini <agisoftt@gmail.com>
 * @copyright  Copyright (c) 2024 - 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license    https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 */

/**
 * @declare
 */
declare(strict_types=1);

/**
 * @namespace
 */
namespace Database\Migrations\Schemes;

/**
 * @use
 */
use Omega\Database\Adapter\AbstractDatabaseAdapter;

/**
 * Create users table class.
 *
 * @category    Application
 * @package     Application\Database
 * @subpackage  Application\Database\Migration
 * @link        https://omegamvc.github.io
 * @author      Adriano Giovannini <agisoftt@gmail.com>
 * @copyright   Copyright (c) 2024 - 2025 Adriano Giovannini (https://omegamvc.github.io)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
class CreateUsersTable
{
    /**
     * Table name.
     *
     * @var string Holds the table name.
     */
    public string $table = 'users';

    /**
     * Create table users.
     *
     * @param AbstractDatabaseAdapter $connection Holds the current connection instance.
     * @return void
     */
    public function up(AbstractDatabaseAdapter $connection): void
    {
        $table = $connection->createTable('users');
        $table->id('id');
        $table->string('name');
        $table->string('email');
        $table->string('password');
        $table->string('address')->default('');
        $table->string('address2')->default('');
        $table->execute();
    }

    /**
     * Rollback the migration (drop the 'users' table).
     *
     * @param AbstractDatabaseAdapter $connection Holds the current connection instance.
     * @return void
     */
    public function down(AbstractDatabaseAdapter $connection): void
    {
        $query = "DROP TABLE IF EXISTS `{$this->table}`";
        $connection->pdo()->prepare($query)->execute();
    }
}
