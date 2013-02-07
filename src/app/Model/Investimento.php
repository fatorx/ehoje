<?php
App::uses('AppModel', 'Model');
/**
 * Investimento Model
 *
 * @property Categoria $Categoria
 */
class Investimento extends AppModel {

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
		'id_categoria_investimento' => array(
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
                if (isset($this->data[$this->alias]['valor'])) {
			$valor = &$this->data[$this->alias]['valor'];

			if (!empty($valor)) {
                            $valor = str_replace('.', '', $valor);
                            $valor = str_replace(',', '.', $valor);
			} else {
                            unset($this->data[$this->alias]['valor']);
			}
		}
                if (isset($this->data[$this->alias]['tipo'])) {
			$tipo = &$this->data[$this->alias]['tipo'];

			if (!empty($tipo)) {
                            $this->data[$this->alias]['id_categoria_investimento'] = $this->data[$this->alias]['tipo'];
			} else {
                            unset($this->data[$this->alias]['tipo']);
                            unset($this->data[$this->alias]['id_categoria_investimento']);
			}
		}
                
		return parent::beforeSave($options);
	}
}
