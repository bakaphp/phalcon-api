<?php

declare(strict_types=1);

namespace Gewaer\Middleware;

use Canvas\Middleware\NotFoundMiddleware as CanvasNotFoundMiddleware;

/**
 * Class NotFoundMiddleware
 *
 * @package Canvas\Middleware
 *
 * @property Micro    $application
 * @property Response $response
 */
class NotFoundMiddleware extends CanvasNotFoundMiddleware
{

}
