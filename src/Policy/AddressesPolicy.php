<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Addresses;
use Authorization\IdentityInterface;

/**
 * Addresses policy
 */
class AddressesPolicy
{
    /**
     * Check if $user can add Addresses
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Addresses $addresses
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Addresses $addresses)
    {
    }

    /**
     * Check if $user can edit Addresses
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Addresses $addresses
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Addresses $addresses)
    {
    }

    /**
     * Check if $user can delete Addresses
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Addresses $addresses
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Addresses $addresses)
    {
    }

    /**
     * Check if $user can view Addresses
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Addresses $addresses
     * @return bool
     */
    public function canView(IdentityInterface $user, Addresses $addresses)
    {
    }
}
