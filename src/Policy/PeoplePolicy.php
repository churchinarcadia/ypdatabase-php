<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\People;
use Authorization\IdentityInterface;

/**
 * People policy
 */
class PeoplePolicy
{
    /**
     * Check if $user can add People
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\People $people
     * @return bool
     */
    public function canAdd(IdentityInterface $user, People $people)
    {
    }

    /**
     * Check if $user can edit People
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\People $people
     * @return bool
     */
    public function canEdit(IdentityInterface $user, People $people)
    {
    }

    /**
     * Check if $user can delete People
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\People $people
     * @return bool
     */
    public function canDelete(IdentityInterface $user, People $people)
    {
    }

    /**
     * Check if $user can view People
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\People $people
     * @return bool
     */
    public function canView(IdentityInterface $user, People $people)
    {
    }
}
