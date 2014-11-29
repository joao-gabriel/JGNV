<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');


/**
 * User Model
 *
 * @property Note $Note
 * @property Project $Project
 * @property Task $Task
 * @property Team $Team
 */
class User extends AppModel {

  /**
   * Validation rules
   *
   * @var array
   */
  public $validate = array(
      'username' => array(
          'notEmpty' => array(
              'rule' => array('notEmpty'),
              'message' => 'Username field must be filled',
              'allowEmpty' => false,
              'required' => false,
              'last' => false, // Stop validation after this rule
              'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'password' => array(
          'notEmpty' => array(
              'rule' => array('notEmpty'),
              'message' => 'Password field must be filled',
              'allowEmpty' => false,
              'required' => false,
              'last' => false, // Stop validation after this rule
              'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'role' => array(
          'notEmpty' => array(
              'rule' => array('notEmpty'),
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
      'email' => array(
          'email' => array(
              'rule' => array('email'),
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
   * hasMany associations
   *
   * @var array
   */
  public $hasMany = array(
      'Note' => array(
          'className' => 'Note',
          'foreignKey' => 'user_id',
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
      'Project' => array(
          'className' => 'Project',
          'foreignKey' => 'user_id',
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
      'Task' => array(
          'className' => 'Task',
          'foreignKey' => 'user_id',
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
   * hasAndBelongsToMany associations
   *
   * @var array
   */
  public $hasAndBelongsToMany = array(
      'Team' => array(
          'className' => 'Team',
          'joinTable' => 'teams_users',
          'foreignKey' => 'user_id',
          'associationForeignKey' => 'team_id',
          'unique' => 'keepExisting',
          'conditions' => '',
          'fields' => '',
          'order' => '',
          'limit' => '',
          'offset' => '',
          'finderQuery' => '',
      )
  );

  public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
      $passwordHasher = new BlowfishPasswordHasher();
      $this->data[$this->alias]['password'] = $passwordHasher->hash(
              $this->data[$this->alias]['password']
      );
    }
    return true;
  }

}
