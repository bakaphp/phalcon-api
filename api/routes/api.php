<?php

use Baka\Router\Route;
use Baka\Router\RouteGroup;

$publicRoutes = [
    Route::get('/')->controller('IndexController'),
    Route::get('/status')->controller('IndexController')->action('status'),
    Route::get('/leads/test')->controller('LeadsController')->action('test')
];

$privateRoutes = [
    Route::crud('/leads')->controller('LeadsController'),
];

$privateRoutess = [
    Route::get('/leads/otro')->controller('LeadsController')->action('test')
];

$routeGroup = RouteGroup::from($publicRoutes)
                ->defaultNamespace('Gewaer\Api\Controllers')
                ->defaultPrefix('/v1');

$privateRoutesGroup = RouteGroup::from($privateRoutes)
                ->defaultNamespace('Gewaer\Api\Controllers')
                ->addMiddlewares('auth.jwt@before', 'auth.acl@before')
                ->defaultPrefix('/v1');
$privateRoutesGroup2 = RouteGroup::from($privateRoutess)
                ->defaultNamespace('Gewaer\Api\Controllers')
                ->addMiddlewares('auth.jwt@before')
                ->defaultPrefix('/v1');

/**
 * @todo look for a better way to handle this
 */
return array_merge(
    $routeGroup->toCollections(),
    $privateRoutesGroup->toCollections(),
    $privateRoutesGroup2->toCollections(),
);
