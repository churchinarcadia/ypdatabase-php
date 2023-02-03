<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\PeopleTable;
use Authorization\IdentityInterface;

use Cake\ORM\Query;

/**
 * People policy
 */
class PeopleTablePolicy
{
    public function canIndex(IdentityInterface $user, Query $query)
    {
        return true;
    }
}
