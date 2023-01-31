<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Meetings;
use Authorization\IdentityInterface;

/**
 * Meetings policy
 */
class MeetingsPolicy
{
    /**
     * Check if $user can add Meetings
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Meetings $meetings
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Meetings $meetings)
    {
    }

    /**
     * Check if $user can edit Meetings
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Meetings $meetings
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Meetings $meetings)
    {
    }

    /**
     * Check if $user can delete Meetings
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Meetings $meetings
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Meetings $meetings)
    {
    }

    /**
     * Check if $user can view Meetings
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Meetings $meetings
     * @return bool
     */
    public function canView(IdentityInterface $user, Meetings $meetings)
    {
    }
}
