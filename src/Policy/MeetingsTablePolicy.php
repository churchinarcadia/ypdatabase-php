<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\MeetingsTable;
use Authorization\IdentityInterface;

use Cake\ORM\Query;

/**
 * Meetings policy
 */
class MeetingsTablePolicy
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
