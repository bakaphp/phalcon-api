<?php

use function Baka\envValue;
use Canvas\Bootstrap\Cli;
use Swoole\Runtime;

require_once __DIR__ . '/../library/Core/autoload.php';

//Allow the user to use Swoole Coroutines in our CLI Space
if ((bool) envValue('SWOOLE_COROUTINE', 1)) {
    Runtime::enableCoroutine();
}

go(function () use ($argv) {
    $cli = new Cli();
    $cli->setArgv(isset($argv) ? $argv : []);
    $cli->setup();
    $cli->run();
});
