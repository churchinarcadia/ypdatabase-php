<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\MeetingLocationsTable;
use Authorization\IdentityInterface;

use Cake\ORM\Query;

/**
 * MeetingLocations policy
 */
class MeetingLocationsTablePolicy
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
