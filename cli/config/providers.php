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
use Canvas\Providers\ModelsCacheProvider;
use Canvas\Providers\PusherProvider;
use Canvas\Providers\QueueProvider;
use Canvas\Providers\RedisProvider;
use Canvas\Providers\RegistryProvider;
use Gewaer\Providers\ConfigProvider;
use Gewaer\Providers\DatabaseProvider;
use Gewaer\Providers\ErrorHandlerProvider;
use Gewaer\Providers\EventsManagerProvider;
use Gewaer\Providers\MailProvider;
use Gewaer\Providers\ModelsMetadataProvider;
use Gewaer\Providers\UserProvider;

return [
    ConfigProvider::class,
    AppProvider::class,
    LoggerProvider::class,
    RegistryProvider::class,
    ErrorHandlerProvider::class,
    DatabaseProvider::class,
    ModelsCacheProvider::class,
    ModelsMetadataProvider::class,
    CliDispatcherProvider::class,
    CacheDataProvider::class,
    QueueProvider::class,
    MailProvider::class,
    RedisProvider::class,
    PusherProvider::class,
    AclProvider::class,
    FileSystemProvider::class,
    EventsManagerProvider::class,
    UserProvider::class
];
