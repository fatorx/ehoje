<?php
App::uses('ContatosController', 'Controller');

/**
 * ContatosController Test Case
 *
 */
class ContatosControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.contato',
		'app.usuario'
	);
        
        public function setUp() {
            parent::setUp();
            $this->Contato = ClassRegistry::init('Contato');
        }

        
	public function testAdd() {
            $initial = $this->Contato->find('count');
            
            $data = array('Contato' => array('usuario_id' => '1', 'motivo' => 'sugestao', 'descricao' => 'teste de cadsatro de conteúdo'));
            $this->testAction('/contatos/novo', array('method' => 'post', 'data' => $data));
            
            $final = $this->Contato->find('count');
            
            $this->assertEqual($final, $initial+1, 'O email não pôde ser enviado');
	}
        
}
