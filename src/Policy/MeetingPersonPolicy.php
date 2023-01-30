<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\MeetingPerson;
use Authorization\IdentityInterface;

/**
 * MeetingPerson policy
 */
class MeetingPersonPolicy
{
    /**
     * Check if $user can add MeetingPerson
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingPerson $meetingPerson
     * @return bool
     */
    public function canAdd(IdentityInterface $user, MeetingPerson $meetingPerson)
    {
    }

    /**
     * Check if $user can edit MeetingPerson
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingPerson $meetingPerson
     * @return bool
     */
    public function canEdit(IdentityInterface $user, MeetingPerson $meetingPerson)
    {
    }

    /**
     * Check if $user can delete MeetingPerson
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingPerson $meetingPerson
     * @return bool
     */
    public function canDelete(IdentityInterface $user, MeetingPerson $meetingPerson)
    {
    }

    /**
     * Check if $user can view MeetingPerson
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MeetingPerson $meetingPerson
     * @return bool
     */
    public function canView(IdentityInterface $user, MeetingPerson $meetingPerson)
    {
    }
}
