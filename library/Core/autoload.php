<?php

use function Baka\appPath;
use function Baka\envValue;
use Dotenv\Dotenv;
use Phalcon\Loader;

// Register the auto loader
require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'vendor/baka/baka/src/functions.php';
//require '/baka/src/functions.php';

// Composer Autoloader.
require appPath('vendor/autoload.php');

// Load environment
$dotenv = Dotenv::createImmutable(appPath());
$dotenv->load();

// development mode
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
