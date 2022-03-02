<?php

declare(strict_types=1);

namespace Gewaer\Providers;

use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;

class UserDataProvider implements ServiceProviderInterface
{
    /**
     * Specify a default userData , for CI apps.
     *
     * @param DiInterface $container
     */
    public function register(DiInterface $container) : void
    {
        $container->setShared(
            'userData',
            function () use ($container) {
                $userData = $container->get('userProvider');

                return $userData->findFirst(1);
            }
        );
    }
}
