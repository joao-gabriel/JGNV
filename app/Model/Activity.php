<?php

App::uses('AppModel', 'Model');

/**
 * Activity Model
 *
 * @property Activity $ParentActivity
 * @property User $User
 * @property Task $Task
 * @property Activity $ChildActivity
 */
class Activity extends AppModel {

  public $actsAs = array('Containable');

  /**
   * Validation rules
   *
   * @var array
   */
  public $validate = array(
      'parent_id' => array(
          'numeric' => array(
              'rule' => array('numeric'),
          //'message' => 'Your custom message here',
          //'allowEmpty' => false,
          //'required' => false,
          //'last' => false, // Stop validation after this rule
          //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'user_id' => array(
          'numeric' => array(
              'rule' => array('numeric'),
          //'message' => 'Your custom message here',
          //'allowEmpty' => false,
          //'required' => false,
          //'last' => false, // Stop validation after this rule
          //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'type' => array(
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
      'ParentActivity' => array(
          'className' => 'Activity',
          'foreignKey' => 'parent_id',
          'conditions' => '',
          'fields' => '',
          'order' => ''
      ),
      'Author' => array(
          'className' => 'User',
          'foreignKey' => 'user_id',
          'fields' => '',
          'order' => ''
      ),
      'User' => array(
          'className' => 'User',
          'foreignKey' => 'model_id',
          'conditions' => array('Activity.model' => 'User'),
          'fields' => '',
          'order' => ''
      ),
      'Task' => array(
          'className' => 'Task',
          'foreignKey' => 'model_id',
          'conditions' => array('Activity.model' => 'Task'),
          'fields' => '',
          'order' => ''
      ),
      'Owner' => array(
          'className' => 'User',
          'foreignKey' => 'user_id'
      )
  );

  /**
   * hasMany associations
   *
   * @var array
   */
  public $hasMany = array(
      'ChildActivity' => array(
          'className' => 'Activity',
          'foreignKey' => 'parent_id',
          'dependent' => false,
          'conditions' => '',
          'fields' => '',
          'order' => '',
          'limit' => '',
          'offset' => '',
          'exclusive' => '',
          'finderQuery' => '',
          'counterQuery' => ''
      )
  );

  /**
   * calcActivityTime method
   *
   * @param int $model
   * @param int $modelId
   * @param int $startType
   * @param int $stopType
   * @param int $userId
   * @return string
   */
  public function calcActivityTime($model, $modelId, $startType, $stopType, $userId = NULL) {

    $options = array(
        'conditions' => array(
            'Activity.model' => $model,
            'Activity.model_id' => $modelId,
            'Activity.type' => $startType
        ),
        'joins' => array(
            array(
                'table' => 'activities',
                'alias' => 'StopActivity',
                'type' => 'INNER',
                'conditions' => array(
                    'StopActivity.parent_id = Activity.id',
                    'StopActivity.type' => $stopType
                )
            )
        ),
        'fields' => array(
            'sec_to_time(sum(time_to_sec(timediff(StopActivity.created, Activity.created)))) as timeElapsed'
        )
    );

    if (!is_null($userId)) {
      $options['conditions']['Activity.user_id'] = $userId;
      $options['joins'][0]['conditions']['StopActivity.user_id'] = $userId;
    }

    $this->recursive = -1;
    $total = $this->find('first', $options);

    if (is_null($total[0]['timeElapsed'])) {
      return '00:00:00';
    } else {
      return $total[0]['timeElapsed'];
    }
  }

}
