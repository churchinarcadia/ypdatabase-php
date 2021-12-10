<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MeetingPeople Controller
 *
 * @property \App\Model\Table\MeetingPeopleTable $MeetingPeople
 * @method \App\Model\Entity\MeetingPerson[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MeetingPeopleController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Meetings', 'People'],
        ];
        $meetingPeople = $this->paginate($this->MeetingPeople);

        $this->set(compact('meetingPeople'));
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
            'contain' => ['Meetings', 'People'],
        ]);

        $this->set(compact('meetingPerson'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $meetingPerson = $this->MeetingPeople->newEmptyEntity();
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
        if ($this->request->is(['patch', 'post', 'put'])) {
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
        if ($this->MeetingPeople->delete($meetingPerson)) {
            $this->Flash->success(__('The meeting person has been deleted.'));
        } else {
            $this->Flash->error(__('The meeting person could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
