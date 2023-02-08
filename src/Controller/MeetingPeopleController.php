<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * MeetingPeople Controller
 *
 * @property \App\Model\Table\MeetingPeopleTable $MeetingPeople
 * @method \App\Model\Entity\MeetingPerson[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MeetingPeopleController extends AppController
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
            
                $can_meetingPeople = $this->MeetingPeople->newEmptyEntity();
                
                //$this->permissions['address']['add'] = false;
                $this->permissions['meeting_people']['add'] = $this->identity->canResult('add', $can_meetingPeople)->getStatus();
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
        $meetingPeople_query = $this->MeetingPeople->find(
            'all',
            [
                'contain' => [
                    'Meetings',
                    'People',
                    'MeetingPeopleCreators',
                    'MeetingPeopleModifier'
                ]
            ]
        );

        $this->Authorization->authorize($meetingPeople_query);

        $meetingPeople = $this->paginate($meetingPeople_query);

        if ($this->identity) {
            foreach ($meetingPeople as $meetingPerson) {
                //$this->permissions['meeting_person'][$meetingPerson->id]['id'] = $meetingPerson->id;
                $this->permissions['meeting_person'][$meetingPerson->id]['can']['view'] = $this->identity->canResult('view', $meetingPerson)->getStatus();
                $this->permissions['meeting_person'][$meetingPerson->id]['can']['edit'] = $this->identity->canResult('edit', $meetingPerson)->getStatus();
                $this->permissions['meeting_person'][$meetingPerson->id]['can']['delete'] = $this->identity->canResult('delete', $meetingPerson)->getStatus();
            }
        }
        
        $permissions = $this->permissions;

        $this->set(compact('meetingPeople', 'permissions'));
    }

    /**
     * View method
     *
     * @param string|null $id Meeting Person id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $meetingPerson = $this->MeetingPeople->get($id, [
            'contain' => [
                'Meetings',
                'People',
                'MeetingPeopleCreators',
                'MeetingPeopleModifiers'
            ],
        ]);

        $this->Authorization->authorize($meetingPerson);

        if ($this->identity) {
            //$this->permissions['meeting_person'][$meetingPerson->id]['id'] = $meetingPerson->id;
            $this->permissions['meeting_person'][$meetingPerson->id]['can']['edit'] = $this->identity->canResult('edit', $meetingPerson)->getStatus();
            $this->permissions['meeting_person'][$meetingPerson->id]['can']['delete'] = $this->identity->canResult('delete', $meetingPerson)->getStatus();
        }

        $permissions = $this->permissions;

        $this->set(compact('meetingPerson', 'permissions'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $meetingPerson = $this->MeetingPeople->newEmptyEntity();

        $this->Authorization->authorize($meetingPerson);

        if ($this->request->is('post')) {
            $meetingPerson = $this->MeetingPeople->patchEntity($meetingPerson, $this->request->getData());
            if ($this->MeetingPeople->save($meetingPerson)) {
                $this->Flash->success(__('The meeting person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meeting person could not be saved. Please, try again.'));
        }
        $meetings = $this->MeetingPeople->Meetings->find('list', ['limit' => 200])->all();
        $people = $this->MeetingPeople->People->find('list', ['limit' => 200])->all();
        $this->set(compact('meetingPerson', 'meetings', 'people'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Meeting Person id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $meetingPerson = $this->MeetingPeople->get($id, [
            'contain' => [],
        ]);

        $this->Authorization->authorize($meetingPerson);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $meetingPerson = $this->MeetingPeople->patchEntity($meetingPerson, $this->request->getData());
            if ($this->MeetingPeople->save($meetingPerson)) {
                $this->Flash->success(__('The meeting person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meeting person could not be saved. Please, try again.'));
        }
        if ($this->identity) {
            $this->permissions['meeting_person'][$meetingPerson->id]['can']['delete'] = $this->identity->canResult('delete', $meetingPerson)->getStatus();
        }
        $permissions = $this->permissions;
        $meetings = $this->MeetingPeople->Meetings->find('list', ['limit' => 200])->all();
        $people = $this->MeetingPeople->People->find('list', ['limit' => 200])->all();
        $user = $this->MeetingPeople->MeetingPeopleCreators->find('list', ['limit' => 200])->all();
        $this->set(compact('meetingPerson', 'permissions', 'meetings', 'people', 'user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Meeting Person id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $meetingPerson = $this->MeetingPeople->get($id);

        $this->Authorization->authorize($meetingPerson);

        if ($this->MeetingPeople->delete($meetingPerson)) {
            $this->Flash->success(__('The meeting person has been deleted.'));
        } else {
            $this->Flash->error(__('The meeting person could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
