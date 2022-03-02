<?php

namespace Gewaer\Cli\Tasks;

use Canvas\Cli\Tasks\QueueTask as CanvasQueueTask;

/**
 * CLI To send push ontification and pusher msg
 *
 * @package Gewaer\Cli\Tasks
 *
 * @property Config $config
 * @property \Pusher\Pusher $pusher
 * @property \Monolog\Logger $log
 * @property Channel $channel
 * @property Queue $queue
 *
 */
class QueueTask extends CanvasQueueTask
{

}