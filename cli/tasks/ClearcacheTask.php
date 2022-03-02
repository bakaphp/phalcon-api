<?php

namespace Gewaer\Cli\Tasks;

use Phalcon\Cache\Backend\Libmemcached;
use Canvas\Cli\Tasks\ClearcacheTask as CanvasClearcacheTask;

/**
 * Class ClearcacheTask
 *
 * @package Gewaer\Cli\Tasks
 *
 * @property Libmemcached $cache
 * @property Config $config
 */
class ClearcacheTask extends CanvasClearcacheTask
{
    
}
