<?php

use function Baka\envValue;
use Canvas\Bootstrap\Cli;
use Swoole\Runtime;

require_once __DIR__ . '/../library/Core/autoload.php';

//Allow the user to use Swoole Coroutines in our CLI Space
if (envValue('SWOOLE_COROUTINE', 1)) {
    Runtime::enableCoroutine();

    Swoole\Coroutine\run(function () use ($argv) {
        $cli = new Cli();
        $cli->setArgv(isset($argv) ? $argv : []);
        $cli->setup();
        $cli->run();
    });
} else {
    $cli = new Cli();
    $cli->setArgv(isset($argv) ? $argv : []);
    $cli->setup();
    $cli->run();
}
