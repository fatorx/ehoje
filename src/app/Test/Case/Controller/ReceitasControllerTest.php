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
 * 
 */
	public function testLogout() {
		$this->testAction('usuarios/logout');
	}
    
 /**
  * testAddNotLoggedIn method
  */       
	public function testAddNotLoggedIn() {
		$inicio = $this->Receita->find('count');
		
		$data = array('Receita' => array('tipo' => '1', 'data' => date('Y-m-d'), 'valor' => '384.00'));
		$this->testAction('receitas/nova', array('method' => 'post', 'data' => $data));
		
		$fim = $this->Receita->find('count');
		$this->assertEqual($fim, $inicio);
	}
        
        
  /**
  * testAddError method
  */       
	public function testAddError() {
		$inicio = $this->Receita->find('count');
		
		$this->testAction('receitas/nova');
		
		$fim = $this->Receita->find('count');
		$this->assertEqual($fim, $inicio);
	}      
	
        
  /**
   * 
   */      
        public function testLogin() {
            $this->testAction('/', array('method' => 'post', 'data' => array('Usuario' => array('email' => 'andrecardosodev@gmail.com', 'senha' => 'andre'))));
        }
        
	
 /**
  * 
  */       
	public function testAddLoggedIn() {
            $inicio = $this->Receita->find('count');

            $data = array('Receita' => array('tipo' => '1', 'data' => date('Y-m-d'), 'valor' => '384.00','descricao' => 'Registro adicionado pelo teste'));
            $this->testAction('receitas/nova', array('method' => 'post', 'data' => $data));

            $fim = $this->Receita->find('count');
            $this->assertEqual($inicio + 1, $fim);
	}
        
}
