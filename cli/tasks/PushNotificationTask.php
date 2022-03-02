<?php

namespace Gewaer\Cli\Tasks;

use Canvas\Cli\Tasks\PushNotificationTask as CanvasPushNotificationTask;

/**
 * CLI To send push ontification and pusher msg.
 *
 * @package Gewaer\Cli\Tasks
 *
 * @property Config $config
 * @property \Pusher\Pusher $pusher
 * @property \Monolog\Logger $log
 */
class PushNotificationTask extends CanvasPushNotificationTask
{
}
