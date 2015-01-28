<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

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
    $this->User->recursive = 0;
    $this->set('users', $this->Paginator->paginate());
  }

  /**
   * view method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function view($id = null) {
    if (!$this->User->exists($id)) {
      throw new NotFoundException(__('Invalid user'));
    }
    $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
    $this->set('user', $this->User->find('first', $options));
  }

  /**
   * add method
   *
   * @return void
   */
  public function add() {
    if ($this->request->is('post')) {
      $this->User->create();
      if ($this->User->save($this->request->data)) {
        $this->Session->setFlash(__('The user has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The user could not be saved. Please, check the form and try again.'), 'flash_error');
      }
    }
    $teams = $this->User->Team->find('list');
    $this->set(compact('teams'));
  }

  /**
   * edit method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function edit($id = null) {

    if (is_null($id)) {
      $id = AuthComponent::user('id');
    }

    if (!$this->User->exists($id)) {
      throw new NotFoundException(__('Invalid user'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->User->save($this->request->data)) {
        $this->Session->setFlash(__('The user has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
      $this->request->data = $this->User->find('first', $options);
    }
    $teams = $this->User->Team->find('list');
    $this->set(compact('teams'));
  }

  /**
   * delete method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function delete($id = null) {
    $this->User->id = $id;
    if (!$this->User->exists()) {
      throw new NotFoundException(__('Invalid user'));
    }
    $this->request->allowMethod('post', 'delete');
    if ($this->User->delete()) {
      $this->Session->setFlash(__('The user has been deleted.'));
    } else {
      $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
  }

  public function login() {

    $this->layout = 'signin';

    if ($this->request->is('post')) {
      if ($this->Auth->login()) {

        // TODO: Check if theres an active login (no corresponding logout Activity) on database from this IP address
        // Create an Activity for this login
        $this->User->Activity->create();
        $data = array('Activity' => array(
                'user_id' => AuthComponent::user('id'),
                'type' => _ACTIVITY_TYPE_LOGIN, // Start of an Activity
                'model' => 'User',
                'model_id' => AuthComponent::user('id'),
                'from' => $this->request->clientIp(false)
        ));
        $this->User->Activity->save($data);

        return $this->redirect($this->Auth->redirect());
      } else {

        // Criar uma activity de falha de login no banco
        $options = array('conditions' => array(
                'User.username' => $this->request->data['User']['username']
        ));
        $this->User->recursive = -1;
        $user = $this->User->find('first', $options);

        if (count($user) > 0) {
          $userId = $user['User']['id'];
        } else {
          $userId = _UNKNOW_USER;
        }
        $this->User->Activity->create();
        $data = array('Activity' => array(
                'user_id' => $userId,
                'type' => _ACTIVITY_TYPE_LOGIN_FAIL, // Start of an Activity
                'model' => 'User',
                'model_id' => $userId,
                'from' => $this->request->clientIp(false)
        ));
        $this->User->Activity->save($data);

        $this->Session->setFlash(__('Invalid username or password, try again'));
      }
    }
  }

  public function logout() {

    $userId = AuthComponent::user('id');

    if ($this->Auth->logout()) {

      // Get the most recent _ACTIVITY_TYPE_LOGIN of this user on this IP
      $this->User->Activity->recursive = -1;
      $lastLoginActivity = $this->User->Activity->find('first', array('conditions' => array(
              'Activity.user_id' => $userId,
              'Activity.model' => 'User',
              'Activity.model_id' => $userId,
              'Activity.from' => $this->request->clientIp(false),
              'Activity.type' => _ACTIVITY_TYPE_LOGIN
          ),
          'order' => 'Activity.created DESC'));

      // Create a logout activity
      $this->User->Activity->create();
      $data = array('Activity' => array(
              'user_id' => $userId,
              'type' => _ACTIVITY_TYPE_LOGOUT, // Start of an Activity
              'model' => 'User',
              'model_id' => $userId,
              'parent_id' => $lastLoginActivity['Activity']['id'],
              'from' => $this->request->clientIp(false)
      ));
      $this->User->Activity->save($data);

      // Pause any taks assigned to this user
      $this->User->Task->pause($this->request->clientIp(false), null, $userId);

      return $this->redirect(array('controller' => 'users', 'action' => 'login'));
    }
  }

  public function dashboard($id = null) {

    if (is_null($id)) {
      $id = AuthComponent::user('id');
    }

    if (!$this->User->exists($id)) {
      throw new NotFoundException(__('Invalid user'));
    }

    $this->User->recursive = -1;
    $options = array(
        'conditions' => array('User.' . $this->User->primaryKey => $id),
        'contain' => array(
            'ActivityOwned' => array(
                'limit' => 10,
                'order' => 'ActivityOwned.created DESC',
                'conditions' => array('ActivityOwned.user_id' => $id),
                'fields' => array(
                    'IF (ActivityOwned.model = "Task", (SELECT name FROM tasks WHERE id = ActivityOwned.model_id), null) as TaskName',
                    'ActivityOwned.*'
                )
            ),
            'Taskto' => array(
                'conditions' => array(
                    array('Taskto.status != ' => _TASK_STATUS_CANCELLED),
                    array('Taskto.status != ' => _TASK_STATUS_DELETED),
                    array('Taskto.status != ' => _TASK_STATUS_DENIED)
                ),
                'limit' => 10,
                'order' => 'Taskto.expected_deadline ASC'
            ),
            'Taskto.Project.name',
        ),
        'fields' => array('id')
    );
    $user = $this->User->find('first', $options);
    $this->set('user', $user);
  }

  public function beforeFilter() {
    parent::beforeFilter();
    // Allow users to register and logout.
    $this->Auth->allow('add', 'logout');
  }

  public function isAuthorized($user) {

    // All registered users can view details of other users
    if (in_array($this->action, array('view', 'edit', 'dashboard'))) {
      return true;
    }

    return parent::isAuthorized($user);
  }

}
