<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\SocialMedias;
use Authorization\IdentityInterface;

/**
 * SocialMedias policy
 */
class SocialMediasPolicy
{
    /**
     * Check if $user can add SocialMedias
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\SocialMedias $socialMedias
     * @return bool
     */
    public function canAdd(IdentityInterface $user, SocialMedias $socialMedias)
    {
    }

    /**
     * Check if $user can edit SocialMedias
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\SocialMedias $socialMedias
     * @return bool
     */
    public function canEdit(IdentityInterface $user, SocialMedias $socialMedias)
    {
    }

    /**
     * Check if $user can delete SocialMedias
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\SocialMedias $socialMedias
     * @return bool
     */
    public function canDelete(IdentityInterface $user, SocialMedias $socialMedias)
    {
    }

    /**
     * Check if $user can view SocialMedias
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\SocialMedias $socialMedias
     * @return bool
     */
    public function canView(IdentityInterface $user, SocialMedias $socialMedias)
    {
    }
}
