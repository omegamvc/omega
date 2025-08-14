<?php

declare(strict_types=1);

namespace App\Commands;

use App\Commands\Cron\Log;
use Omega\Console\Style\Style;
use Omega\Cron\Schedule;
use Omega\Console\Commands\CronCommand as ConsoleCronCommand;
use Omega\Time\Now;
use React\EventLoop\Loop;

use function microtime;
use function round;

class CronCommand extends ConsoleCronCommand
{
    public function __construct($argv, $defaultOption = [])
    {
        parent::__construct($argv, $defaultOption);

        $this->log = new Log();
    }

    public static array $command = [
        [
            'pattern'       => 'cron',
            'fn'            => [self::class, 'main'],
        ], [
            'pattern'       => 'cron:list',
            'fn'            => [self::class, 'list'],
        ], [
            'pattern'       => 'cron:work',
            'fn'            => [self::class, 'work'],
        ],
    ];

    public function work(): void
    {
        $print = new Style("\n");
        $print
            ->push('Simulate Cron in terminal (every minute)')->textBlue()
            ->newLines(2)
            ->push('type ctrl+c to stop')->textGreen()->underline()
            ->out();

        Loop::addPeriodicTimer(60.00, function () {
            /** @noinspection DuplicatedCode */
            $clock = new Now();
            $print = new Style();
            $time  = $clock->year . '-' . $clock->month . '-' . $clock->day;

            $print
                ->push('Run cron at - ' . $time)->textDim()
                ->push(' ' . $clock->hour . ':' . $clock->minute . ':' . $clock->second);

            $watchStart = microtime(true);

            $this->getSchedule()->execute();

            $watchEnd = round(microtime(true) - $watchStart, 3) * 1000;
            $print
                ->repeat(' ', 34 - $print->length())
                ->push('-> ')->textDim()
                ->push($watchEnd . 'ms')->textYellow()
                ->out()
            ;
        });
    }

    public function scheduler(Schedule $schedule): void
    {
        $schedule->call(function () {
            return [
                'code' => 200,
            ];
        })
        ->retry(2)
        ->justInTime()
        ->animusly()
        ->eventName('schedule.from.' . __CLASS__);
    }
}
