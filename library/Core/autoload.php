<?php

require __DIR__ . '/../../vendor/autoload.php';

use function Baka\appPath;
use function Baka\envValue;
use Dotenv\Dotenv;
use Phalcon\Loader;

// Load environment
$dotenv = Dotenv::createImmutable(appPath());
$dotenv->load();
