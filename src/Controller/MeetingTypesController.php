<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MeetingTypes Controller
 *
 * @property \App\Model\Table\MeetingTypesTable $MeetingTypes
 * @method \App\Model\Entity\MeetingType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MeetingTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $meetingTypes = $this->paginate($this->MeetingTypes);

        $this->set(compact('meetingTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Meeting Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $meetingType = $this->MeetingTypes->get($id, [
            'contain' => ['Meetings'],
        ]);

        $this->set(compact('meetingType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $meetingType = $this->MeetingTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $meetingType = $this->MeetingTypes->patchEntity($meetingType, $this->request->getData());
            if ($this->MeetingTypes->save($meetingType)) {
                $this->Flash->success(__('The meeting type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meeting type could not be saved. Please, try again.'));
        }
        $this->set(compact('meetingType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Meeting Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $meetingType = $this->MeetingTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $meetingType = $this->MeetingTypes->patchEntity($meetingType, $this->request->getData());
            if ($this->MeetingTypes->save($meetingType)) {
                $this->Flash->success(__('The meeting type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meeting type could not be saved. Please, try again.'));
        }
        $this->set(compact('meetingType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Meeting Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $meetingType = $this->MeetingTypes->get($id);
        if ($this->MeetingTypes->delete($meetingType)) {
            $this->Flash->success(__('The meeting type has been deleted.'));
        } else {
            $this->Flash->error(__('The meeting type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
