<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * People Controller
 *
 * @property \App\Model\Table\PeopleTable $People
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PeopleController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        //TODO add parameter and filter by district or active/inactive
        /**
         * TODO add calculation for:
         * 1) if person has user
         * 
         */

        $people_query = $this->People->find(
            'all',
            [
                'contain' => [
                    'Addresses' => [
                        'MeetingLocations'
                    ],
                    'SocialMedias' => [
                        'SocialMediaTypes'
                    ],
                    'Fathers' => [
                        'SocialMedias' => [
                            'SocialMediaTypes'
                        ]
                    ],
                    'Mothers' => [
                        'SocialMedias' => [
                            'SocialMediaTypes'
                        ]
                    ],
                    'PeopleCreators',
                    'PeopleModifiers',
                    'Users' => [
                        'UserTypes'
                    ]
                ]
            ]
        );

        $this->Authorization->authorize($people_query);
        
        $people = $this->paginate($people_query);

        $this->set(compact('people'));
    }

    /**
     * View method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $person = $this->People->get($id, [
            'contain' => [
                'MeetingPeople',
                'Users',
                'Addresses' => [
                    'MeetingLocations'
                ],
                'SocialMedias',
                'Fathers',
                'Mothers',
                'PeopleCreators',
                'PeopleModifiers',
                'MeetingLocationNotify',
            ],
        ]);

        $this->Authorization->authorize($person);

        $this->set(compact('person'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $person = $this->People->newEmptyEntity();

        $this->Authorization->authorize($person);

        if ($this->request->is('post')) {
            $person = $this->People->patchEntity($person, $this->request->getData());
            if ($this->People->save($person)) {
                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person could not be saved. Please, try again.'));
        }
        $addresses = $this->People->Addresses->find('list', ['limit' => 200])->all();
        $people = $this->People->find('list', ['limit' => 200])->all();
        $this->set(compact('person', 'addresses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $person = $this->People->get($id, [
            'contain' => [],
        ]);

        $this->Authorization->authorize($person);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $person = $this->People->patchEntity($person, $this->request->getData());
            if ($this->People->save($person)) {
                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person could not be saved. Please, try again.'));
        }
        $addresses = $this->People->Addresses->find('list', ['limit' => 200])->all();
        $people = $this->People->find('list', ['limit' => 200])->all();
        $users = $this->People->PeopleCreators->find('list', ['limit' => 200])->all();
        $this->set(compact('person', 'addresses', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $person = $this->People->get($id);
        
        $this->Authorization->authorize($person);

        if ($this->People->delete($person)) {
            $this->Flash->success(__('The person has been deleted.'));
        } else {
            $this->Flash->error(__('The person could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
