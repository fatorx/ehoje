<?php
App::uses('UsuariosController', 'Controller');

/**
 * UsuariosController Test Case
 *
 */
class UsuariosControllerTest extends ControllerTestCase {

    public function setUp() {
        parent::setUp();
        $this->Usuario = ClassRegistry::init('Usuarios');
    }


/**
 * testAdd method
 *
 * @return void
 */
	public function testCadastroSemImagem() {
            $this->logout();
            $inicial = $this->Usuario->find('count');
            
            $data = array('Usuario' => array('nome' => 'Teste', 'email' => 'teste@teste.com.br', 'senha' => '1234', 'verifica_senha' => '1234'));
            
            $this->testAction('usuarios/cadastro', array('method' => 'post', 'data' => $data));
            
            $final = $this->Usuario->find('count');
            
            $this->assertEqual($final, $inicial + 1);
	}
        
        
 /**
  * testCadastroSemEmail method
  * 
  */       
        public function testCadastroSemEmail() {
            $this->logout();
            $inicial = $this->Usuario->find('count');
            
            $data = array('Usuario' => array('nome' => 'Teste', 'email' => '','senha' => '1234'));
            
            $this->testAction('usuarios/cadastro', array('method' => 'post', 'data' => $data));
            
            $final = $this->Usuario->find('count');
            
            $this->assertEqual($final, $inicial);
	}

        
        
 /**
  * 
  */       
        public function logout() {
		$this->testAction('usuarios/logout');
	}

}
