<?php
App::uses('AppController', 'Controller');
/**
 * ProjectsTasks Controller
 *
 * @property ProjectsTask $ProjectsTask
 * @property PaginatorComponent $Paginator
 */
class ProjectsTasksController extends AppController {

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
		$this->ProjectsTask->recursive = 0;
		$this->set('projectsTasks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProjectsTask->exists($id)) {
			throw new NotFoundException(__('Invalid projects task'));
		}
		$options = array('conditions' => array('ProjectsTask.' . $this->ProjectsTask->primaryKey => $id));
		$this->set('projectsTask', $this->ProjectsTask->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjectsTask->create();
			if ($this->ProjectsTask->save($this->request->data)) {
				$this->Session->setFlash(__('The projects task has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projects task could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ProjectsTask->Project->find('list');
		$tasks = $this->ProjectsTask->Task->find('list');
		$this->set(compact('projects', 'tasks'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProjectsTask->exists($id)) {
			throw new NotFoundException(__('Invalid projects task'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectsTask->save($this->request->data)) {
				$this->Session->setFlash(__('The projects task has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projects task could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectsTask.' . $this->ProjectsTask->primaryKey => $id));
			$this->request->data = $this->ProjectsTask->find('first', $options);
		}
		$projects = $this->ProjectsTask->Project->find('list');
		$tasks = $this->ProjectsTask->Task->find('list');
		$this->set(compact('projects', 'tasks'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProjectsTask->id = $id;
		if (!$this->ProjectsTask->exists()) {
			throw new NotFoundException(__('Invalid projects task'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProjectsTask->delete()) {
			$this->Session->setFlash(__('The projects task has been deleted.'));
		} else {
			$this->Session->setFlash(__('The projects task could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
