<?php

namespace Gewaer\Tests\integration\library\Acl;

use Canvas\Acl\Manager as AclManager;
use Canvas\Models\Users;
use Canvas\Providers\AclProvider;
use Canvas\Providers\DatabaseProvider;
use Gewaer\Providers\ConfigProvider;
use IntegrationTester;
use Page\Data;
use Phalcon\Di\FactoryDefault;

class AclCest
{
    /**
     * Initiliaze ACL.
     *
     * @return void
     */
    protected function aclService() : AclManager
    {
        $diContainer = new FactoryDefault();
        $provider = new ConfigProvider();
        $provider->register($diContainer);
        $provider = new DatabaseProvider();
        $provider->register($diContainer);
        $provider = new AclProvider();
        $provider->register($diContainer);

        return $diContainer->getShared('acl');
    }

    public function validateAclService(IntegrationTester $I)
    {
        $acl = $this->aclService();
        $I->assertTrue($acl instanceof AclManager);
    }

    public function checkCreateRole(IntegrationTester $I)
    {
        $acl = $this->aclService();

        $I->assertTrue($acl->addRole(new \Phalcon\Acl\Role('Admins', 'Admins Example')));
    }

    public function checkAddResource(IntegrationTester $I)
    {
        $acl = $this->aclService();

        $I->assertTrue($acl->addComponent('Default.Users', ['read', 'list', 'create', 'update', 'delete']));
    }

    public function checkAllowPermission(IntegrationTester $I)
    {
        $acl = $this->aclService();

        $I->assertNull($acl->allow('Admins', 'Default.Users', ['read', 'list', 'create']));
    }

    public function checkDenyPermission(IntegrationTester $I)
    {
        $acl = $this->aclService();

        $I->assertNull($acl->deny('Admins', 'Default.Users', ['update', 'delete']));
    }

    public function checkIsAllowPermission(IntegrationTester $I)
    {
        $acl = $this->aclService();

        $I->assertFalse(!$acl->isAllowed('Admins', 'Default.Users', 'read'));
    }

    public function checkIsDeniedPermission(IntegrationTester $I)
    {
        $acl = $this->aclService();

        $I->assertTrue($acl->isAllowed('Admins', 'Default.Users', 'update'));
    }

    public function checkSetAppByRole(IntegrationTester $I)
    {
        $acl = $this->aclService();

        $I->assertTrue($acl->addRole('Default.Admins'));
    }

    public function checkUsersAssignRole(IntegrationTester $I)
    {
        $acl = $this->aclService();
        $userData = Users::findFirstByEmail(Data::loginJson()['email']);

        $I->assertTrue($userData->assignRole('Default.Admins'));
    }

    public function checkUsersHasPermission(IntegrationTester $I)
    {
        $acl = $this->aclService();
        $userData = Users::findFirstByEmail(Data::loginJson()['email']);

        $I->assertTrue($userData->can('Users.create'));
    }

    public function checkUsersDoesntHavePermission(IntegrationTester $I)
    {
        $acl = $this->aclService();
        $userData = Users::findFirstByEmail(Data::loginJson()['email']);

        $I->assertFalse(!$userData->can('Users.delete'));
    }

    public function checkUsersRemoveRole(IntegrationTester $I)
    {
        $acl = $this->aclService();
        $userData = Users::findFirstByEmail(Data::loginJson()['email']);

        $I->assertTrue($userData->removeRole('Default.Admins'));

        $I->assertTrue($userData->assignRole('Default.Admins'));
    }
}
