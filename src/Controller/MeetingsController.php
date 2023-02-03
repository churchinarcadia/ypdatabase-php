<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Meetings Controller
 *
 * @property \App\Model\Table\MeetingsTable $Meetings
 * @method \App\Model\Entity\Meeting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MeetingsController extends AppController
{
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

        $this->set(compact('meetings'));
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

        $this->set(compact('meeting'));
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
        $meetingLocations = $this->Meetings->MeetingLocations->find('list', ['limit' => 200])->all();
        $meetingTypes = $this->Meetings->MeetingTypes->find('list', ['limit' => 200])->all();
        $users = $this->Meetings->MeetingCreators->find('list', ['limit' => 200])->all();
        $this->set(compact('meeting', 'meetingLocations', 'meetingTypes', 'users'));
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
