<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        // All users are allowed to manipulate products
        $this->Authorization->skipAuthorization();
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $products = $this->paginate($this->Products, [
            'contain' => ['Tags'],
        ]);

        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Tags'],
        ]);

        $this->set(compact('product'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEmptyEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('Produto adicionado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível salvar o produto. Cheque as informações e tente novamente.'));
        }
        $tags = $this->Products->Tags->find('list', ['limit' => 200])->all();
        $this->set(compact('product', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Tags'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product->setDirty('tags', true);
            $product = $this->Products->patchEntity($product, $this->request->getData(), [
                'associated' => ['Tags']
            ]);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('Produto alterado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível alterar o produto. Cheque as informações e tente novamente.'));
        }
        $tags = $this->Products->Tags->find('list', ['limit' => 200])->all();
        $this->set(compact('product', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('Produto excluído.'));
        } else {
            $this->Flash->error(__('Não foi possível excluir o produto. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
