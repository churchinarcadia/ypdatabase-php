<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Meeting;
use Authorization\IdentityInterface;

/**
 * Meeting policy
 */
class MeetingPolicy
{
    /**
     * Check if $user can add Meeting
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Meeting $meeting
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Meeting $meeting)
    {
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
    }
}
