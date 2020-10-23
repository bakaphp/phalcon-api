<?php

declare(strict_types=1);

namespace Gewaer\Providers;

use Gewaer\Models\Users;
use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;

class UserProvider implements ServiceProviderInterface
{
    /**
     * UserProvider to specify the default user return type.
     *
     * @param DiInterface $container
     */
    public function register(DiInterface $container) : void
    {
        $container->setShared(
            'userProvider',
            function () {
                return new Users();
            }
        );
    }
}
