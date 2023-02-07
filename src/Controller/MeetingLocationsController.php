<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * MeetingLocations Controller
 *
 * @property \App\Model\Table\MeetingLocationsTable $MeetingLocations
 * @method \App\Model\Entity\MeetingLocation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MeetingLocationsController extends AppController
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
            
                $can_meetingLocation = $this->MeetingLocations->newEmptyEntity();
                
                //$this->permissions['address']['add'] = false;
                $this->permissions['meeting_location']['add'] = $this->identity->canResult('add', $can_meetingLocation)->getStatus();
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
        $meetingLocations_query = $this->MeetingLocations->find(
            'all',
            [
                'contain' => [
                    'Addresses',
                    'MeetingLocationCreators',
                    'MeetingLocationModifiers',
                ]
            ]
        );

        $this->Authorization->authorize($meetingLocations_query);

        $meetingLocations = $this->paginate($meetingLocations_query);

        if ($this->identity) {
            foreach ($meetingLocations as $meetingLocation) {
                //$this->permissions['meeting_location'][$meetingLocation->id]['id'] = $meetingLocation->id;
                $this->permissions['meeting_location'][$meetingLocation->id]['can']['view'] = $this->identity->canResult('view', $meetingLocation)->getStatus();
                $this->permissions['meeting_location'][$meetingLocation->id]['can']['edit'] = $this->identity->canResult('edit', $meetingLocation)->getStatus();
                $this->permissions['meeting_location'][$meetingLocation->id]['can']['delete'] = $this->identity->canResult('delete', $meetingLocation)->getStatus();
            }
        }

        $permissions = $this->permissions;

        $this->set(compact('meetingLocations', 'permissions'));
    }

    /**
     * View method
     *
     * @param string|null $id Meeting Location id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $meetingLocation = $this->MeetingLocations->get($id, [
            'contain' => [
                'Addresses',
                'MeetingLocationsNotify',
                'Meetings',
                'MeetingLocationCreators',
                'MeetingLocationModifiers',
            ],
        ]);

        $this->Authorization->authorize($meetingLocation);

        if ($this->identity) {
            //$this->permissions['address'][$address->id]['id'] = $address->id;
            $this->permissions['meeting_location'][$meetingLocation->id]['can']['edit'] = $this->identity->canResult('edit', $meetingLocation)->getStatus();
            $this->permissions['meeting_location'][$meetingLocation->id]['can']['delete'] = $this->identity->canResult('delete', $meetingLocation)->getStatus();
        }

        $permissions = $this->permissions;

        $this->set(compact('meetingLocation', 'permissions'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $meetingLocation = $this->MeetingLocations->newEmptyEntity();

        $this->Authorization->authorize($meetingLocation);

        if ($this->request->is('post')) {
            $meetingLocation = $this->MeetingLocations->patchEntity($meetingLocation, $this->request->getData());
            if ($this->MeetingLocations->save($meetingLocation)) {
                $this->Flash->success(__('The meeting location has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meeting location could not be saved. Please, try again.'));
        }
        $addresses = $this->MeetingLocations->Addresses->find('list', ['limit' => 200])->all();

        $this->set(compact('meetingLocation', 'addresses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Meeting Location id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $meetingLocation = $this->MeetingLocations->get($id, [
            'contain' => [],
        ]);

        $this->Authorization->authorize($meetingLocation);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $meetingLocation = $this->MeetingLocations->patchEntity($meetingLocation, $this->request->getData());
            if ($this->MeetingLocations->save($meetingLocation)) {
                $this->Flash->success(__('The meeting location has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meeting location could not be saved. Please, try again.'));
        }
        if ($this->identity) {
            $this->permissions['meeting_location'][$meetingLocation->id]['can']['delete'] = $this->identity->canResult('delete', $meetingLocation)->getStatus();
        }
        $permissions = $this->permissions;
        $addresses = $this->MeetingLocations->Addresses->find('list', ['limit' => 200])->all();
        $users = $this->MeetingLocations->MeetingLocationCreators->find('list', ['limit' => 200])->all();

        $this->set(compact('meetingLocation', 'permissions', 'addresses', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Meeting Location id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $meetingLocation = $this->MeetingLocations->get($id);

        $this->Authorization->authorize($meetingLocation);

        if ($this->MeetingLocations->delete($meetingLocation)) {
            $this->Flash->success(__('The meeting location has been deleted.'));
        } else {
            $this->Flash->error(__('The meeting location could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
