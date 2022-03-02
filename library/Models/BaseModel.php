<?php
declare(strict_types=1);

namespace Gewaer\Models;

use Canvas\Models\AbstractModel;

class BaseModel extends AbstractModel
{
    /**
     * Parent initialize.
     *
     * @return void
     */
    public function initialize()
    {
        $this->setConnectionService('dbLocal');
    }
}
