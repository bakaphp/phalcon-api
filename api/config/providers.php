<?php

/**
 * Enabled providers. Order does matter.
 */

use Canvas\Providers\AclProvider;
use Canvas\Providers\AppProvider;
use Canvas\Providers\CacheDataProvider;
use Canvas\Providers\ElasticProvider;
use Canvas\Providers\FileSystemProvider;
use Canvas\Providers\LoggerProvider;
use Canvas\Providers\MapperProvider;
use Canvas\Providers\ModelsCacheProvider;
use Canvas\Providers\QueueProvider;
use Canvas\Providers\RedisProvider;
use Canvas\Providers\RegistryProvider;
use Canvas\Providers\ResponseProvider;
use Canvas\Providers\SessionProvider;
use Canvas\Providers\SocialLoginProvider;
use Canvas\Providers\ViewProvider;
use Gewaer\Providers\ConfigProvider;
use Gewaer\Providers\DatabaseProvider;
use Gewaer\Providers\ErrorHandlerProvider;
use Gewaer\Providers\EventsManagerProvider;
use Gewaer\Providers\MailProvider;
use Gewaer\Providers\MiddlewareProvider;
use Gewaer\Providers\ModelsMetadataProvider;
use Gewaer\Providers\RequestProvider;
use Gewaer\Providers\RouterProvider;
use Gewaer\Providers\UserProvider;

return [
    RequestProvider::class,
    ConfigProvider::class,
    AppProvider::class,
    EventsManagerProvider::class,
    LoggerProvider::class,
    RegistryProvider::class,
    ErrorHandlerProvider::class,
    DatabaseProvider::class,
    ModelsMetadataProvider::class,
    ModelsCacheProvider::class,
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
    ViewProvider::class,
    UserProvider::class
];
