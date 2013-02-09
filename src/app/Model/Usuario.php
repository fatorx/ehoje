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
				'rule' => array('customPassword'),
				'message' => 'As senhas digitadas não conferem',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'avatar' => array(
			//'notempty' => array(
				//'rule' => array('notempty'),
				//'message' => 'Selecione uma imagem de seu computador',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		),
	);
        
        
        public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['senha'])) {
			$senha = &$this->data[$this->alias]['senha'];
                        $senha = md5($senha);
		} 
                
		return parent::beforeSave($options);
	}
        
        
        public function beforeValidate($options = array()) {
            if ( isset($this->data[$this->alias]['email']) ) {
                $email = &$this->data[$this->alias]['email'];
                
                if (!empty($email)) {
                    $email = strtolower($email);
                } else {
                    unset($this->data[$this->alias]['email']);
                }
            }
            parent::beforeValidate($options);
        }
        
        
        public function customPassword($data) {
            if (isset($this->data[$this->alias]['senha'])) {
                return $this->data[$this->alias]['senha'] === current($data);
            }
            return true;
        }
}
