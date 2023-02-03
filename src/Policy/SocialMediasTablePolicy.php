<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\SocialMediasTable;
use Authorization\IdentityInterface;

use Cake\ORM\Query;

/**
 * SocialMedias policy
 */
class SocialMediasTablePolicy
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
