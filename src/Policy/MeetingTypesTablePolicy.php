<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\MeetingTypesTable;
use Authorization\IdentityInterface;

use Cake\ORM\Query;

/**
 * MeetingTypes policy
 */
class MeetingTypesTablePolicy
{
    public function canIndex(IdentityInterface $user, Query $query)
    {
        return true;
    }
}
