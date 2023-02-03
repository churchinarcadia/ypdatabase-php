<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\SocialMediaTypesTable;
use Authorization\IdentityInterface;

use Cake\ORM\Query;

/**
 * SocialMediaTypes policy
 */
class SocialMediaTypesTablePolicy
{
    public function canIndex(IdentityInterface $user, Query $query)
    {
        return true;
    }

    public function scopeIndex(IdentityInterface $user, Query $query)
    {
        return true;
    }
}
