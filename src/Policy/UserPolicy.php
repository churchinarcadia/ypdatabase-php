<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use Authorization\IdentityInterface;

use Authorization\Policy\BeforePolicyInterface;
use Authorization\Policy\Result;

use App\Utility\PolicyFunctions;

/**
 * User policy
 */
class UserPolicy
{
    /**
     * Defines a pre-authorization check.
     *
     * If a boolean value is returned, the action check will be skipped and pre-authorization
     * check result will be returned. In case of `null`, the action check will take place.
     *
     * @param \Authorization\IdentityInterface|null $user Identity object.
     * @param mixed $resource The resource being operated on.
     * @param string $action The action/operation being performed.
     * @return \Authorization\Policy\ResultInterface|bool|null
     */
    public function before($user, $resource, $action)
    {
        $functions = new PolicyFunctions;

        return $functions->isUserAuthorized($user,[1]);
        
        /*
        if ($user->getOriginalData()->is_admin()) {
            return true;
        }
        */
    }

    /**
     * Check if $user can add User
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\User $resource
     * @return bool
     */
    public function canAdd(IdentityInterface $user, User $resource)
    {
        /*
        $functions = new PolicyFunctions;

        return $functions->isUserAuthorized($user,[2]);
        */
    }

    /**
     * Check if $user can edit User
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\User $resource
     * @return bool
     */
    public function canEdit(IdentityInterface $user, User $resource)
    {
        $functions = new PolicyFunctions;

        return ($resource->user_type_id >= 2 && $functions->isUserAuthorized($user,[2])) || $resource->id == $user->id;
    }

    /**
     * Check if $user can delete User
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\User $resource
     * @return bool
     */
    public function canDelete(IdentityInterface $user, User $resource)
    {
    }

    /**
     * Check if $user can view User
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\User $resource
     * @return bool
     */
    public function canView(IdentityInterface $user, User $resource)
    {
        $functions = new PolicyFunctions;

        return $functions->isUserAuthorized($user,[2,3]);
    }

    /**
     * Check if $user can log in
     * 
     * @param \Authorization\IdentityInterface $user The user.
     * @return bool
     */
    public function canLogin(IdentityInterface $user)
    {
        $status = $user->status;

        if ($status == 'Approved') {
            return new Result(true);
        } elseif ($status == 'Pending') {
            return new Result(
                false,
                'Your account is still pending approval. If your account is still pending after seven days after creation, please contact a serving one.'
            );
        } elseif ($status == 'Denied') {
            return new Result(
                false,
                'Your account creation has been denied. For further details, please contact a serving one.'
            );
        } elseif ($status == 'Deactivated') {
            return new Result(
                false,
                'Your account has been deactivated. To reactivate it, please contact a serving one.'
            );
        }
    }
}
