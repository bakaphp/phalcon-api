<?php

declare(strict_types=1);

namespace Gewaer\Providers;

use function Baka\appPath;
use Canvas\Providers\RouterProvider as CanvasRouterProvider;
use Phalcon\Di;

class RouterProvider extends CanvasRouterProvider
{
    /**
     * Returns the array for all the routes on this system.
     *
     * @return array
     */
    protected function getRoutes() : array
    {
        $path = appPath('api/routes');

        //app routes
        $routes = [
            'canvas' => Di::getDefault()->getConfig()->app->core->path . '/routes/api.php',
            'api' => $path . '/api.php',
        ];

        return $routes;
    }
}
