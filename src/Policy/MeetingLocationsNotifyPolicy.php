<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\MeetingLocationsNotify;
use Authorization\IdentityInterface;

/**
 * MeetingLocationsNotify policy
 */
class MeetingLocationsNotifyPolicy
{
    /**
     * Check if $user can add MeetingLocationsNotify
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingLocationsNotify $meetingLocationsNotify
     * @return bool
     */
    public function canAdd(IdentityInterface $user, MeetingLocationsNotify $meetingLocationsNotify)
    {
    }

    /**
     * Check if $user can edit MeetingLocationsNotify
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingLocationsNotify $meetingLocationsNotify
     * @return bool
     */
    public function canEdit(IdentityInterface $user, MeetingLocationsNotify $meetingLocationsNotify)
    {
    }

    /**
     * Check if $user can delete MeetingLocationsNotify
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingLocationsNotify $meetingLocationsNotify
     * @return bool
     */
    public function canDelete(IdentityInterface $user, MeetingLocationsNotify $meetingLocationsNotify)
    {
    }

    /**
     * Check if $user can view MeetingLocationsNotify
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingLocationsNotify $meetingLocationsNotify
     * @return bool
     */
    public function canView(IdentityInterface $user, MeetingLocationsNotify $meetingLocationsNotify)
    {
    }
}
