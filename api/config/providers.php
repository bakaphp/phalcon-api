<?php

/**
 * Enabled providers. Order does matter
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
use Canvas\Providers\EventManagerProvider;
use Canvas\Providers\MapperProvider;
use Canvas\Providers\ThrottleProvider;
use Canvas\Providers\SocialLoginProvider;

return [
    ConfigProvider::class,
    LoggerProvider::class,
    ErrorHandlerProvider::class,
    DatabaseProvider::class,
    ModelsMetadataProvider::class,
    RequestProvider::class,
    RouterProvider::class,
    CacheDataProvider::class,
    SessionProvider::class,
    QueueProvider::class,
    MailProvider::class,
    RedisProvider::class,
    AclProvider::class,
    AppProvider::class,
    ResponseProvider::class,
    FileSystemProvider::class,
    EventManagerProvider::class,
    MapperProvider::class,
    ThrottleProvider::class,
    SocialLoginProvider::class
];
