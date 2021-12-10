<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\UserType;
use Authorization\IdentityInterface;

/**
 * UserType policy
 */
class UserTypePolicy
{
    /**
     * Check if $user can add UserType
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\UserType $userType
     * @return bool
     */
    public function canAdd(IdentityInterface $user, UserType $userType)
    {
    }

    /**
     * Check if $user can edit UserType
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\UserType $userType
     * @return bool
     */
    public function canEdit(IdentityInterface $user, UserType $userType)
    {
    }

    /**
     * Check if $user can delete UserType
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\UserType $userType
     * @return bool
     */
    public function canDelete(IdentityInterface $user, UserType $userType)
    {
    }

    /**
     * Check if $user can view UserType
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\UserType $userType
     * @return bool
     */
    public function canView(IdentityInterface $user, UserType $userType)
    {
    }
}
