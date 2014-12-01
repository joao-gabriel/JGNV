<?php

App::uses('AppController', 'Controller');

/**
 * Notes Controller
 *
 * @property Note $Note
 * @property PaginatorComponent $Paginator
 */
class NotesController extends AppController {

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
    $this->Note->recursive = 0;
    $this->set('notes', $this->Paginator->paginate());
  }

  /**
   * view method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function view($id = null) {
    if (!$this->Note->exists($id)) {
      throw new NotFoundException(__('Invalid note'));
    }
    $options = array('conditions' => array('Note.' . $this->Note->primaryKey => $id));
    $this->set('note', $this->Note->find('first', $options));
  }

  /**
   * add method
   *
   * @return void
   */
  public function add($taskId = null) {
    if (is_null($taskId)){
      die('No task selected');
    }
    
    if ($this->request->is('post')) {
      $this->Note->create();
      if ($this->Note->save($this->request->data)) {
        $this->Session->setFlash(__('The note has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The note could not be saved. Please, try again.'));
      }
    }
    $this->Note->Task->recursive = 0;
    $task = $this->Note->Task->find('first', array('conditions' => array('Task.id' => $taskId)));
    $this->set(compact('users', 'task'));
  }

  /**
   * edit method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function edit($id = null) {
    if (!$this->Note->exists($id)) {
      throw new NotFoundException(__('Invalid note'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Note->save($this->request->data)) {
        $this->Session->setFlash(__('The note has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The note could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('Note.' . $this->Note->primaryKey => $id));
      $this->request->data = $this->Note->find('first', $options);
    }
    $users = $this->Note->User->find('list');
    $tasks = $this->Note->Task->find('list');
    $this->set(compact('users', 'tasks'));
  }

  /**
   * delete method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function delete($id = null) {
    $this->Note->id = $id;
    if (!$this->Note->exists()) {
      throw new NotFoundException(__('Invalid note'));
    }
    $this->request->allowMethod('post', 'delete');
    if ($this->Note->delete()) {
      $this->Session->setFlash(__('The note has been deleted.'));
    } else {
      $this->Session->setFlash(__('The note could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
  }

  public function isAuthorized($user) {

    if (in_array($this->action, array('add', 'view'))) {
      return true;
    }

    return parent::isAuthorized($user);
  }

}
