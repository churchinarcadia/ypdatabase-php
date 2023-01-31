<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\UserTypes;
use Authorization\IdentityInterface;

/**
 * UserTypes policy
 */
class UserTypesPolicy
{
    /**
     * Check if $user can add UserTypes
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\UserTypes $userTypes
     * @return bool
     */
    public function canAdd(IdentityInterface $user, UserTypes $userTypes)
    {
    }

    /**
     * Check if $user can edit UserTypes
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\UserTypes $userTypes
     * @return bool
     */
    public function canEdit(IdentityInterface $user, UserTypes $userTypes)
    {
    }

    /**
     * Check if $user can delete UserTypes
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\UserTypes $userTypes
     * @return bool
     */
    public function canDelete(IdentityInterface $user, UserTypes $userTypes)
    {
    }

    /**
     * Check if $user can view UserTypes
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\UserTypes $userTypes
     * @return bool
     */
    public function canView(IdentityInterface $user, UserTypes $userTypes)
    {
    }
}
