<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * MeetingLocationsNotify Controller
 *
 * @property \App\Model\Table\MeetingLocationsNotifyTable $MeetingLocationsNotify
 * @method \App\Model\Entity\MeetingLocationsNotify[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MeetingLocationsNotifyController extends AppController
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
            
                $can_meetingLocationsNotify = $this->MeetingLocationsNotify->newEmptyEntity();
                
                //$this->permissions['address']['add'] = false;
                $this->permissions['meeting_locations_notify']['add'] = $this->identity->canResult('add', $can_meetingLocationsNotify)->getStatus();
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
        $meetingLocationsNotify_query = $this->MeetingLocationsNotify->find(
            'all',
            [
                'contain' => [
                    'MeetingLocations',
                    'People',
                    'MeetingLocationsNotifyCreators',
                    'MeetingLocationsNotifyModifiers'
                ]
            ]
        );

        $this->Authorize->authorize($meetingLocationsNotify_query);

        $meetingLocationsNotify = $this->paginate($meetingLocationsNotify_query);

        if ($this->identify) {
            foreach ($meetingLocationsNotify as $meetingLocationsNotify_entry) {
                //$this->permissions['meeting_location_notify'][$meetingLocationsNotify_entry->id]['id'] = $meetingLocationsNotify_entry->id;
                $this->permissions['meeting_location_notify'][$meetingLocationsNotify_entry->id]['can']['view'] = $this->identity->canResult('view', $meetingLocationsNotify_entry)->getStatus();
                $this->permissions['meeting_location_notify'][$meetingLocationsNotify_entry->id]['can']['edit'] = $this->identity->canResult('edit', $meetingLocationsNotify_entry)->getStatus();
                $this->permissions['meeting_location_notify'][$meetingLocationsNotify_entry->id]['can']['delete'] = $this->identity->canResult('delete', $meetingLocationsNotify_entry)->getStatus();
            }
        }

        $permissions = $this->permissions;

        $this->set(compact('meetingLocationsNotify', 'permissions'));
    }

    /**
     * View method
     *
     * @param string|null $id Meeting Locations Notify id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $meetingLocationsNotify = $this->MeetingLocationsNotify->get($id, [
            'contain' => [
                'MeetingLocations',
                'People',
                'MeetingLocationsNotifyCreators',
                'MeetingLocationsNotifyModifiers'
            ],
        ]);

        $this->Authorization->authorize($meetingLocationsNotify);

        if ($this->identity) {
            //$this->permissions['meeting_location_notify'][$meetingLocationsNotify->id]['id'] = $meetingLocationsNotify->id;
            $this->permissions['meeting_location_notify'][$meetingLocationsNotify->id]['can']['edit'] = $this->identity->canResult('edit', $meetingLocationsNotify)->getStatus();
            $this->permissions['meeting_location_notify'][$meetingLocationsNotify->id]['can']['delete'] = $this->identity->canResult('delete', $meetingLocationsNotify)->getStatus();
        }

        $permissions = $this->permissions;

        $this->set(compact('meetingLocationsNotify', 'permissions'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $meetingLocationsNotify = $this->MeetingLocationsNotify->newEmptyEntity();

        $this->Authorization->authorize($meetingLocationsNotify);

        if ($this->request->is('post')) {
            $meetingLocationsNotify = $this->MeetingLocationsNotify->patchEntity($meetingLocationsNotify, $this->request->getData());
            if ($this->MeetingLocationsNotify->save($meetingLocationsNotify)) {
                $this->Flash->success(__('The meeting locations notify has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meeting locations notify could not be saved. Please, try again.'));
        }
        $meetingLocations = $this->MeetingLocationsNotify->MeetingLocations->find('list', ['limit' => 200])->all();
        $people = $this->MeetingLocationsNotify->People->find('list', ['limit' => 200])->all();
        $this->set(compact('meetingLocationsNotify', 'meetingLocations', 'people'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Meeting Locations Notify id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $meetingLocationsNotify = $this->MeetingLocationsNotify->get($id, [
            'contain' => [],
        ]);

        $this->Authorization->authorize($meetingLocationsNotify);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $meetingLocationsNotify = $this->MeetingLocationsNotify->patchEntity($meetingLocationsNotify, $this->request->getData());
            if ($this->MeetingLocationsNotify->save($meetingLocationsNotify)) {
                $this->Flash->success(__('The meeting locations notify has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meeting locations notify could not be saved. Please, try again.'));
        }
        if ($this->identity) {
            $this->permissions['meeting_location_notify'][$meetingLocationsNotify->id]['can']['delete'] = $this->identity->canResult('delete', $meetingLocationsNotify)->getStatus();
        }
        $permissions = $this->permissions;
        $meetingLocations = $this->MeetingLocationsNotify->MeetingLocations->find('list', ['limit' => 200])->all();
        $people = $this->MeetingLocationsNotify->People->find('list', ['limit' => 200])->all();
        $users = $this->MeetingLocationsNotify->MeetingLocationsNotifyCreators->find('list', ['limit' => 200])->all();
        $this->set(compact('meetingLocationsNotify', 'permissions', 'meetingLocations', 'people', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Meeting Locations Notify id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $meetingLocationsNotify = $this->MeetingLocationsNotify->get($id);

        $this->Authorization->authorize($meetingLocationsNotify);
        
        if ($this->MeetingLocationsNotify->delete($meetingLocationsNotify)) {
            $this->Flash->success(__('The meeting locations notify has been deleted.'));
        } else {
            $this->Flash->error(__('The meeting locations notify could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
