<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\MeetingLocationsNotifyTable;
use Authorization\IdentityInterface;

use Cake\ORM\Query;

/**
 * MeetingLocationsNotify policy
 */
class MeetingLocationsNotifyTablePolicy
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
