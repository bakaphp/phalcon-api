<?php

/**
 * Enabled providers. Order does matter.
 */

use Canvas\Providers\CacheDataProvider;
use Gewaer\Providers\ConfigProvider;
use Gewaer\Providers\DatabaseProvider;
use Gewaer\Providers\ErrorHandlerProvider;
use Canvas\Providers\LoggerProvider;
use Gewaer\Providers\ModelsMetadataProvider;
use Gewaer\Providers\RouterProvider;
use Canvas\Providers\SessionProvider;
use Canvas\Providers\QueueProvider;
use Gewaer\Providers\MailProvider;
use Canvas\Providers\RedisProvider;
use Gewaer\Providers\RequestProvider;
use Canvas\Providers\AclProvider;
use Canvas\Providers\AppProvider;
use Canvas\Providers\ResponseProvider;
use Canvas\Providers\FileSystemProvider;
use Gewaer\Providers\EventsManagerProvider;
use Canvas\Providers\MapperProvider;
use Canvas\Providers\ElasticProvider;
use Canvas\Providers\SocialLoginProvider;
use Gewaer\Providers\MiddlewareProvider;
use Canvas\Providers\RegistryProvider;
use Canvas\Providers\ViewProvider;

return [
    ConfigProvider::class,
    AppProvider::class,
    EventsManagerProvider::class,
    LoggerProvider::class,
    RegistryProvider::class,
    ErrorHandlerProvider::class,
    DatabaseProvider::class,
    ModelsMetadataProvider::class,
    RequestProvider::class,
    RouterProvider::class,
    MiddlewareProvider::class,
    CacheDataProvider::class,
    SessionProvider::class,
    QueueProvider::class,
    MailProvider::class,
    RedisProvider::class,
    AclProvider::class,
    ResponseProvider::class,
    FileSystemProvider::class,
    MapperProvider::class,
    ElasticProvider::class,
    SocialLoginProvider::class,
    ViewProvider::class
];
