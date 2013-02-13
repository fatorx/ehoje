<?php
App::uses('Contato', 'Model');

/**
 * Contato Test Case
 *
 */
class ContatoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.contato'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Contato = ClassRegistry::init('Contato');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Contato);

		parent::tearDown();
	}
        
        
        public function testWithoutUserId(){
            $this->Contato->set(array(
			'usuario_id' => ''
		));
		$result = $this->Contato->validates(array('fieldList' => array('usuario_id')));

		$this->assertFalse($result);
        }
        
        public function testWithoutType(){
            $this->Contato->set(array(
			'motivo' => ''
		));
		$result = $this->Contato->validates(array('fieldList' => array('motivo')));

		$this->assertFalse($result);
        }

}
