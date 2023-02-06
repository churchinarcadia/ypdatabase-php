<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.3.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App;

use Cake\Core\Configure;
use Cake\Core\ContainerInterface;
use Cake\Datasource\FactoryLocator;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Http\Middleware\BodyParserMiddleware;
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Http\MiddlewareQueue;
use Cake\ORM\Locator\TableLocator;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;

//Imports related to Authentication
use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Authentication\AuthenticationServiceProviderInterface;
use Authentication\Identifier\IdentifierInterface;
use Authentication\Middleware\AuthenticationMiddleware;
use Cake\Routing\Router;
use Psr\Http\Message\ServerRequestInterface;

//Imports related to Authorization
use Authorization\AuthorizationService;
use Authorization\AuthorizationServiceInterface;
use Authorization\AuthorizationServiceProviderInterface;
use Authorization\Middleware\AuthorizationMiddleware;
use Authorization\Policy\OrmResolver;
use Psr\Http\Message\ResponseInterface;

//Listener Import for SocialAuth
use App\Event\SocialAuthListener;
use Cake\Event\EventManager;

//Imports related to Timezone
use \jeanvaljean\Timezone\Middleware\TimezoneMiddleware;
use \jeanvaljean\Timezone\Middleware\GeoPlugin;

/**
 * Application setup class.
 *
 * This defines the bootstrapping logic and middleware layers you
 * want to use in your application.
 */
class Application extends BaseApplication
implements AuthenticationServiceProviderInterface, AuthorizationServiceProviderInterface
{
    /**
     * Load all the application configuration and bootstrap logic.
     *
     * @return void
     */
    public function bootstrap(): void
    {
        // Call parent to load bootstrap from files.
        parent::bootstrap();

        if (PHP_SAPI === 'cli') {
            $this->bootstrapCli();
        } else {
            FactoryLocator::add(
                'Table',
                (new TableLocator())->allowFallbackClass(false)
            );
        }

        /*
         * Only try to load DebugKit in development mode
         * Debug Kit should not be installed on a production system
         */
        if (Configure::read('debug')) {
            $this->addPlugin('DebugKit');
        }

        // Load more plugins here
        $this->addPlugin('Authorization');
        $this->addPlugin('Authentication');
        $this->addPlugin('ADmad/SocialAuth');
        $this->addPlugin('IdeHelper');
        $this->addPlugin('jeanvaljean/Timezone');
    }

    /**
     * Setup the middleware queue your application will use.
     *
     * @param \Cake\Http\MiddlewareQueue $middlewareQueue The middleware queue to setup.
     * @return \Cake\Http\MiddlewareQueue The updated middleware queue.
     */
    public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
    {
        $middlewareQueue
            // Catch any exceptions in the lower layers,
            // and make an error page/response
            ->add(new ErrorHandlerMiddleware(Configure::read('Error')))

            // Handle plugin/theme assets like CakePHP normally does.
            ->add(new AssetMiddleware([
                'cacheTime' => Configure::read('Asset.cacheTime'),
            ]))

            // Add routing middleware.
            // If you have a large number of routes connected, turning on routes
            // caching in production could improve performance. For that when
            // creating the middleware instance specify the cache config name by
            // using it's second constructor argument:
            // `new RoutingMiddleware($this, '_cake_routes_')`
            ->add(new RoutingMiddleware($this))

            // Parse various types of encoded request bodies so that they are
            // available as array through $request->getData()
            // https://book.cakephp.org/4/en/controllers/middleware.html#body-parser-middleware
            ->add(new BodyParserMiddleware())

            // Cross Site Request Forgery (CSRF) Protection Middleware
            // https://book.cakephp.org/4/en/controllers/middleware.html#cross-site-request-forgery-csrf-middleware
            ->add(new CsrfProtectionMiddleware([
                'httponly' => true,
            ]))


            ->add(new \ADmad\SocialAuth\Middleware\SocialAuthMiddleware([
                // Request method type use to initiate authentication.
                'requestMethod' => 'GET',
                // Login page URL. In case of auth failure user is redirected to login
                // page with "error" query string var.
                'loginUrl' => '/profiles/login',
                // URL to redirect to after authentication (string or array).
                'loginRedirect' => '/',
                // Boolean indicating whether user identity should be returned as entity.
                'userEntity' => false,
                // User model.
                'userModel' => 'Profiles',
                // Social profile model.
                'socialProfileModel' => 'ADmad/SocialAuth.SocialProfiles',
                // Finder type.
                'finder' => 'all',
                // Fields.
                'fields' => [
                    //'password' => 'password',
                ],
                // Session key to which to write identity record to.
                'sessionKey' => 'Auth',
                // The method in user model which should be called in case of new user.
                // It should return a User entity.
                'getUserCallback' => 'getUser',
                // SocialConnect Auth service's providers config. https://github.com/SocialConnect/auth/blob/master/README.md
                'serviceConfig' => Configure::read('SocialAuthServiceConfig'),
                // Instance of `\SocialConnect\Auth\CollectionFactory`. If none provided one will be auto created. Default `null`.
                'collectionFactory' => null,
                // Whether social connect errors should be logged. Default `true`.
                'logErrors' => true,
            ]))
            
            // Authentication Middleware
            // Call a hook method on your application when it starts handling the request
            // This hook method allows your application to define the AuthenticationService it wants to use.
            ->add(new AuthenticationMiddleware($this))

            // Authorization Middleware
            // Call a hook method on your application when it starts handling the request
            // This hook method allows your application to define the AuthorizationService it wants to use.
            ->add(new AuthorizationMiddleware($this))

            //Timezone Middleware
            ->add(new TimezoneMiddleware(
                new GeoPlugin(),
                [
                    'defaultTimezone' => 'UTC',
                    'cookieTime' => 12
            ]));

        return $middlewareQueue;
    }

    /**
     * Register application container services.
     *
     * @param \Cake\Core\ContainerInterface $container The Container to update.
     * @return void
     * @link https://book.cakephp.org/4/en/development/dependency-injection.html#dependency-injection
     */
    public function services(ContainerInterface $container): void
    {
    }

    /**
     * Bootstrapping for CLI application.
     *
     * That is when running commands.
     *
     * @return void
     */
    protected function bootstrapCli(): void
    {
        $this->addOptionalPlugin('Cake/Repl');
        $this->addOptionalPlugin('Bake');

        $this->addPlugin('Migrations');

        // Load more plugins here
    }

    /**
     * Returns a service provider instance.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request Request
     * @return \Authentication\AuthenticationServiceInterface
     */
    public function getAuthenticationService(ServerRequestInterface $request): AuthenticationServiceInterface
    {
        $service = new AuthenticationService();

        // Define where users should be redirected to when they are not authenticated
        $service->setConfig([
            'unauthenticatedRedirect' => Router::url([
                    'prefix' => false,
                    'plugin' => null,
                    'controller' => 'Users',
                    'action' => 'login',
            ]),
            'queryParam' => 'redirect',
        ]);

        $fields = [
            IdentifierInterface::CREDENTIAL_USERNAME => 'email',
            IdentifierInterface::CREDENTIAL_PASSWORD => 'password'
        ];
        // Load the authenticators. Session should be first.
        $service->loadAuthenticator('Authentication.Session');
        $service->loadAuthenticator('Authentication.Form', [
            'fields' => $fields,
            'loginUrl' => Router::url([
                'prefix' => false,
                'plugin' => null,
                'controller' => 'Users',
                'action' => 'login',
            ]),
        ]);

        // Load identifiers
        $service->loadIdentifier('Authentication.Password', compact('fields'));

        return $service;
    }

    /**
     * Returns a service provider instance.
     * Configures basic policy resolvers that will match ORM entities with their policy classes.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request Request
     * @return \Authentication\AuthorizationServiceInterface
     */
    public function getAuthorizationService(ServerRequestInterface $request): AuthorizationServiceInterface
    {
        $resolver = new OrmResolver();

        return new AuthorizationService($resolver);
    }
}
