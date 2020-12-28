<?php

namespace Gewaer\Tests\integration\library\Models;

use Canvas\Models\Apps;
use Canvas\Models\Companies;
use Canvas\Models\Roles;
use Gewaer\Models\Users;
use Gewaer\Providers\ConfigProvider;
use IntegrationTester;
use Page\Data;
use Phalcon\Di\FactoryDefault;

class RolesCest
{
    /**
     * Confirm the default apps exist.
     *
     * @param IntegrationTester $I
     *
     * @return void
     */
    public function getByAppName(IntegrationTester $I)
    {
        $diContainer = new FactoryDefault();

        $provider = new ConfigProvider();
        $provider->register($diContainer);

        $company = Companies::findFirst(Users::findFirstByEmail(Data::loginJson()['email'])->default_company);
        $role = Roles::getByAppName('Default.Admins', $company);

        $I->assertTrue($role->name == 'Admins');
    }
}
