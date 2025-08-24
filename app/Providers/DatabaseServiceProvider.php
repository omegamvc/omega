<?php

declare(strict_types=1);

namespace App\Providers;

use DI\DependencyException;
use DI\NotFoundException;
use Omega\Database\MyPDO;
use Omega\Database\MyQuery;
use Omega\Database\MySchema;
use Omega\Container\Provider\AbstractServiceProvider;

class DatabaseServiceProvider extends AbstractServiceProvider
{
    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function boot(): void
    {
        $configs = $this->app->get('config');
        $sql_dsn = [
            'host'           => $configs['dbhost'],
            'user'           => $configs['dbuser'],
            'password'       => $configs['dbpass'],
            'database_name'  => $configs['dbname'],
        ];

        $this->app->set('dsn.sql', $sql_dsn);

        $this->app->set(
            MyPDO::class,
            fn () => new MyPDO($sql_dsn)
        );

        $this->app->set(
            MySchema\MyPDO::class,
            fn () => new MySchema\MyPDO($sql_dsn)
        );

        $this->app->set(
            'MyQuery',
            fn () => new MyQuery($this->app->get(MyPDO::class))
        );

        $this->app->set(
            'MySchema',
            fn () => new MySchema($this->app->get(MySchema\MyPDO::class))
        );
    }
}
