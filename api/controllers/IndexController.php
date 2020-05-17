<?php

declare(strict_types=1);

namespace Gewaer\Api\Controllers;

use Canvas\Api\Controllers\IndexController as CanvasIndexController;
use Phalcon\Http\Response;

/**
 * Class IndexController.
 *
 * @package Gewaer\Api\Controllers
 *
 * @property Redis $redis
 * @property Beanstalk $queue
 * @property Mysql $db
 * @property \Monolog\Logger $log
 */
class IndexController extends CanvasIndexController
{
    /**
     * Index.
     *
     * @method GET
     * @url /
     *
     * @return Response
     */
    public function index($id = null) : Response
    {
        return $this->response(['Woot Canvas']);
    }

    /**
     * Show the status of the diferent services.
     *
     * @method GET
     * @url /status
     *
     * @return Response
     */
    public function status() : Response
    {
        return parent::status();
    }
}
