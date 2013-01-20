<?php
App::uses('ReceitasController', 'Controller');

/**
 * ReceitasController Test Case
 *
 */
class ReceitasControllerTest extends ControllerTestCase {

    public function setUp() {
        parent::setUp();
        $this->Receita = ClassRegistry::init('Receitas');
    }

    
 /**
  * testAddNotLoggedIn method
  */       
	public function testAddNotLoggedIn() {
		$inicio = $this->Receita->find('count');
		
		$this->logout();
		
		$data = array('Receita' => array('tipo' => '1', 'data' => date('Y-m-d'), 'valor' => '384.00'));
		$this->testAction('receitas/nova', array('method' => 'post', 'data' => $data));
		
		$fim = $this->Receita->find('count');
		$this->assertEqual($fim, $inicio);
	}
	
	
	public function testAddLoggedIn() {
		$inicio = $this->Receita->find('count');
		
		$this->login();
		
		$data = array('Receita' => array('tipo' => '1', 'data' => date('Y-m-d'), 'valor' => '384.00','descricao' => 'Registro adicionado pelo teste'));
		$this->testAction('receitas/nova', array('method' => 'post', 'data' => $data));
		
		$fim = $this->Receita->find('count');
		$this->assertEqual($fim, $inicio + 1);
	}


/**
 * 
 */	
	public function login() {
		$data = array('Usuario' => array('email' => 'andrecardosodev@gmail.com', 'senha' => 'andre'));
		$this->testAction('/', array('method' => 'post', 'data' => $data) );
	}


/**
 * 
 */
	public function logout() {
		$this->testAction('usuarios/logout');
	}

}
