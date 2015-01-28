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

    $this->Task->recursive = -1;
    $options = array(
        'conditions' => array('Task.' . $this->Task->primaryKey => $id),
        'contain' => array(
            'User',
            'Project',
            'Note.User',
            'Recipient'
        )
        
        );
    $task = $this->Task->find('first', $options);
    $task['userTimeElapsed'] = $this->Task->calcTaskTime($task['Task']['id'], AuthComponent::user('id'));
    $task['totalTimeElapsed'] = $this->Task->calcTaskTime($task['Task']['id']);
    
    $this->set('task', $task);
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

    // First, pause any ongoing task for this user
    $this->Task->pause($this->request->clientIp(false));

    $started = $this->Task->start($id, $this->request->clientIp(false));
    if ($started !== FALSE) {
      $task = $started['task'];
      $activity = $started['activity'];
      $newStatus = 'You\'re working on "<a href="' . Router::url(array('controller' => 'tasks', 'action' => 'view', $task['Task']['id'])) . '">' . $task['Task']['name'] . '</a>" since ' . CakeTime::nice($activity['Activity']['created']) . '.';
      $this->Session->write('Status', $newStatus);
      $this->Session->setFlash($newStatus, 'modal_default');
//      echo json_encode(array('Activity' => $activity, 'Task' => $task, 'status' => $this->Session->read('Status')));
      $this->redirect($this->referer());
    }
  }

  public function pause($id) {
    $paused = $this->Task->pause($this->request->clientIp(false), $id);
    
    if ($paused !== FALSE) {
      $task = $paused['task'];
      $activity = $paused['activity'];
      $newStatus = 'You\'ve paused "<a href="' . Router::url(array('controller' => 'tasks', 'action' => 'view', $task['Task']['id'])) . '">' . $task['Task']['name'] . '</a>" at ' . CakeTime::nice($activity['Activity']['created']) . '.';
      $this->Session->write('Status', $newStatus);
      $this->Session->setFlash($newStatus, 'modal_default');
//      echo json_encode(array('Activity' => $activity, 'Task' => $task, 'status' => $this->Session->read('Status')));
      $this->redirect($this->referer());
    }
  }

  public function isAuthorized($user) {

    // All registered users can view details of other users
    if (in_array($this->action, array('view', 'start', 'stop', 'pause'))) {
      return true;
    }

    return parent::isAuthorized($user);
  }

}
