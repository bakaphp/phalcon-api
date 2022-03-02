<?php

use Dotenv\Dotenv;
use function Canvas\Core\appPath;

// Register the auto loader
require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . '/vendor/canvas/core/src/Core/functions.php';

// Composer Autoloader.
require appPath('vendor/autoload.php');

// Load environment
(new Dotenv(appPath()))->overload();
