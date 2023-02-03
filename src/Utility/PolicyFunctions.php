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
        return TableRegistry::getTableLocator()->get('Users')
            ->exists([
                'id' => $user['id'],
                'usertype_id in' => $user_roles,
        ]);
    }
}
?>