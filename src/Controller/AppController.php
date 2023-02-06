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
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;

use Cake\Core\Configure;
use Cake\Event\EventInterface;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Client timezone
     * 
     * @var string
     */
    protected $timezone;

    /**
     * "Can" array
     * Creates an array indicating if the user can add, edit, delete, or view
     * Used to determine if relevant action buttons/links will be displayed to the user in the view
     * Set only if a controller is loaded
     * 
     * @var array
     */
    protected $can;
    
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');

        $this->loadComponent('Authentication.Authentication');
        $this->loadComponent('Authorization.Authorization');

        /**
         * Reads timezone stored from cookie
         * If timezone in profile is set, that is used.
         * Otherwise timezone is guessed from user's IP address.
         */
        $this->timezone = Configure::read('App.timezone');

        /**
         * For all controllers except Pages,
         * checks if user can add, edit, delete, or view
         * and creates an array with that information
         */
        /*
        if ($this->request->getParam('controller') != '' && $this->request->getParam('controller') != 'Pages') {
            $user = $this->request->getAttribute('identity');
            $can['add'] = $user->can('add');
            $can['edit'] = $user->can('edit');
            $can['delete'] = $user->can('delete');
            $can['view'] = $user->can('view');

            $this->set(compact('can'));
        }
        */
    
    }

    /**
     * Called after the controller action is run, but before the view is rendered. You can use this method
     * to perform logic or set view variables that are required on every request.
     *
     * @param \Cake\Event\EventInterface $event An Event instance
     * @return \Cake\Http\Response|null|void
     * @link https://book.cakephp.org/4/en/controllers.html#request-life-cycle-callbacks
     */
    public function beforeRender(EventInterface $event)
    {
        $timezone = $this->timezone;
        $this->set(compact('timezone'));
    }
}
