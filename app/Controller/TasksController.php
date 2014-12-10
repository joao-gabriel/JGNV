<?php

App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');

/**
 * Tasks Controller
 *
 * @property Task $Task
 * @property PaginatorComponent $Paginator
 */
class TasksController extends AppController {

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
    $this->Task->recursive = 0;
    $this->set('tasks', $this->Paginator->paginate());
  }

  /**
   * view method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function view($id = null) {
    if (!$this->Task->exists($id)) {
      throw new NotFoundException(__('Invalid task'));
    }
    
    $this->Task->recursive = 1;
    $options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
    $this->set('task', $this->Task->find('first', $options));
  }

  /**
   * add method
   *
   * @return void
   */
  public function add() {
    if ($this->request->is('post')) {
      $this->Task->create();
      if ($this->Task->save($this->request->data)) {
        $this->Session->setFlash(__('The task has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The task could not be saved. Please, try again.'));
      }
    }
    $users = $this->Task->User->find('list');
    $projects = $this->Task->Project->find('list');
    $recipients = $this->Task->User->find('list');
    $this->set(compact('users', 'projects', 'recipients'));
  }

  /**
   * edit method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function edit($id = null) {
    if (!$this->Task->exists($id)) {
      throw new NotFoundException(__('Invalid task'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Task->save($this->request->data)) {
        $this->Session->setFlash(__('The task has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The task could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
      $this->request->data = $this->Task->find('first', $options);
    }
    $users = $this->Task->User->find('list');
    $projects = $this->Task->Project->find('list');
    $recipients = $this->Task->User->find('list');
    $this->set(compact('users', 'projects', 'recipients'));
  }

  /**
   * delete method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function delete($id = null) {
    $this->Task->id = $id;
    if (!$this->Task->exists()) {
      throw new NotFoundException(__('Invalid task'));
    }
    $this->request->allowMethod('post', 'delete');
    if ($this->Task->delete()) {
      $this->Session->setFlash(__('The task has been deleted.'));
    } else {
      $this->Session->setFlash(__('The task could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
  }

  public function start($id) {
    $this->autoRender = false;

    $this->Task->Activity->create();
    $data = array('Activity' => array(
            'user_id' => AuthComponent::user('id'),
            'type' => _ACTIVITY_TYPE_START_TASK, // Start of an Activity
            'model' => 'Task',
            'model_id' => $id,
            'from' => $this->request->clientIp(false)
    ));

    $activity = $this->Task->Activity->save($data);

    $this->Task->recursive = -1;
    $task = $this->Task->find('first', array('conditions' => array('Task.id' => $id)));

    $newStatus = 'You\'re working on "<a href="' . Router::url(array('controller' => 'tasks', 'action' => 'view', $task['Task']['id'])) . '">' . $task['Task']['name'] . '</a>" since ' . CakeTime::nice($activity['Activity']['created']).'.';

    $this->Session->write('Status', $newStatus);

    // TODO: When start a task, also create a register of "STOP" for all the active tasks of this user

    echo json_encode(array('Activity' => $activity, 'Task' => $task, 'status' => $this->Session->read('Status')));
  }

  public function isAuthorized($user) {

    // All registered users can view details of other users
    if (in_array($this->action, array('view', 'start', 'stop'))) {
      return true;
    }

    return parent::isAuthorized($user);
  }

}
