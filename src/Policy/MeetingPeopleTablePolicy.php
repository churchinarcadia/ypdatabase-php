<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\MeetingPeopleTable;
use Authorization\IdentityInterface;

use Cake\ORM\Query;

/**
 * MeetingPeople policy
 */
class MeetingPeopleTablePolicy
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
