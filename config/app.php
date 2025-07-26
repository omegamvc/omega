<?php

declare(strict_types=1);

use App\Providers\AppServiceProvider;
use App\Providers\CacheServiceProvider;
use App\Providers\DatabaseServiceProvider;
use App\Providers\RouteServiceProvider;
use App\Providers\ViewServiceProvider;
use Omega\Support\Path;


return [
    'BASEURL'        => env('BASEURL', 'http://localhost'),
    'TIME_ZONE'      => env('TIME_ZONE', 'UTC'),
    'APP_KEY'        => env('APP_KEY', ''),
    'ENVIRONMENT'    => env('APP_ENV', 'dev'),
    'APP_DEBUG'      => (bool) env('APP_DEBUG', ''),
    'BCRYPT_ROUNDS'  => (int) env('BCRYPT_ROUNDS', 12),
    'CONFIG_PATH'    => (string)env('CONFIG_PATH', Path::getPath('app.config')),
    'CONFIG_STORAGE' => env('CONFIG_STORAGE', 'file'),

    'COMMAND_PATH'     => DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Commands' . DIRECTORY_SEPARATOR,
    'CONTROLLER_PATH'  => DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR,
    'MODEL_PATH'       => DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR,
    'MIDDLEWARE'       => DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Middlewares' . DIRECTORY_SEPARATOR,
    'SERVICE_PROVIDER' => DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Providers' . DIRECTORY_SEPARATOR,
    'CONFIG'           => DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR,
    'SERVICES_PATH'    => DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Services' . DIRECTORY_SEPARATOR,
    'VIEW_PATH'        => DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR,
    'COMPONENT_PATH'   => DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR,
    'STORAGE_PATH'     => DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR,
    'CACHE_PATH'       => DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR .
        'cache' .
        DIRECTORY_SEPARATOR,
    'CACHE_VIEW_PATH'  => DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR .
        'view' .
        DIRECTORY_SEPARATOR,
    'PUBLIC_PATH'      => DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR,
    'MIGRATION_PATH'   => DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'migration' . DIRECTORY_SEPARATOR,
    'SEEDER_PATH'      => DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'seeders' . DIRECTORY_SEPARATOR,
];
