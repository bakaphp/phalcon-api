<?php

declare(strict_types=1);

namespace Gewaer\Api\Controllers;

use Phalcon\Http\Response;
use Canvas\Api\Controllers\UsersController as CanvasUsersController;
use Canvas\Models\UsersAssociatedApps;

/**
 * Class UsersController.
 *
 * @package Canvas\Api\Controllers
 *
 * @property Users $userData
 * @property Request $request
 * @property Config $config
 * @property Apps $app
 */
class UsersController extends CanvasUsersController
{
    /**
     * Change User's active status for in current app
     *
     * @param int $id
     * @param int $appsId
     * @throws Exception
     * @return Response
     */
    public function changeAppUserActiveStatus(int $id, int $appsId): Response
    {
        $userAssociatedToApp = UsersAssociatedApps::findFirstOrFail([
            'conditions'=> 'users_id = ?0 and apps_id = ?1 and companies_id = ?2 and is_deleted = 0',
            'bind'=> [$id,$this->app->getId(),$this->userData->getDefaultCompany()->getId()]
        ]);

        $userAssociatedToApp->user_active = $userAssociatedToApp->user_active ? 0 : 1;
        $userAssociatedToApp->updateOrFail();

        return $this->response($userAssociatedToApp);
    }
}
