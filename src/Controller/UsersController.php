<?php

declare(strict_types=1);

namespace CakephpUsers\Controller;

use Cake\Http\Exception\UnauthorizedException;
use CakephpUsers\Controller\AppController;
use CakephpUsers\Model\Enum\UserRole;

/**
 * Users Controller
 *
 * @property \CakephpUsers\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login', 'add', 'passwordLink', 'resetPassword']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        if ($this->currentUserRole() !== UserRole::Administrator) {
            throw new UnauthorizedException("Unauthorized to view the page.");
        }

        $query = $this->Users->find()
            ->contain(['UserRoles']);
        $users = $this->paginate($query);

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
        if ($this->currentUserId() !== $id && $this->currentUserRole() !== UserRole::Administrator) {
            throw new UnauthorizedException("Unauthorized to view the page.");
        }

        $user = $this->Users->get($id, contain: ['UserRoles']);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->currentUserId() === false) {
            throw new UnauthorizedException("You are already logged in.");
        }

        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $userRoles = $this->Users->UserRoles->find('list', limit: 200)->all();
        $this->set(compact('user', 'userRoles'));
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
        if ($this->currentUserId() !== $id && $this->currentUserRole() !== UserRole::Administrator) {
            throw new UnauthorizedException("Unauthorized to view the page.");
        }

        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $userRoles = $this->Users->UserRoles->find('list', limit: 200)->all();
        $this->set(compact('user', 'userRoles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->currentUserId() !== $id && $this->currentUserRole() !== UserRole::Administrator) {
            throw new UnauthorizedException("Unauthorized to view the page.");
        }

        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
