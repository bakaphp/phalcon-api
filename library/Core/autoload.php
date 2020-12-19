<?php

require __DIR__ . '/../../vendor/autoload.php';

use function Baka\appPath;
use function Baka\envValue;
use Dotenv\Dotenv;
use Phalcon\Loader;

require '/baka/src/functions.php';

// Load environment
$dotenv = Dotenv::createImmutable(appPath());
$dotenv->load();

if (envValue('INTERNAL_DEV', false)) {
    $loader = new Loader();
    $namespaces = [
        'Canvas' => '/canvas-core/src',
        'Baka' => '/baka/src',
        'Phalcon\Cashier' => '/baka/cashier/src',
        'Gewaer' => appPath('/library'),
        'Gewaer\Api\Controllers' => appPath('/api/controllers'),
        'Gewaer\Cli' => appPath('/cli'),
        'Gewaer\Tests' => appPath('/tests')
    ];
    $loader->registerNamespaces($namespaces);
    $loader->register();
}
