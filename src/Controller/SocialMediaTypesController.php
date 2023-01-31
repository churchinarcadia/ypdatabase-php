<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SocialMediaTypes Controller
 *
 * @property \App\Model\Table\SocialMediaTypesTable $SocialMediaTypes
 * @method \App\Model\Entity\SocialMediaType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SocialMediaTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $socialMediaTypes = $this->paginate($this->SocialMediaTypes);

        $this->set(compact('socialMediaTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Social Media Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $socialMediaType = $this->SocialMediaTypes->get($id, [
            'contain' => ['SocialMedias'],
        ]);

        $this->set(compact('socialMediaType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $socialMediaType = $this->SocialMediaTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $socialMediaType = $this->SocialMediaTypes->patchEntity($socialMediaType, $this->request->getData());
            if ($this->SocialMediaTypes->save($socialMediaType)) {
                $this->Flash->success(__('The social media type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The social media type could not be saved. Please, try again.'));
        }
        $this->set(compact('socialMediaType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Social Media Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $socialMediaType = $this->SocialMediaTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $socialMediaType = $this->SocialMediaTypes->patchEntity($socialMediaType, $this->request->getData());
            if ($this->SocialMediaTypes->save($socialMediaType)) {
                $this->Flash->success(__('The social media type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The social media type could not be saved. Please, try again.'));
        }
        $this->set(compact('socialMediaType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Social Media Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $socialMediaType = $this->SocialMediaTypes->get($id);
        if ($this->SocialMediaTypes->delete($socialMediaType)) {
            $this->Flash->success(__('The social media type has been deleted.'));
        } else {
            $this->Flash->error(__('The social media type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
