<?php

namespace Gewaer\Cli\Jobs;

use Baka\Contracts\Queue\QueueableJobInterface;
use Baka\Jobs\Job;
use Gewaer\Models\Leads;
use Phalcon\Di;

class Test extends Job implements QueueableJobInterface
{
    /**
     * Handle the cascade soft delete.
     *
     * @return bool
     */
    public function handle() : bool
    {
        $lead = Leads::findFirst();

        echo $lead->firstname . PHP_EOL;

        $lead->firstname = 'Max' . time();
        $lead->updateOrFail();

        $time = time();

        if ($time % 2 == 0) {
            sleep(10);
            echo Di::getDefault()->get('redis')->incr('d') . PHP_EOL;
        } else {
            echo Di::getDefault()->get('redis')->incr('d') . PHP_EOL;
        }

        echo 'fin' . PHP_EOL;
        //Di::getDefault()->get('db')->close();

        return true;
    }
}
