<?php

declare(strict_types=1);

namespace CakephpUsers\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
    protected function currentUserId()
    {
        return $this->Authentication->getIdentity()->id ?? false;
    }

    protected function currentUserRole()
    {
        return $this->Authentication->getIdentity()->user_role_id ?? false;
    }
}
