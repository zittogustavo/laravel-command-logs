# Laravel Commands Log
Create logs for laravel commands. 

## Overview
This simple package create a log for each schedule commmand that is executed in your Laravel project. The log is store in the storage/logs folder with name as: "command_name-date" (ex: inspire-2020-12-04.log).

## Installation
* Install via composer

`composer require zittogustavo/laravel-command-logs`

## Usage
In your Kernel.php file:

* Import vendor as:
`use Zitto\Commandlog\CommandLog;`

* Add following function: 
 ```
protected function defineConsoleSchedule() {
    $this->app->instance(
      Schedule::class,
      $schedule = new CommandLog()
    );

    $this->schedule($schedule);
}
```
