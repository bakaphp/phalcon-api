<?php

/**
 * Enabled providers. Order does matter.
 */

use Canvas\Providers\AclProvider;
use Canvas\Providers\AppProvider;
use Canvas\Providers\CacheDataProvider;
use Canvas\Providers\CliDispatcherProvider;
use Canvas\Providers\FileSystemProvider;
use Canvas\Providers\LoggerProvider;
use Canvas\Providers\MapperProvider;
use Canvas\Providers\ModelManagerProvider;
use Canvas\Providers\ModelsCacheProvider;
use Canvas\Providers\PusherProvider;
use Canvas\Providers\QueueProvider;
use Canvas\Providers\RedisCliProvider;
use Canvas\Providers\RegistryProvider;
use Canvas\Providers\RequestProvider;
use Gewaer\Providers\ConfigProvider;
use Gewaer\Providers\DatabaseCanvasProvider;
use Gewaer\Providers\DatabaseProvider;
use Gewaer\Providers\ErrorHandlerProvider;
use Gewaer\Providers\EventsManagerProvider;
use Gewaer\Providers\MailProvider;
use Gewaer\Providers\ModelsMetadataProvider;
use Gewaer\Providers\UserProvider;

return [
    RequestProvider::class,
    ConfigProvider::class,
    ModelManagerProvider::class,
    AppProvider::class,
    LoggerProvider::class,
    RegistryProvider::class,
    ErrorHandlerProvider::class,
    DatabaseCanvasProvider::class,
    DatabaseProvider::class,
    ModelsCacheProvider::class,
    ModelsMetadataProvider::class,
    CliDispatcherProvider::class,
    CacheDataProvider::class,
    QueueProvider::class,
    MailProvider::class,
    RedisCliProvider::class,
    PusherProvider::class,
    AclProvider::class,
    MapperProvider::class,
    FileSystemProvider::class,
    EventsManagerProvider::class,
    UserProvider::class,
];
