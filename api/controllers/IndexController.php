<?php

declare(strict_types=1);

namespace Gewaer\Api\Controllers;

use Canvas\Api\Controllers\IndexController as CanvasIndexController;
use Gewaer\Cli\Jobs\Test;
use Kanvas\Packages\Social\Contracts\Feeds\ChannelsTrait;
use Phalcon\Http\Response;

class IndexController extends CanvasIndexController
{
    //use ChannelsTrait;

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
        $i = 0;
        while ($i < 10) {
            Test::dispatch();
            $i++;
        }

        /*   $this->request->validate([
              'title' => ['required', 'unique:posts', 'max:255'],
              'body' => ['required'],
          ]); */

        return parent::status();
    }
}
