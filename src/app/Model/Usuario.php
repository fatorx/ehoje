<?php
App::uses('AppModel', 'Model');
/**
 * Usuario Model
 *
 */
class Usuario extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nome' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Por favor informe seu nome',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Por favor informe seu email',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'email' => array(
				'rule' => array('email'),
				'message' => 'Email inválido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'senha' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Por favor informe a senha desejada',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'verifica_senha' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Por favor repita a senha',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'avatar' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Selecione uma imagem de seu computador',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
        
        public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['senha'])) {
			$senha = &$this->data[$this->alias]['senha'];
                        $senha = md5($senha);
		} 
                /*
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
                            $this->data[$this->alias]['id_categoria_receita'] = $this->data[$this->alias]['tipo'];
			} else {
                            unset($this->data[$this->alias]['tipo']);
                            unset($this->data[$this->alias]['id_categoria_receita']);
			}
		}
                */
		return parent::beforeSave($options);
	}
}
