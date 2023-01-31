<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\MeetingPeople;
use Authorization\IdentityInterface;

/**
 * MeetingPeople policy
 */
class MeetingPeoplePolicy
{
    /**
     * Check if $user can add MeetingPeople
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingPeople $meetingPeople
     * @return bool
     */
    public function canAdd(IdentityInterface $user, MeetingPeople $meetingPeople)
    {
    }

    /**
     * Check if $user can edit MeetingPeople
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingPeople $meetingPeople
     * @return bool
     */
    public function canEdit(IdentityInterface $user, MeetingPeople $meetingPeople)
    {
    }

    /**
     * Check if $user can delete MeetingPeople
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingPeople $meetingPeople
     * @return bool
     */
    public function canDelete(IdentityInterface $user, MeetingPeople $meetingPeople)
    {
    }

    /**
     * Check if $user can view MeetingPeople
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingPeople $meetingPeople
     * @return bool
     */
    public function canView(IdentityInterface $user, MeetingPeople $meetingPeople)
    {
    }
}
