<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MeetingLocationsNotify Controller
 *
 * @property \App\Model\Table\MeetingLocationsNotifyTable $MeetingLocationsNotify
 * @method \App\Model\Entity\MeetingLocationsNotify[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MeetingLocationsNotifyController extends AppController
{
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

        $this->set(compact('meetingLocationsNotify'));
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

        $this->set(compact('meetingLocationsNotify'));
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
        $meetingLocations = $this->MeetingLocationsNotify->MeetingLocations->find('list', ['limit' => 200])->all();
        $people = $this->MeetingLocationsNotify->People->find('list', ['limit' => 200])->all();
        $users = $this->MeetingLocationsNotify->MeetingLocationsNotifyCreators->find('list', ['limit' => 200])->all();
        $this->set(compact('meetingLocationsNotify', 'meetingLocations', 'people', 'users'));
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
