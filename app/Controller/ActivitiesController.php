<?php

App::uses('AppController', 'Controller');

/**
 * Activities Controller
 *
 * @property Activity $Activity
 * @property PaginatorComponent $Paginator
 */
class ActivitiesController extends AppController {

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
    $this->Activity->recursive = 0;

    if (AuthComponent::user('role') !== 'admin') {
      $conditions = array(
          'Activity.user_id' => AuthComponent::user('id')
      );
    } else {
      $conditions = array();
    }

    $this->set('activities', $this->Paginator->paginate('Activity', $conditions));
  }

  /**
   * view method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function view($id = null) {
    if (!$this->Activity->exists($id)) {
      throw new NotFoundException(__('Invalid activity'));
    }
    $options = array('conditions' => array('Activity.' . $this->Activity->primaryKey => $id));
    $this->set('activity', $this->Activity->find('first', $options));
  }

  /**
   * add method
   *
   * @return void
   */
  public function add() {
    if ($this->request->is('post')) {
      $this->Activity->create();
      if ($this->Activity->save($this->request->data)) {
        $this->Session->setFlash(__('The activity has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The activity could not be saved. Please, try again.'));
      }
    }
    $parentActivities = $this->Activity->ParentActivity->find('list');
    $users = $this->Activity->User->find('list');
    $tasks = $this->Activity->Task->find('list');
    $this->set(compact('parentActivities', 'users', 'tasks'));
  }

  /**
   * edit method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function edit($id = null) {
    if (!$this->Activity->exists($id)) {
      throw new NotFoundException(__('Invalid activity'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Activity->save($this->request->data)) {
        $this->Session->setFlash(__('The activity has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The activity could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('Activity.' . $this->Activity->primaryKey => $id));
      $this->request->data = $this->Activity->find('first', $options);
    }
    $parentActivities = $this->Activity->ParentActivity->find('list');
    $users = $this->Activity->User->find('list');
    $tasks = $this->Activity->Task->find('list');
    $this->set(compact('parentActivities', 'users', 'tasks'));
  }

  /**
   * delete method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function delete($id = null) {
    $this->Activity->id = $id;
    if (!$this->Activity->exists()) {
      throw new NotFoundException(__('Invalid activity'));
    }
    $this->request->allowMethod('post', 'delete');
    if ($this->Activity->delete()) {
      $this->Session->setFlash(__('The activity has been deleted.'));
    } else {
      $this->Session->setFlash(__('The activity could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
  }

  public function beforeFilter() {
    parent::beforeFilter();
  }

  public function isAuthorized($user) {

    if (in_array($this->action, array('view', 'edit', 'index'))) {
      return true;
    }

    return parent::isAuthorized($user);
  }

}
