<?php

declare(strict_types=1);

namespace Gewaer\Providers;

use Canvas\Providers\RouterProvider as CanvasRouterProvider;
use function Canvas\Core\appPath;
use Phalcon\Di;

class RouterProvider extends CanvasRouterProvider
{
    /**
     * Returns the array for all the routes on this system.
     *
     * @return array
     */
    protected function getRoutes(): array
    {
        $path = appPath('api/routes');

        //app routes
        $routes = [
            'canvas' => Di::getDefault()->getConfig()->application->core->path . '/routes/api.php',
            'api' => $path . '/api.php',
        ];

        return $routes;
    }
}
