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

  public function pause($ip = null, $id = null) {

    $conditions = array(
        'Task.recipient_id' => AuthComponent::user('id'),
        'Task.status' => _TASK_STATUS_RUNNING);

    if (is_numeric($id)){
      $conditions['Task.id'] = $id;
    }
    
    $runningTask = $this->find('first', array(
        'conditions' => $conditions
    ));

    if (count($runningTask) > 0) {
      $this->Activity->create();
      $data = array('Activity' => array(
              'user_id' => AuthComponent::user('id'),
              'type' => _ACTIVITY_TYPE_STOP_TASK,
              'model' => 'Task',
              'model_id' => $runningTask['Task']['id'],
              'from' => $ip
      ));

      $activity = $this->Activity->save($data);

      if (!$activity) {
        return false;
      }
      $this->id = $runningTask['Task']['id'];
      if (!$this->saveField('status', _TASK_STATUS_PAUSED)) {
        return false;
      }
      return array('task' => $runningTask, 'activity' => $activity);
    }
    return true;
  }

   /**
   * calcTaskTime method
   * @params $taskId
   * @return int
   */
  public function calcTaskTime($taskId){
    return $this->Activity->calcActivityTime($this->alias, $taskId, _ACTIVITY_TYPE_START_TASK, _ACTIVITY_TYPE_STOP_TASK);
  }
  
  
}
