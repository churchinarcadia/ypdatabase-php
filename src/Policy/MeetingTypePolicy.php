<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\MeetingType;
use Authorization\IdentityInterface;

use Authorization\Policy\BeforePolicyInterface;

use App\Utility\PolicyFunctions;

/**
 * MeetingType policy
 */
class MeetingTypePolicy implements BeforePolicyInterface
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

        if($functions->isUserAuthorized($user,[1])) {
            return true;
        }
        
        /*
        if ($user->getOriginalData()->is_admin()) {
            return true;
        }
        */
    }
    
    /**
     * Check if $user can add MeetingType
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingType $meetingType
     * @return bool
     */
    public function canAdd(IdentityInterface $user, MeetingType $meetingType)
    {
    }

    /**
     * Check if $user can edit MeetingType
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingType $meetingType
     * @return bool
     */
    public function canEdit(IdentityInterface $user, MeetingType $meetingType)
    {
    }

    /**
     * Check if $user can delete MeetingType
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingType $meetingType
     * @return bool
     */
    public function canDelete(IdentityInterface $user, MeetingType $meetingType)
    {
    }

    /**
     * Check if $user can view MeetingType
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingType $meetingType
     * @return bool
     */
    public function canView(IdentityInterface $user, MeetingType $meetingType)
    {
        $functions = new PolicyFunctions;

        return $functions->isUserAuthorized($user,[2,3]);
    }
}
