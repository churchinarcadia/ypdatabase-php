<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MeetingLocations Controller
 *
 * @property \App\Model\Table\MeetingLocationsTable $MeetingLocations
 * @method \App\Model\Entity\MeetingLocation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MeetingLocationsController extends AppController
{
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

        $this->set(compact('meetingLocations'));
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

        $this->set(compact('meetingLocation'));
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
        $addresses = $this->MeetingLocations->Addresses->find('list', ['limit' => 200])->all();
        $users = $this->MeetingLocations->MeetingLocationCreators->find('list', ['limit' => 200])->all();

        $this->set(compact('meetingLocation', 'addresses', 'users'));
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
