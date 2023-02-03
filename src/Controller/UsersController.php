<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * User account statuses
     * 
     * @var array
     */
    private $statuses = [
        'Pending',
        'Approved',
        'Denied',
    ];
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        //TODO add filter for active and approved accounts
        
        $users_query = $this->Users->find(
            'all',
            [
                'contain' => [
                    'People',
                    'UserTypes',
                    'UserCreators',
                    'UserModifiers'
                ]
            ]
        );

        $this->Authorization->authorize($users_query);
        
        $users = $this->paginate($users_query);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [
                'People',
                'UserTypes',
                'UserCreators',
                'UserModifiers'
            ],
        ]);

        $this->Authorization->authorize($user);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //TODO allow authenticated
        //TODO when user account created, add user but set to pending and email administrators and email registrant
        //TODO create approve method and include specific approve link in pending account email. Email registrant of approval
        //TODO create reject method and ask for reason and include specific denial link in pending account email. Email registrant of denial with reason.
        //TODO automatically approve accounts created by adminstrators
        //TODO set up password generation button/field. (probably needs to be radio for now and make password field not required).
        //TODO set up new_password and new_password_confirm fields to do the confirmation and validation on, then hash password to password field.
        //TODO Account creation confirmation email to registrant with account details. Include password if random password generated or account created by adminstrator.
        
        $user = $this->Users->newEmptyEntity();

        $this->Authorization->authorize($user);

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $people = $this->Users->People->find('list', ['limit' => 200])->all();
        $userTypes = $this->Users->UserTypes->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'people', 'userTypes','statuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->Authorization->authorize($user);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $people = $this->Users->People->find('list', ['limit' => 200])->all();
        $userTypes = $this->Users->UserTypes->find('list', ['limit' => 200])->all();
        $users = $this->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'people', 'userTypes', 'users','statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);

        $this->Authorization->authorize($user);

        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Login method
     *
     * @return renders view.
     */
    public function login()
    {
        $this->Authorization->skipAuthorization();

        //TODO check for pending, denied, or inactive user accounts and reject login

        $result = $this->Authentication->getResult();
        // If the user is logged in log them out so they can log in again
        if ($result->isValid()) {
            return $this->redirect(['controller' => 'profiles', 'action' => 'logout']);
        }
    }

    /**
     * Logout method
     * 
     * @return void
     */
    public function logout()
    {
        $this->Authorization->skipAuthorization();

        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Profiles', 'action' => 'login']);
    }
}
