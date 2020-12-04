<?php

namespace Zitto\Commandlog;

use Illuminate\Console\Scheduling\Schedule as Schedule;
use Illuminate\Console\Application;
use Illuminate\Container\Container;

class CommandLog extends Schedule
{

    /**
     * Add a new Artisan command event to the schedule.
     *
     * @param  string  $command
     * @param  array  $parameters
     * @return \Illuminate\Console\Scheduling\Event
     */
    public function command($command, array $parameters = [])
    {
        if (class_exists($command)) {
            $command = Container::getInstance()->make($command)->getName();
        }

        $log_file = storage_path('logs/' . str_replace(":", "-", $command) . "-" . date('Y-m-d') . '.log');

        return $this->exec(
            Application::formatCommandString($command),
            $parameters
        )->appendOutputTo($log_file);
    }
}
