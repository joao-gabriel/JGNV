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

}
