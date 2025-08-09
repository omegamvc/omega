<?php

return [
    'commands' => [
        App\Commands\HelpCommand::$command,
        App\Commands\CronCommand::$command,
        Omega\Integrate\Console\MakeCommand::$command,
        Omega\Integrate\Console\ServeCommand::$command,
        Omega\Integrate\Console\RouteCommand::$command,
        Omega\Integrate\Console\MigrationCommand::$command,
        Omega\Integrate\Console\SeedCommand::$command,
        Omega\Integrate\Console\ViewCommand::$command,
        Omega\Integrate\Console\MaintenanceCommand::$command,
        Omega\Integrate\Console\ConfigCommand::$command,
        Omega\Integrate\Console\PackageDiscoveryCommand::$command,
        Omega\Integrate\Console\ClearCacheCommand::$command,
        // more command here
    ],
];
