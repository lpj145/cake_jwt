<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Containers Controller
 *
 * @property \App\Model\Table\ContainersTable $Containers
 *
 * @method \App\Model\Entity\Container[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContainersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Companies']
        ];
        $containers = $this->paginate($this->Containers);

        $this->set(compact('containers'));
    }

    /**
     * View method
     *
     * @param string|null $id Container id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $container = $this->Containers->get($id, [
            'contain' => ['Companies', 'Containers']
        ]);

        $this->set('container', $container);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $container = $this->Containers->newEntity();
        if ($this->request->is('post')) {
            $container = $this->Containers->patchEntity($container, $this->request->getData());
            if ($this->Containers->save($container)) {
                $this->Flash->success(__('The container has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The container could not be saved. Please, try again.'));
        }
        $companies = $this->Containers->Companies->find('list', ['limit' => 200]);
        $this->set(compact('container', 'companies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Container id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $container = $this->Containers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $container = $this->Containers->patchEntity($container, $this->request->getData());
            if ($this->Containers->save($container)) {
                $this->Flash->success(__('The container has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The container could not be saved. Please, try again.'));
        }
        $companies = $this->Containers->Companies->find('list', ['limit' => 200]);
        $this->set(compact('container', 'companies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Container id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $container = $this->Containers->get($id);
        if ($this->Containers->delete($container)) {
            $this->Flash->success(__('The container has been deleted.'));
        } else {
            $this->Flash->error(__('The container could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
