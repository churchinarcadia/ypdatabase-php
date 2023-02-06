<?php
declare(strict_types=1);

namespace App\Utility;

use Authorization\IdentityInterface;

use Cake\ORM\TableRegistry;

/**
 * Company policy
 */
class PolicyFunctions
{

    public function isUserAuthorized (IdentityInterface $user, $user_roles = [1])
    {
        return in_array($user->user_type_id, $user_roles);
    }
}
?>