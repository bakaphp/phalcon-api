<?php

require __DIR__ . '/../../vendor/autoload.php';

use function Baka\appPath;
use function Baka\envValue;
use Dotenv\Dotenv;
use Phalcon\Loader;

// Load environment
$dotenv = Dotenv::createImmutable(appPath());
$dotenv->load();

if (envValue('INTERNAL_DEV', false)) {
    $loader = new Loader();
    $namespaces = [
        'Gewaer' => appPath('/library'),
        'Gewaer\Api\Controllers' => appPath('/api/controllers'),
        'Gewaer\Cli' => appPath('/cli'),
        'Gewaer\Tests' => appPath('/tests')
    ];
    $loader->registerNamespaces($namespaces);
    $loader->register();
}
