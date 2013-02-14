<?php
App::uses('AppModel', 'Model');
/**
 * DespesasFixa Model
 *
 */
class DespesasFixa extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'data' => array(
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
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'id_categoria_despesa_fixa' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'id_usuario' => array(
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
        
        public function beforeValidate($options = array()) {
		if (isset($this->data[$this->alias]['data'])) {
			$data = &$this->data[$this->alias]['data'];

			if (!empty($data)) {
                                $data = str_replace('/', '-', $data);
				$data = date('Y-m-d', strtotime($data));
			} else {
				unset($this->data[$this->alias]['data']);
			}
		}
                if (isset($this->data[$this->alias]['valor'])) {
			$valor = &$this->data[$this->alias]['valor'];

			if (!empty($valor)) {
                                $valor = str_replace('.', '', $valor);
                                $valor = str_replace(',', '.', $valor);
				$valor = number_format($valor,2,'.',''); 				
			} else {
				unset($this->data[$this->alias]['valor']);
			}
		}
                
		return parent::beforeValidate($options);
	}
}
