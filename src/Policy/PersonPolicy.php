<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Person;
use Authorization\IdentityInterface;

use Authorization\Policy\BeforePolicyInterface;

use App\Utility\PolicyFunctions;

/**
 * Person policy
 */
class PersonPolicy
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

        return $functions->isUserAuthorized($user,[1,2]);
        
        /*
        if ($user->getOriginalData()->is_admin()) {
            return true;
        }
        */
    }

    /**
     * Check if $user can add Person
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Person $person
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Person $person)
    {
        /*
        $functions = new PolicyFunctions;

        return $functions->isUserAuthorized($user,[2]);
        */
    }

    /**
     * Check if $user can edit Person
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Person $person
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Person $person)
    {
        /*
        $functions = new PolicyFunctions;

        return $functions->isUserAuthorized($user,[2]);
        */
    }

    /**
     * Check if $user can delete Person
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Person $person
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Person $person)
    {
        //TODO check if deleting with foreignkey restrictions or forced cascade
        //Only allow forced cascade with admin roles.
        /*
        $functions = new PolicyFunctions;

        return $functions->isUserAuthorized($user,[2]);
        */
    }

    /**
     * Check if $user can view Person
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Person $person
     * @return bool
     */
    public function canView(IdentityInterface $user, Person $person)
    {
        $functions = new PolicyFunctions;

        return $functions->isUserAuthorized($user,[3]);
    }
}
