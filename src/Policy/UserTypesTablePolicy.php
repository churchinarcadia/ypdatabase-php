<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\UserTypesTable;
use Authorization\IdentityInterface;

use Cake\ORM\Query;

/**
 * UserTypes policy
 */
class UserTypesTablePolicy
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
