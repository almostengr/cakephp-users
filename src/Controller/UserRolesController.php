<?php

declare(strict_types=1);

namespace CakephpUsers\Controller;

use Cake\Http\Exception\UnauthorizedException;
use CakephpUsers\Controller\AppController;
use CakephpUsers\Model\Enum\UserRole;

/**
 * UserRoles Controller
 *
 */
class UserRolesController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        if ($this->currentUserRole() !== UserRole::Administrator) {
            throw new UnauthorizedException("Unauthorized to modify roles.");
        }
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->UserRoles->find();
        $userRoles = $this->paginate($query);

        $this->set(compact('userRoles'));
    }

    /**
     * View method
     *
     * @param string|null $id User Role id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userRole = $this->UserRoles->get($id, contain: []);
        $this->set(compact('userRole'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userRole = $this->UserRoles->newEmptyEntity();
        if ($this->request->is('post')) {
            $userRole = $this->UserRoles->patchEntity($userRole, $this->request->getData());
            if ($this->UserRoles->save($userRole)) {
                $this->Flash->success(__('The user role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user role could not be saved. Please, try again.'));
        }
        $this->set(compact('userRole'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Role id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userRole = $this->UserRoles->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userRole = $this->UserRoles->patchEntity($userRole, $this->request->getData());
            if ($this->UserRoles->save($userRole)) {
                $this->Flash->success(__('The user role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user role could not be saved. Please, try again.'));
        }
        $this->set(compact('userRole'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $userRole = $this->UserRoles->get($id);
    //     if ($this->UserRoles->delete($userRole)) {
    //         $this->Flash->success(__('The user role has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The user role could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
