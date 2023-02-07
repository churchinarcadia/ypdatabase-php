<?php

namespace App\Event;

use ADmad\SocialAuth\Middleware\SocialAuthMiddleware;
use Cake\Datasource\EntityInterface;
use Cake\Event\EventInterface;
use Cake\Event\EventListenerInterface;
use Cake\Http\ServerRequest;
use Cake\I18n\FrozenTime;
use Cake\ORM\Locator\LocatorAwareTrait;

class SocialAuthListener implements EventListenerInterface
{
    use LocatorAwareTrait;

    public function implementedEvents(): array
    {
        return [
            SocialAuthMiddleware::EVENT_AFTER_IDENTIFY => 'afterIdentify',
            SocialAuthMiddleware::EVENT_BEFORE_REDIRECT => 'beforeRedirect',
            // Uncomment below if you want to use the event listener to return
            // an entity for a new user instead of directly using `createUser()` table method.
            // SocialAuthMiddleware::EVENT_CREATE_USER => 'createUser',
        ];
    }

    public function afterIdentify(EventInterface $event, EntityInterface $user): EntityInterface
    {
        // Update last login time
        $user->set('last_login', new FrozenTime());

        // You can access the profile using $user->social_profile

        $this->getTableLocator()->get('Users')->saveOrFail($user);

        return $user;
    }

    /**
     * @param \Cake\Event\EventInterface $event
     * @param string|array $url
     * @param string $status
     * @param \Cake\Http\ServerRequest $request
     * @return void
     */
    public function beforeRedirect(EventInterface $event, $url, string $status, ServerRequest $request): void
    {
        // Set flash message
        switch ($status) {
            case SocialAuthMiddleware::AUTH_STATUS_SUCCESS:
                $request->getFlash()->error('You are now logged in.');
                break;

            // Auth through provider failed. Details will be logged in
            // `error.log` if `logErrors` option is set to `true`.
            case SocialAuthMiddleware::AUTH_STATUS_PROVIDER_FAILURE:

            // Table finder failed to return user record. An e.g. of this is a
            // user has been authenticated through provider but your finder has
            // a condition to not return an inactivated user.
            case SocialAuthMiddleware::AUTH_STATUS_FINDER_FAILURE:
                $request->getFlash()->error('Authentication failed.');
                break;

            case SocialAuthMiddleware::AUTH_STATUS_IDENTITY_MISMATCH:
                $request->getFlash()->error('The social profile is already linked to another user.');
                break;
        }

        // You can return a modified redirect URL if needed.
    }

    public function createUser(EventInterface $event, EntityInterface $profile, Session $session): EntityInterface
    {
        // Create and save entity for new user as shown in "createUser()" method above

        return $user;
    }
}
?>