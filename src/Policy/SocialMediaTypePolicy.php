<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\SocialMediaTypes;
use Authorization\IdentityInterface;

/**
 * SocialMediaTypes policy
 */
class SocialMediaTypesPolicy
{
    /**
     * Check if $user can add SocialMediaTypes
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\SocialMediaTypes $socialMediaTypes
     * @return bool
     */
    public function canAdd(IdentityInterface $user, SocialMediaTypes $socialMediaTypes)
    {
    }

    /**
     * Check if $user can edit SocialMediaTypes
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\SocialMediaTypes $socialMediaTypes
     * @return bool
     */
    public function canEdit(IdentityInterface $user, SocialMediaTypes $socialMediaTypes)
    {
    }

    /**
     * Check if $user can delete SocialMediaTypes
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\SocialMediaTypes $socialMediaTypes
     * @return bool
     */
    public function canDelete(IdentityInterface $user, SocialMediaTypes $socialMediaTypes)
    {
    }

    /**
     * Check if $user can view SocialMediaTypes
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\SocialMediaTypes $socialMediaTypes
     * @return bool
     */
    public function canView(IdentityInterface $user, SocialMediaTypes $socialMediaTypes)
    {
    }
}
