<?php
App::uses('AppModel', 'Model');
/**
 * Receita Model
 *
 */
class Receita extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'data' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'valor' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tipo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
        
        public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['data'])) {
			$data = &$this->data[$this->alias]['data'];

			if (!empty($data)) {
				$data = date('Y-m-d', strtotime($data));
			} else {
				unset($this->data[$this->alias]['data']);
			}
		}

		return parent::beforeSave($options);
	}
}
