<?php

declare(strict_types=1);

namespace Gewaer\Api\Controllers;

use Canvas\Api\Controllers\IndexController as CanvasIndexController;
use Phalcon\Http\Response;

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
     * Show the status of the different services.
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
