<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\AddressesTable;
use Authorization\IdentityInterface;

use Cake\ORM\Query;

/**
 * Addresses policy
 */
class AddressesTablePolicy
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
