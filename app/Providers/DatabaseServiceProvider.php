<?php

declare(strict_types=1);

namespace App\Providers;

use Omega\Container\Definition\Exceptions\InvalidDefinitionException;
use Omega\Container\Exceptions\DependencyException;
use Omega\Container\Exceptions\NotFoundException;
use Omega\Container\Provider\AbstractServiceProvider;
use Omega\Database\DatabaseManager;
use Omega\Database\Connection;
use Omega\Database\Query\Query;
use Omega\Database\Schema\Schema;
use Omega\Database\Schema\SchemaConnection;

class DatabaseServiceProvider extends AbstractServiceProvider
{
    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidDefinitionException
     */
    public function boot(): void
    {
        $configs     = $this->app->get('config');
        $default     = $configs['db.default'];
        $connections = $configs['db.connections'];
        $dsn         = $connections[$default];

        $this->app->set('dsn.default', $default);
        $this->app->set('dsn.connections', $connections);
        $this->app->set('dsn.sql', $dsn);

        $this->app->set(
            Connection::class,
            fn () => new Connection($this->app->get('dsn.sql'))
        );

        $this->app->set(
            SchemaConnection::class,
            fn () => new SchemaConnection($this->app->get('dsn.sql'))
        );

        $this->app->set(
            'Query',
            fn () => new Query($this->app->get(Connection::class))
        );

        $this->app->set(
            'Schema',
            fn () => new Schema($this->app->get(SchemaConnection::class), $this->app->get('dsn.sql')['database'])
        );

        $this->app->set(
            DatabaseManager::class,
            fn () => new DatabaseManager($this->app->get('dsn.connections'))
                ->setDefaultConnection($this->app->get(Connection::class))
        );
    }
}
