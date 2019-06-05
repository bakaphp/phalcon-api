<?php

use Canvas\Models\Subscription;
use Gewaer\Tests\api\PaymentsCest;
use Canvas\Models\CompaniesSettings;
use Canvas\Exception\SubscriptionPlanFailureException;
use Gewaer\Models\Users;

class AppsPlanCest
{
    /**
     * Create subscription.
     *
     * @param ApiTester $I
     * @return void
     */
    public function create(ApiTester $I): void
    {
        $userData = $I->apiLogin();

        //when doing a signup we create a subscription, so need to delete to confirm this test
        $subscriptions = Subscription::find('user_id =' . $userData->id);
        foreach ($subscriptions as $subscription) {
            $subscription->is_deleted = 1;
            $subscription->update();
        }

        $I->haveHttpHeader('Authorization', $userData->token);
        $I->sendPost('/v1/apps-plans', [
            'stripe_id' => 'monthly-10-1',
            'card_exp_month' => '05',
            'card_exp_year' => '2020',
            'card_cvc' => '123',
            'card_number' => '4242424242424242',
        ]);

        $I->seeResponseIsSuccessful();
        $response = $I->grabResponse();
        $data = json_decode($response, true);

        $I->assertTrue(isset($data['id']));
    }

    /**
     * Create subscription.
     *
     * @param ApiTester $I
     * @return void
     */
    public function upgrade(ApiTester $I): void
    {
        $userData = $I->apiLogin();
        $this->undeleteSubscriptions();

        $I->haveHttpHeader('Authorization', $userData->token);
        $I->sendPut('/v1/apps-plans/monthly-10-2');

        $I->seeResponseIsSuccessful();
        $response = $I->grabResponse();
        $data = json_decode($response, true);

        $I->assertTrue(isset($data['id']));
    }

    /**
     * Create subscription.
     *
     * @param ApiTester $I
     * @return void
     */
    public function downgrade(ApiTester $I): void
    {
        $userData = $I->apiLogin();
        $this->undeleteSubscriptions();

        $I->haveHttpHeader('Authorization', $userData->token);
        $I->sendPut('/v1/apps-plans/monthly-10-1');

        $I->seeResponseIsSuccessful();
        $response = $I->grabResponse();
        $data = json_decode($response, true);

        $I->assertTrue(isset($data['id']));
    }

    /**
     * Create subscription.
     *
     * @param ApiTester $I
     * @return void
     */
    public function cancelSubscription(ApiTester $I): void
    {
        $userData = $I->apiLogin();

        $I->haveHttpHeader('Authorization', $userData->token);
        $I->sendDelete('/v1/apps-plans/monthly-10-1');

        $I->seeResponseIsSuccessful();
        $response = $I->grabResponse();
        $data = json_decode($response, true);

        //we need to update all subscriptions for other test
        $this->undeleteSubscriptions();

        $I->assertTrue(isset($data['id']));
    }

    /**
     * We need to make sure we dont have the current subscription delete by other test.
     *
     * @return void
     */
    public function undeleteSubscriptions()
    {
        //we need to update all subscriptions for other test
        $subscriptions = Subscription::find();
        foreach ($subscriptions as $subscription) {
            $subscription->is_deleted = 0;
            $subscription->update();
        }
    }

    /**
     * Free Trial Ending Test.
     *
     * @param ApiTester $I
     * @return void
     */
    public function freeTrialEndingSubscription(ApiTester $I) : void
    {
        $userData = $I->apiLogin();

        $I->haveHttpHeader('Authorization', $userData->token);
        $I->haveHttpHeader('Stripe-Signature', PaymentsCest::getStripeSignature());
        $I->sendPost('/v1/' . 'webhook/payments', [
            'type' => 'customer.subscription.trial_will_end',
            'data' => [
                'object' => [
                    'customer' => $userData->stripe_id,
                    'trial_end' => 1549737947
                ]
            ]
        ]);

        $I->seeResponseIsSuccessful();
        $response = $I->grabResponse();
        $data = json_decode($response, true);

        $I->assertTrue(current($data) == 'Webhook Handled');
    }

    /**
     * Failed Payment permitted routes access Test.
     * @param ApiTester $I
     * @return void
     */
    public function FailPaymentPermittedRoutesAccess(ApiTester $I) : void
    {
        $userData = $I->apiLogin();
        $apiException = null;
        $I->haveHttpHeader('Authorization', $userData->token);

        $companyId = Users::findFirst($userData->id)->currentCompanyId();

        //Fetch Paid Setting of Company
        $paidSetting = CompaniesSettings::findFirst([
            'conditions' => 'companies_id = ?0 and name = ?1 and is_deleted = 0',
            'bind' => [$companyId, 'paid']
        ]);

        //Modify paid to 0
        $paidSetting->value = 0;
        $paidSetting->update();

        //try a random route
        try {
            $I->sendGet('/v1/locales');
            $I->seeResponseIsSuccessful();
            $response = $I->grabResponse();
            $data = json_decode($response, true);
        } catch (SubscriptionPlanFailureException $e) {
            $apiException = $e;
        }

        $paidSetting->value = 1;
        $paidSetting->update();
        $I->assertTrue($apiException instanceof SubscriptionPlanFailureException);
    }
}
