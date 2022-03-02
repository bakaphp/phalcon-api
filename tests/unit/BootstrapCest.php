<?php

namespace Gewaer\Tests\unit;

use function Baka\appPath;
use Codeception\Util\HttpCode;
use UnitTester;

class BootstrapCest
{
    public function checkBootstrap(UnitTester $I)
    {
        ob_start();
        require appPath('api/public/index.php');
        $actual = ob_get_contents();
        ob_end_clean();
        $results = json_decode($actual, true);
        $I->assertEquals('1.0', $results['jsonapi']['version']);
        $I->assertEmpty($results['data']);
        $I->assertEquals(HttpCode::getDescription(404), $results['errors']['message']);
    }
}
