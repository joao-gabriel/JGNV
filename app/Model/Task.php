<?php

App::uses('AppModel', 'Model');

/**
 * Task Model
 *
 * @property User $User
 * @property Project $Project
 * @property Recipient $Recipient
 * @property Note $Note
 * @property Project $Project
 */
class Task extends AppModel {

  public $actsAs = array('Containable');

  /**
   * Validation rules
   *
   * @var array
   */
  public $validate = array(
      'project_id' => array(
          'numeric' => array(
              'rule' => array('numeric'),
          //'message' => 'Your custom message here',
          //'allowEmpty' => false,
          //'required' => false,
          //'last' => false, // Stop validation after this rule
          //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'name' => array(
          'notEmpty' => array(
              'rule' => array('notEmpty'),
          //'message' => 'Your custom message here',
          //'allowEmpty' => false,
          //'required' => false,
          //'last' => false, // Stop validation after this rule
          //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'expected_start_date' => array(
          'datetime' => array(
              'rule' => array('datetime'),
          //'message' => 'Your custom message here',
          //'allowEmpty' => false,
          //'required' => false,
          //'last' => false, // Stop validation after this rule
          //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'expected_deadline' => array(
          'datetime' => array(
              'rule' => array('datetime'),
          //'message' => 'Your custom message here',
          //'allowEmpty' => false,
          //'required' => false,
          //'last' => false, // Stop validation after this rule
          //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'start_date' => array(
          'datetime' => array(
              'rule' => array('datetime'),
          //'message' => 'Your custom message here',
          //'allowEmpty' => false,
          //'required' => false,
          //'last' => false, // Stop validation after this rule
          //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'finish_date' => array(
          'datetime' => array(
              'rule' => array('datetime'),
          //'message' => 'Your custom message here',
          //'allowEmpty' => false,
          //'required' => false,
          //'last' => false, // Stop validation after this rule
          //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'status' => array(
          'numeric' => array(
              'rule' => array('numeric'),
          //'message' => 'Your custom message here',
          //'allowEmpty' => false,
          //'required' => false,
          //'last' => false, // Stop validation after this rule
          //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
  );

  //The Associations below have been created with all possible keys, those that are not needed can be removed

  /**
   * belongsTo associations
   *
   * @var array
   */
  public $belongsTo = array(
      'User' => array(
          'className' => 'User',
          'foreignKey' => 'user_id',
          'conditions' => '',
          'fields' => '',
          'order' => ''
      ),
      'Project' => array(
          'className' => 'Project',
          'foreignKey' => 'project_id',
          'conditions' => '',
          'fields' => '',
          'order' => ''
      ),
      'Recipient' => array(
          'className' => 'User',
          'foreignKey' => 'recipient_id',
          'conditions' => '',
          'fields' => '',
          'order' => ''
      )
  );

  /**
   * hasMany associations
   *
   * @var array
   */
  public $hasMany = array(
      'Note' => array(
          'className' => 'Note',
          'foreignKey' => 'task_id',
          'dependent' => false,
          'conditions' => '',
          'fields' => '',
          'order' => '',
          'limit' => '',
          'offset' => '',
          'exclusive' => '',
          'finderQuery' => '',
          'counterQuery' => ''
      ),
      'Activity' => array(
          'className' => 'Activity',
          'foreignKey' => 'model_id',
          'conditions' => array('Activity.model' => 'Task'),
          'limit' => '40'
      )
  );

  public function start($id, $ip = null) {
    $this->Activity->create();
    $data = array('Activity' => array(
            'user_id' => AuthComponent::user('id'),
            'type' => _ACTIVITY_TYPE_START_TASK, // Start of an Activity
            'model' => 'Task',
            'model_id' => $id,
            'from' => $ip
    ));

    $activity = $this->Activity->save($data);

    if (!$activity) {
      return false;
    }

    $this->recursive = -1;
    $task = $this->find('first', array('conditions' => array('Task.id' => $id)));

    $this->id = $task['Task']['id'];
    if (!$this->saveField('status', _TASK_STATUS_RUNNING)) {
      return false;
    }

    return array('task' => $task, 'activity' => $activity);
  }

  
    /**
   * pause method
   * 
   * If no $id is supplied, the method will try to pause the first running task found
   * If no $recipientId is supplied, the method will try to pause tasks assigned to the loggedin user
   * 
   * @param string ip
   * @param int $id
   * @param int $recipientId
   * @return string
   */
  
  public function pause($ip = null, $id = null, $recipientId = null) {

    if (is_null($recipientId)) {
      $logged = AuthComponent::user('id');
      if (empty($logged)){
        die('No User ID to pause task');
      }
      $recipientId = AuthComponent::user('id');
    }

    $options = array(
        'conditions' => array(
            'Task.recipient_id' => $recipientId
        ),
        'contain' => array(
            'Activity' => array(
                'order' => 'created DESC',
                'limit' => 1
            )
        )
    );

    if (is_null($id)) {
      $options['conditions']['Task.status'] = _TASK_STATUS_RUNNING;
    } else {
      $options['conditions']['Task.id'] = $id;
    }

    $this->recursive = -1;
    $task = $this->find('first', $options);

    if (!empty($task)) {

      // Update task status
      $this->id = $task['Task']['id'];
      if (!$this->saveField('status', _TASK_STATUS_PAUSED)) {
        return false;
      }

      // and create a register of "_ACTIVITY_TASK_STOP" for it      
      $this->Activity->create();
      $tasktoActivityData = array(
          'Activity' => array(
              'user_id' => $recipientId,
              'type' => _ACTIVITY_TYPE_STOP_TASK,
              'model' => 'Task',
              'model_id' => $task['Task']['id'],
              'parent_id' => $task['Activity'][0]['id'],
              'from' => $ip
      ));

      $activity = $this->Activity->save($tasktoActivityData);

      return array('task' => $task, 'activity' => $activity);
    }
  }

  /**
   * calcTaskTime method
   * @param int $taskId
   * @param int $userId
   * @return string
   */
  public function calcTaskTime($taskId, $userId = NULL) {
    return $this->Activity->calcActivityTime($this->alias, $taskId, _ACTIVITY_TYPE_START_TASK, _ACTIVITY_TYPE_STOP_TASK, $userId);
  }

}

