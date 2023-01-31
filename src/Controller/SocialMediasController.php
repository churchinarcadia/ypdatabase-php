<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SocialMedias Controller
 *
 * @property \App\Model\Table\SocialMediasTable $SocialMedias
 * @method \App\Model\Entity\SocialMedia[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SocialMediasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['People', 'SocialMediaTypes'],
        ];
        $socialMedias = $this->paginate($this->SocialMedias);

        $this->set(compact('socialMedias'));
    }

    /**
     * View method
     *
     * @param string|null $id Social Media id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $socialMedia = $this->SocialMedias->get($id, [
            'contain' => ['People', 'SocialMediaTypes'],
        ]);

        $this->set(compact('socialMedia'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $socialMedia = $this->SocialMedias->newEmptyEntity();
        if ($this->request->is('post')) {
            $socialMedia = $this->SocialMedias->patchEntity($socialMedia, $this->request->getData());
            if ($this->SocialMedias->save($socialMedia)) {
                $this->Flash->success(__('The social media has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The social media could not be saved. Please, try again.'));
        }
        $people = $this->SocialMedias->People->find('list', ['limit' => 200])->all();
        $socialMediaTypes = $this->SocialMedias->SocialMediaTypes->find('list', ['limit' => 200])->all();
        $this->set(compact('socialMedia', 'people', 'socialMediaTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Social Media id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $socialMedia = $this->SocialMedias->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $socialMedia = $this->SocialMedias->patchEntity($socialMedia, $this->request->getData());
            if ($this->SocialMedias->save($socialMedia)) {
                $this->Flash->success(__('The social media has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The social media could not be saved. Please, try again.'));
        }
        $people = $this->SocialMedias->People->find('list', ['limit' => 200])->all();
        $socialMediaTypes = $this->SocialMedias->SocialMediaTypes->find('list', ['limit' => 200])->all();
        $this->set(compact('socialMedia', 'people', 'socialMediaTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Social Media id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $socialMedia = $this->SocialMedias->get($id);
        if ($this->SocialMedias->delete($socialMedia)) {
            $this->Flash->success(__('The social media has been deleted.'));
        } else {
            $this->Flash->error(__('The social media could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
