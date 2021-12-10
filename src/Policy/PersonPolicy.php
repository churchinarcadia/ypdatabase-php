<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Person;
use Authorization\IdentityInterface;

/**
 * Person policy
 */
class PersonPolicy
{
    /**
     * Check if $user can add Person
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Person $person
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Person $person)
    {
    }

    /**
     * Check if $user can edit Person
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Person $person
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Person $person)
    {
    }

    /**
     * Check if $user can delete Person
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Person $person
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Person $person)
    {
    }

    /**
     * Check if $user can view Person
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Person $person
     * @return bool
     */
    public function canView(IdentityInterface $user, Person $person)
    {
    }
}
