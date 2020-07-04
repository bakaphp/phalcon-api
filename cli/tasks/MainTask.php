<?php

namespace Gewaer\Cli\Tasks;

use Canvas\Cli\Tasks\MainTask as CanvasMainTask;
use Canvas\Models\Users;

class MainTask extends CanvasMainTask
{
    public function testAction(string $test)
    {
        $this->redis->del('mcmc');
        $this->redisUnSerialize->sAdd('mcmc', 5);
        $this->redisUnSerialize->sAdd('mcmc', 4);
        $this->redisUnSerialize->sAdd('mcmc', 2);
        $this->redisUnSerialize->sAdd('mcmc', 1);
        $this->redisUnSerialize->sAdd('mcmc', 3);

        $this->redis->set('dfadf', Users::findFirst());
        print_r($this->redis->get('dfadf')->toArray());
        //$this->redisUnSerialize->set('dfa', 'dfadfa');
        //print_r($this->redisUnSerialize->get('dfa'));
        //print_r($this->redisUnSerialize->sMembers('mcmc'));
        //print_r($this->redisUnSerialize->sort('mcmc'));
        print_r($this->redisUnSerialize->sort('mcmc', ['limit' => [3,4]]));

        echo PHP_EOL;
    }
}
