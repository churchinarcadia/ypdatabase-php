<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\UsersTable;
use Authorization\IdentityInterface;

use Cake\ORM\Query;

/**
 * Users policy
 */
class UsersTablePolicy
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
