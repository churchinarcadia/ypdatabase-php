<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Meeting;
use Authorization\IdentityInterface;

use Authorization\Policy\BeforePolicyInterface;

use App\Utility\PolicyFunctions;

/**
 * Meeting policy
 */
class MeetingPolicy implements BeforePolicyInterface
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
    public function before($user, $resource, $action)
    {
        $functions = new PolicyFunctions;

        if($functions->isUserAuthorized($user,[1,2])) {
            return true;
        }
        
        /*
        if ($user->getOriginalData()->is_admin()) {
            return true;
        }
        */
    }

    /**
     * Check if $user can add Meeting
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Meeting $meeting
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Meeting $meeting)
    {
        /*
        $functions = new PolicyFunctions;

        return $functions->isUserAuthorized($user,[2]);
        */
    }

    /**
     * Check if $user can edit Meeting
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Meeting $meeting
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Meeting $meeting)
    {
        /*
        $functions = new PolicyFunctions;

        return $functions->isUserAuthorized($user,[2]);
        */
    }

    /**
     * Check if $user can delete Meeting
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Meeting $meeting
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Meeting $meeting)
    {
        //TODO check if deleting with foreignkey restrictions or forced cascade
        //Only allow forced cascade with admin roles.
        /*
        $functions = new PolicyFunctions;

        return $functions->isUserAuthorized($user,[2]);
        */
    }

    /**
     * Check if $user can view Meeting
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Meeting $meeting
     * @return bool
     */
    public function canView(IdentityInterface $user, Meeting $meeting)
    {
        $functions = new PolicyFunctions;

        return $functions->isUserAuthorized($user,[3]);
    }
}
