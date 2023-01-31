<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\MeetingLocations;
use Authorization\IdentityInterface;

/**
 * MeetingLocations policy
 */
class MeetingLocationsPolicy
{
    /**
     * Check if $user can add MeetingLocations
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingLocations $meetingLocations
     * @return bool
     */
    public function canAdd(IdentityInterface $user, MeetingLocations $meetingLocations)
    {
    }

    /**
     * Check if $user can edit MeetingLocations
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingLocations $meetingLocations
     * @return bool
     */
    public function canEdit(IdentityInterface $user, MeetingLocations $meetingLocations)
    {
    }

    /**
     * Check if $user can delete MeetingLocations
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingLocations $meetingLocations
     * @return bool
     */
    public function canDelete(IdentityInterface $user, MeetingLocations $meetingLocations)
    {
    }

    /**
     * Check if $user can view MeetingLocations
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingLocations $meetingLocations
     * @return bool
     */
    public function canView(IdentityInterface $user, MeetingLocations $meetingLocations)
    {
    }
}
