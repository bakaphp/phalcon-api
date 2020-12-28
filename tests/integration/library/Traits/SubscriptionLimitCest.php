<?php

namespace Gewaer\Tests\integration\library\Models;

use Canvas\Contracts\SubscriptionPlanLimitTrait;
use Gewaer\Models\Apps;
use IntegrationTester;

class SubscriptionLimitCest
{
    use SubscriptionPlanLimitTrait;

    /**
     * Confirm the default apps exist.
     *
     * @param IntegrationTester $I
     *
     * @return void
     */
    public function getModelKey(IntegrationTester $I)
    {
        $classKey = $this->getSubscriptionPlanLimitModelKey();

        $I->assertTrue($classKey == 'subscriptionlimitcest_total');
    }

    /**
     * Update activity of this model.
     *
     * @param IntegrationTester $I
     *
     * @return void
     */
    public function updateUserActivity(IntegrationTester $I)
    {
        $I->assertTrue($this->updateAppActivityLimit());
    }
}
