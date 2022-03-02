<?php

declare(strict_types=1);

namespace Gewaer\Providers;

use Canvas\Providers\ConfigProvider as CanvasConfigProvider;
use function Canvas\Core\appPath;
use Phalcon\DiInterface;
use Phalcon\Config;

class ConfigProvider extends CanvasConfigProvider
{
    /**
        * @param DiInterface $container
        */
    public function register(DiInterface $container)
    {
        $container->setShared(
            'config',
            function () {
                /**
                 * @todo Find a better way to handle unit test file include
                 */
                $data = require appPath('library/Core/config.php');

                return new Config($data);
            }
        );
    }
}
