<?php

use Canvas\Bootstrap\Cli;
use Swoole\Runtime;

require_once __DIR__ . '/../library/Core/autoload.php';

//Allow the user to use Swoole Coroutines in our CLI Space
Runtime::enableCoroutine();

go(function () use ($argv) {
    $cli = new Cli();
    $cli->setArgv(isset($argv) ? $argv : []);
    $cli->setup();
    $cli->run();
});
