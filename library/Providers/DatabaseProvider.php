<?php

declare(strict_types=1);

namespace Gewaer\Providers;

use function Baka\envValue;
use function Baka\isCLI;
use Canvas\Exception\ServerErrorHttpException;
use PDO;
use PDOException;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;

class DatabaseProvider implements ServiceProviderInterface
{
    /**
     * @param DiInterface $container
     */
    public function register(DiInterface $container) : void
    {
        $shared = defined('API_TESTS') || !isCLI() ? true : false;
        $container->set(
            'dbLocal',
            function () {
                $options = [
                    'host' => envValue('DATA_API_LOCAL_MYSQL_HOST', 'localhost'),
                    'username' => envValue('DATA_API_LOCAL_MYSQL_USER', 'nanobox'),
                    'password' => envValue('DATA_API_LOCAL_MYSQL_PASS', ''),
                    'dbname' => envValue('DATA_API_LOCAL_MYSQL_NAME', 'gonano'),
                    'charset' => 'utf8',
                    'options' => [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                    ]
                ];

                try {
                    $connection = new Mysql($options);
                    // Set everything to UTF8
                    $connection->execute('SET NAMES utf8mb4', []);
                } catch (PDOException $e) {
                    throw new ServerErrorHttpException($e->getMessage());
                }

                return $connection;
            },
            $shared
        );
    }
}
