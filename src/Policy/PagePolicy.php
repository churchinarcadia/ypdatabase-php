<?php
declare(strict_types=1);

namespace App\Policy;

//use App\Model\Entity\Meeting;
use Authorization\IdentityInterface;

use Authorization\Policy\BeforePolicyInterface;

use App\Utility\PolicyFunctions;

/**
 * Meeting policy
 */
class PagePolicy// implements BeforePolicyInterface
{
    /**
     * Defines a pre-authorization check.
     *
     * If a boolean value is returned, the action check will be skipped and pre-authorization
     * check result will be returned. In case of `null`, the action check will take place.
     *
     * @param \Authorization\IdentityInterface|null $user Identity object.
     * @param mixed $resource The resource being operated on.
     * @param string $action The action/operation being performed.
     * @return \Authorization\Policy\ResultInterface|bool|null
     */
    /*
    public function before($user, $resource, $action)
    {
        $functions = new PolicyFunctions;

        return $functions->isUserAuthorized($user,[1,2]);
        
        /*
        if ($user->getOriginalData()->is_admin()) {
            return true;
        }
        */
    // }

    /**
     * Check if $user can add Meeting
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param $path The page to be displayed
     * @return bool
     */
    public function canDisplay(IdentityInterface $user, $path)
    {
        $functions = new PolicyFunctions;

        if ($functions->isUserAuthorized($user,[1])) {
            return true;
        } elseif ($path == 'home') {
            return true;
        }
    }
}
