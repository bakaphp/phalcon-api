<?php
//xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);


use Canvas\Bootstrap\Api;

require_once __DIR__ . '/../../library/Core/autoload.php';

$bootstrap = new Api();

$bootstrap->setup();
$bootstrap->run();

/* $xhprof_data = xhprof_disable('/tmp');

$XHPROF_ROOT = '/app/api/public/xhprof';
include_once $XHPROF_ROOT . '/xhprof_lib/utils/xhprof_lib.php';
include_once $XHPROF_ROOT . '/xhprof_lib/utils/xhprof_runs.php';

$xhprof_runs = new XHProfRuns_Default();
$run_id = $xhprof_runs->save_run($xhprof_data, 'xhprof_testing');

echo "http://localhost/xhprof/xhprof_html/index.php?run={$run_id}&source=xhprof_testing\n"; */

