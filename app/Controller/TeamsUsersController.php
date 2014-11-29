<?php
App::uses('AppController', 'Controller');
/**
 * TeamsUsers Controller
 *
 * @property TeamsUser $TeamsUser
 * @property PaginatorComponent $Paginator
 */
class TeamsUsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TeamsUser->recursive = 0;
		$this->set('teamsUsers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TeamsUser->exists($id)) {
			throw new NotFoundException(__('Invalid teams user'));
		}
		$options = array('conditions' => array('TeamsUser.' . $this->TeamsUser->primaryKey => $id));
		$this->set('teamsUser', $this->TeamsUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TeamsUser->create();
			if ($this->TeamsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The teams user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teams user could not be saved. Please, try again.'));
			}
		}
		$teams = $this->TeamsUser->Team->find('list');
		$users = $this->TeamsUser->User->find('list');
		$this->set(compact('teams', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TeamsUser->exists($id)) {
			throw new NotFoundException(__('Invalid teams user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TeamsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The teams user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teams user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TeamsUser.' . $this->TeamsUser->primaryKey => $id));
			$this->request->data = $this->TeamsUser->find('first', $options);
		}
		$teams = $this->TeamsUser->Team->find('list');
		$users = $this->TeamsUser->User->find('list');
		$this->set(compact('teams', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TeamsUser->id = $id;
		if (!$this->TeamsUser->exists()) {
			throw new NotFoundException(__('Invalid teams user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TeamsUser->delete()) {
			$this->Session->setFlash(__('The teams user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The teams user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
