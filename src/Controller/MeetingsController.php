<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * Meetings Controller
 *
 * @property \App\Model\Table\MeetingsTable $Meetings
 * @method \App\Model\Entity\Meeting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MeetingsController extends AppController
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
            
                $can_meeting = $this->Meetings->newEmptyEntity();
                
                //$this->permissions['address']['add'] = false;
                $this->permissions['meeting']['add'] = $this->identity->canResult('add', $can_meeting)->getStatus();
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
        $meetings_query = $this->Meetings->find(
            'all',
            [
                'contain' => [
                    'MeetingLocations',
                    'MeetingTypes',
                    'MeetingCreator',
                    'MeetingModifier',
                ]
            ]
        );

        $this->Authorization->authorize($meetings_query);

        $meetings = $this->paginate($meetings_query);

        if ($this->identity) {
            foreach ($meetings as $meeting) {
                //$this->permissions['meeting'][$meeting->id]['id'] = $meeting->id;
                $this->permissions['meeting'][$meeting->id]['can']['view'] = $this->identity->canResult('view', $meeting)->getStatus();
                $this->permissions['meeting'][$meeting->id]['can']['edit'] = $this->identity->canResult('edit', $meeting)->getStatus();
                $this->permissions['meeting'][$meeting->id]['can']['delete'] = $this->identity->canResult('delete', $meeting)->getStatus();
            }
        }
        
        $permissions = $this->permissions;

        $this->set(compact('meetings', 'permissions'));
    }

    /**
     * View method
     *
     * @param string|null $id Meeting id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $meeting = $this->Meetings->get($id, [
            'contain' => [
                'MeetingLocations',
                'MeetingTypes',
                'MeetingPeople',
                'MeetingCreators',
                'MeetingModifiers',
            ],
        ]);

        $this->Authorization->authorize($meeting);

        if ($this->identity) {
            //$this->permissions['meeting'][$meeting->id]['id'] = $meeting->id;
            $this->permissions['meeting'][$meeting->id]['can']['edit'] = $this->identity->canResult('edit', $meeting)->getStatus();
            $this->permissions['meeting'][$meeting->id]['can']['delete'] = $this->identity->canResult('delete', $meeting)->getStatus();
        }

        $permissions = $this->permissions;

        $this->set(compact('meeting', 'permissions'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $meeting = $this->Meetings->newEmptyEntity();

        $this->Authorization->authorize($meeting);

        if ($this->request->is('post')) {
            $meeting = $this->Meetings->patchEntity($meeting, $this->request->getData());
            if ($this->Meetings->save($meeting)) {
                $this->Flash->success(__('The meeting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meeting could not be saved. Please, try again.'));
        }
        $meetingLocations = $this->Meetings->MeetingLocations->find('list', ['limit' => 200])->all();
        $meetingTypes = $this->Meetings->MeetingTypes->find('list', ['limit' => 200])->all();
        $this->set(compact('meeting', 'meetingTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Meeting id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $meeting = $this->Meetings->get($id, [
            'contain' => [],
        ]);

        $this->Authorization->authorize($meeting);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $meeting = $this->Meetings->patchEntity($meeting, $this->request->getData());
            if ($this->Meetings->save($meeting)) {
                $this->Flash->success(__('The meeting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meeting could not be saved. Please, try again.'));
        }
        if ($this->identity) {
            $this->permissions['meeting'][$meeting->id]['can']['delete'] = $this->identity->canResult('delete', $meeting)->getStatus();
        }
        $permissions = $this->permissions;
        $meetingLocations = $this->Meetings->MeetingLocations->find('list', ['limit' => 200])->all();
        $meetingTypes = $this->Meetings->MeetingTypes->find('list', ['limit' => 200])->all();
        $users = $this->Meetings->MeetingCreators->find('list', ['limit' => 200])->all();
        $this->set(compact('meeting', 'permissions', 'meetingLocations', 'meetingTypes', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Meeting id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $meeting = $this->Meetings->get($id);
        
        $this->Authorization->authorize($meeting);

        if ($this->Meetings->delete($meeting)) {
            $this->Flash->success(__('The meeting has been deleted.'));
        } else {
            $this->Flash->error(__('The meeting could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
