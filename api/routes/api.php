<?php

use Baka\Http\Router\Collection;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for api.
 */

$router = new Collection($application);
$router->setPrefix('/v1');

$router->get('/', [
    'Gewaer\Api\Controllers\IndexController',
    'index',
    'options' => [
        'jwt' => false,
    ]
]);

$router->get('/status', [
    'Gewaer\Api\Controllers\IndexController',
    'status',
    'options' => [
        'jwt' => false,
    ]
]);

$router->mount();
