<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * Addresses Controller
 *
 * @property \App\Model\Table\AddressesTable $Addresses
 * @method \App\Model\Entity\Address[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AddressesController extends AppController
{
    /**
     * Identity of logged in user.
     * 
     * @var object
     */
    private $identity;
    
    /**
     * User permissions
     * 
     * @var array
     */
    private $permissions;
    
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

        $this->identity = $this->request->getAttribute('identity');

        if ($this->identity) {
            if (in_array($this->request->getParam('action'),['index', 'view', 'edit'])) {
            
                $can_attendee = $this->Addresses->newEmptyEntity();
                
                //$this->permissions['address']['add'] = false;
                $this->permissions['address']['add'] = $this->identity->canResult('add', $can_attendee)->getStatus();
            }
        }        
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
        parent::beforeRender($event);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $addresses_query = $this->Addresses->find(
            'all',
            [
                'contain' => [
                    'AddressCreators',
                    'AddressModifiers'
                ]
            ]
        );
        
        $this->Authorization->authorize($addresses_query);

        $addresses = $this->paginate($addresses_query);

        if ($this->identity) {
            foreach ($addresses as $address) {
                //$this->permissions['address'][$address->id]['id'] = $address->id;
                $this->permissions['address'][$address->id]['can']['view'] = $this->identity->canResult('view', $address)->getStatus();
                $this->permissions['address'][$address->id]['can']['edit'] = $this->identity->canResult('edit', $address)->getStatus();
                $this->permissions['address'][$address->id]['can']['delete'] = $this->identity->canResult('delete', $address)->getStatus();
            }
        }
        
        $permissions = $this->permissions;

        $this->set(compact('addresses', 'permissions'));
    }

    /**
     * View method
     *
     * @param string|null $id Address id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $address = $this->Addresses->get($id, [
            'contain' => [
                'MeetingLocations',
                'People',
                'AddressCreators',
                'AddressModifiers'
            ],
        ]);

        $this->Authorization->authorize($address);

        if ($this->identity) {
            //$this->permissions['address'][$address->id]['id'] = $address->id;
            $this->permissions['address'][$address->id]['can']['edit'] = $this->identity->canResult('edit', $address)->getStatus();
            $this->permissions['address'][$address->id]['can']['delete'] = $this->identity->canResult('delete', $address)->getStatus();
        }

        $permissions = $this->permissions;

        $this->set(compact('address', 'permissions'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $address = $this->Addresses->newEmptyEntity();
        
        $this->Authorization->authorize($address);
        
        if ($this->request->is('post')) {
            $address = $this->Addresses->patchEntity($address, $this->request->getData());
            if ($this->Addresses->save($address)) {
                $this->Flash->success(__('The address has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The address could not be saved. Please, try again.'));
        }
        $this->set(compact('address'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Address id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $address = $this->Addresses->get($id, [
            'contain' => [],
        ]);

        $this->Authorization->authorize($address);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $address = $this->Addresses->patchEntity($address, $this->request->getData());
            if ($this->Addresses->save($address)) {
                $this->Flash->success(__('The address has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The address could not be saved. Please, try again.'));
        }
        if ($this->identity) {
            $this->permissions['address'][$address->id]['can']['delete'] = $this->identity->canResult('delete', $address)->getStatus();
        }
        $permissions = $this->permissions;
        $users = $this->Addresses->AddressCreators->find('list', ['limit' => 200])->all();
        $this->set(compact('address', 'permissions', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Address id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $address = $this->Addresses->get($id);

        $this->Authorization->authorize($address);

        if ($this->Addresses->delete($address)) {
            $this->Flash->success(__('The address has been deleted.'));
        } else {
            $this->Flash->error(__('The address could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
