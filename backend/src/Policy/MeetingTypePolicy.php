<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\MeetingType;
use Authorization\IdentityInterface;

/**
 * MeetingType policy
 */
class MeetingTypePolicy
{
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
    }
}
