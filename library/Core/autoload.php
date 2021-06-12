<?php

require __DIR__ . '/../../vendor/autoload.php';
require '/baka/src/functions.php';

use function Baka\appPath;
use function Baka\envValue;
use Dotenv\Dotenv;
use Phalcon\Loader;

// Load environment
if (envValue('APP_ENV') !== 'production') {
    $dotenv = Dotenv::createImmutable(appPath());
    $dotenv->load();
}

if (envValue('INTERNAL_DEV', false)) {
    $loader = new Loader();
    $namespaces = [
        'Baka' => '/baka/src',
        'Canvas' => '/canvas-core/src',
        'Kanvas\Libraries' => '/kanvas-library/src',
        'Kanvas\Packages' => '/kanvas-library/src',
        'Gewaer' => appPath('/library'),
        'Gewaer\Api\Controllers' => appPath('/api/controllers'),
        'Gewaer\Cli' => appPath('/cli'),
        'Gewaer\Tests' => appPath('/tests')
    ];
    $loader->registerNamespaces($namespaces);
    $loader->register();
}
