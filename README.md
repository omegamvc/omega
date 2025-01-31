<p align="center">
    <a href="https://omegamvc.github.io" target="_blank">
        <img src="https://github.com/omegamvc/omega-assets/blob/main/images/logo-omega.png" alt="Omega Logo">
    </a>
</p>

<p align="center">
    <a href="https://omegamvc.github.io">Documentation</a> |
    <a href="https://github.com/omegamvc/omegamvc.github.io/blob/main/README.md#changelog">Changelog</a> |
    <a href="https://github.com/omegamvc/omega/blob/main/CONTRIBUTING.md">Contributing</a> |
    <a href="https://github.com/omegamvc/omega/blob/main/CODE_OF_CONDUCT.md">Code Of Conduct</a> |
    <a href="https://github.com/omegamvc/omega/blob/main/LICENSE">License</a>
</p>

# Omega Framework: Example Application Overview

This is an example application built with the Omega framework. Visit the official [Omega](https://omegamvc.github.io) website to learn more about its structure, controllers, models, views, and features.

## System Requirements

To successfully run this application, ensure you meet the following requirements:

- **PHP Version**: 8.2 or later
- **Web server**: Apache 2.4 or later with `mod_rewrite` enabled
- **Database**: MySQL 8.0+, MariaDB 10.5+, or SQLite3

## Example Application Structure

In this section, we will explore the structure of the example application provided with Omega. Understanding the organization of the project's directories and files will help you navigate and customize the application effectively. Below is a breakdown of each folder's purpose within the example application.

```sh
omega
├─ app                          # Contains the core application logic.
│  ├─ Exceptions                # Custom exceptions for handling errors in the application.
│  ├─ Http                      # Contains HTTP-related logic such as controllers, middleware, and requests.
│  │  └─ Controllers            # The controllers that handle HTTP requests and return responses.
│  └─ Models                    # Contains the models, which represent the data structure and business logic.
├─ bootstrap                    # Contains the files for bootstrapping the application.
├─ config                       # Configuration files for the application (e.g., database, services).
├─ database                     # Contains database-related files such as migrations and seeds.
│  ├─ migrations                # Database migration files for setting up and modifying the database schema.
│  │  └─ schemes                # Database schema definitions, typically the tables and their structure.
│  └─ sqlite                    # Database-related files specific to SQLite (if used).
├─ public                       # Publicly accessible files (e.g., front-end assets and entry point).
├─ resources                    # Contains resource files such as views, assets, and localization files.
│  ├─ images                    # Image files used by the application.
│  └─ views                     # Templates or view files used to render HTML pages.
├─ routes                       # Contains route definitions that map URLs to application logic.
├─ storage                      # Directory for application-generated files (e.g., logs, cache, uploaded files).
│  ├─ app                       # Application-specific storage (e.g., user-uploaded files).
│  ├─ framework                 # Framework-generated storage files (e.g., cache, sessions, views).
│  │  └─ data                   # Internal data storage for the framework.
│  │     ├─ cache               # Cached data to improve performance.
│  │     └─ views               # Compiled view files to speed up rendering.
│  └─ logs                      # Log files generated by the application.
└─ tests                        # Contains unit and feature tests for the application.

```

## Installing Example Application

Install **Omega** by running the following command:

```sh
composer create-project omegamvc/omega omega
```

> This command does not download the dependencies listed in require-dev due to the .gitattributes settings. If you want to work with the complete source code, consider the options below.

### Cloning the repository

If you prefer to work directly with the full source code, clone the repository:

```sh
git clone https://github.com/omegamvc/omega.git
```

After cloning, install all dependencies, including development ones, with:

```sh
composer install
```

### Option --prefer-source

If you want to install the project while keeping the source code and dependencies for easier debugging or development, use the --prefer-source option:

```sh
composer create-project omegamvc/omega omega --prefer-source
```

## Configuration

The example application offers several areas where its behavior can be customized. All these customizations can be found in the `config` folder.

In this section, we will review the most important ones.

### Customizing the Cache Configuration

The `config/cache.php` file lets you define how caching works in your application.

The configuration array is structured as follows:

```php
return [
    'default'  => env('CACHE_DRIVER', 'file'),
    'memory'   => [
        'type'    => 'memory',
        'seconds' => env('CACHE_SECONDS', '31536000'),
    ],
    'file'     => [
        'type'    => 'file',
        'seconds' => env('CACHE_SECONDS', '31536000'),
        'path'    => Path::getPath('storage','framework/data/cache'),
    ],
    'memcache' => [
        'type'    => 'memcache',
        'host'    => env('MEMCACHE_HOST', '127.0.0.1'),
        'port'    => env('MEMCACHE_PORT', '11211'),
        'seconds' => env('CACHE_SECONDS', '31536000'),
    ],
];
```

Here's what each parameter means:

* `default`: *(Default: **file**)* Specifies the currently selected cache driver.
* `seconds`: Allows you to set the cache expiration time in seconds.
* `path`: Lets you specify an alternative path where the cache will be stored.
* `host`: Specifies the server where Memcached is running.
* `port`: Specifies the port where Memcached is listening.

> All configuration parameters can be overridden using the `.env` file.

Example of custom cache path:

```php
'path' => Path::getPath('your_custom_cache_path', 'your_custom_cache_dir')
```

### Setting Up the Database

The `config/database.php` file allows you to configure the database engine you want to use and in the case of sqlite3, specify a file to use as the database.

The configuration array is structured as follows:

```php
return [
    'default' => env('DB_CONNECTION', 'mysql'),

    'mysql'   => [
        'type'     => 'mysql',
        'host'     => env('DB_HOST', '127.0.0.1'),
        'port'     => env('DB_PORT', '3306'),
        'database' => env('DB_DATABASE', 'omega'),
        'username' => env('DB_USERNAME', 'root'),
        'password' => env('DB_PASSWORD', 'vb65ty4'),
    ],
    'sqlite'  => [
        'type' => 'sqlite',
        'path' => Path::getPath('database', 'sqlite/database.sqlite'),
    ],
];
```

Here's what each parameter means:

* `default`: (Default: **mysql**) Specifies the default database engine to use.
* `host`: Allows you to specify the server where the database engine is running.
* `port`: Lets you specify a port other than the default one where the database engine is listening.
* `database`: Specifies the name of the database to use.
* `username`: This is the username for accessing the database.
* `password`: This is the password for accessing the database.

> All configuration parameters can be overridden using the `.env` file.


Example of custom database path:

```php
use Omega\Utils\Path;

'path' => Path::getPath('yout_custom_databae__path', 'your_custom_sqlite_path/database.sqlite')
```

Once configured, create tables and populate them with sample data using:

```sh
composer db_migrate
```

To delete all tables and data, run:

```sh
composer db_fresh
```

> Note that the `composer db_fresh` command is irreversible and will destroy all data, including tables and restoring the default contents.

> In the case of `mysql/mariadb`, the database will be created automatically, and there is no need to create it manually.


## Analysis

### Static Code Analysis with PHPStan

To run static analysis with `PHPStan`, use the command:

```sh
composer phpstan
```

### Static Code Analysis with Code Sniffer

To check the code with `Code Sniffer`, run the command:

```sh
composer phpcs
```

## Generating API Documentation with phpDocumentor

To generate the documentation, run the command.

```sh
composer phpdoc
```

> Make sure you have the `phpDocumentor.phar 3.5+` executable installed in the `vendor/bin` directory.

## Testing

### Running Unit Tests with PHPUnit

To run the tests with `PHPUnit`, type the command:

```sh
composer phpunit
```

> Note that the command above will run tests for the classes contained in the `app` and `vendor/omegamvc` directories.

### Generating Code Coverage Reports

Omega supports code coverage with, requiring `xdebug` to be installed and configured on your system.

Here’s a basic working `xdebug` configuration for `Ubuntu 24.04`:

```sh
// File name: /etc/php/your_php_version/mods_available/xdebug.ini

zend_extension=xdebug.so       
xdebug.show_exception_trace=0
xdebug.mode=coverage
zend_assertion=1
assert.exception=1
```

In accordance with the `phpunit` documentation, you should also ensure that the `error_reporting` and `memory_limit` variables are set as follows in the `/etc/php/your_php_version/cli/php.ini` file:

```sh
error_reporting=-1
memory_limit=-1
```

For more information, you can refer to the official documentation of [phpunit](docs.phpunit.de/en/11.4/installation.html)

## Using the PHP Built-In Server with Omega

Omega has a script that starts the built-in PHP server. However, please note that due to the absence of `pcntl` extensions, the verbosity level on Windows operating systems is lower than that on Linux and MacOSX.

```sh
php omega serve
```

The `serve` command can be customized by modifying the `.env` file:

```sh
APP_HOST=server_name_or_ip
APP_PORT=port_number
```

Alternatively, you can pass the address and port of your server to the serve command.

```sh
composer serve --host=server_name_or_ip --port=port_number
```

## Additional Configuration and Setup Notes

### Setting Up Nginx for Omega

The follow is a simple configuration per `nginx`

```sh
server {
    listen 80;
    server_name example.com;

    root /var/www/your_project_name/public;
    index index.php index.html index.htm;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }

    access_log /var/log/nginx/server_name_access.log;
    error_log /var/log/nginx/server_name_error.log;
}
```

Where:

* `root`: Sets the path to the public directory of your Omega project, which contains the `index.php` file.
* `try_files`: Ensures that all requests are handled by the index.php file if no matching file is found, as is typical in an MVC application
* `fastcgi_pass`: Instructs Nginx to forward PHP requests to the PHP-FPM server. Make sure the PHP-FPM socket path (php8.x-fpm.sock) matches the PHP version installed on your system.
* `location ~ /.ht`: Prevents access to `.htaccess files`, which are not needed in Nginx but may still be present.

This configuration serves as a good starting point for both development and production environments. If needed, you can add further settings for security, performance, or other project-specific needs.

### Troubleshooting and Known Issues

#### PHPCS (Code Sniffer)

The `phpcs.xml.dist` file is preconfigured to save the cache in the `cache/phpcs` directory at the root of the project. If this directory does not exist, Code Sniffer cannot create it automatically, and you will need to create it manually.

To disable the cache, you can simply comment out or remove this line from the `phpcs.xml.dist` file.

```xml
<arg name="cache" value="cache/phpcs" />
```

If you prefer to choose a custom path that better suits your habits, you can simply modify it.

#### Errors When Running Commands from the Console

All commands defined in the `composer.json` file are prefixed with the variable `XDEBUG_MODE=off`. This prevents `xdebug` from producing an excessive amount of output if the configuration is set to `xdebug.mode=debug`or `xdebug.mode=debug,develop`. If you run commands that are not defined in the `composer.json` file, you can suppress these messages as follows:

```sh
XDEBUG_MODE=off php omega command_name options
```

## Official Documentation

The official documentation for Omega is available [here](https://omegamvc.github.io)

## Contributing

If you'd like to contribute to the Omega example application package, please follow our [contribution guidelines](CONTRIBUTING.md).

## License

This project is open-source software licensed under the [GNU General Public License v3.0](LICENSE).
