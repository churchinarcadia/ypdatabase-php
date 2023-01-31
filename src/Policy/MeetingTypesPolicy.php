<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\MeetingTypes;
use Authorization\IdentityInterface;

/**
 * MeetingTypes policy
 */
class MeetingTypesPolicy
{
    /**
     * Check if $user can add MeetingTypes
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingTypes $meetingTypes
     * @return bool
     */
    public function canAdd(IdentityInterface $user, MeetingTypes $meetingTypes)
    {
    }

    /**
     * Check if $user can edit MeetingTypes
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingTypes $meetingTypes
     * @return bool
     */
    public function canEdit(IdentityInterface $user, MeetingTypes $meetingTypes)
    {
    }

    /**
     * Check if $user can delete MeetingTypes
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingTypes $meetingTypes
     * @return bool
     */
    public function canDelete(IdentityInterface $user, MeetingTypes $meetingTypes)
    {
    }

    /**
     * Check if $user can view MeetingTypes
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingTypes $meetingTypes
     * @return bool
     */
    public function canView(IdentityInterface $user, MeetingTypes $meetingTypes)
    {
    }
}
