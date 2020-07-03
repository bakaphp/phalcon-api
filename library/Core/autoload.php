<?php

use function Baka\appPath;
use Dotenv\Dotenv;

// Register the auto loader
require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . '/vendor/baka/baka/src/functions.php';

// Composer Autoloader.
require appPath('vendor/autoload.php');

// Load environment
$dotenv = Dotenv::createImmutable(appPath());
$dotenv->load();
