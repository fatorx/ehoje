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


    
    
    public function testLogin() {
        $data = array('Usuario' => array('email' => 'andrecardosodev@gmail.com', 'senha' => 'andre'));
        $this->testAction('/', array('data' => $data, 'method' => 'post'));
    }
    
/**
 * testAdd method
 *
 * @return void
 */
	public function testCadastroSemImagem() {
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
            $inicial = $this->Usuario->find('count');
            
            $data = array('Usuario' => array('nome' => 'Teste', 'email' => '','senha' => '1234'));
            
            $this->testAction('usuarios/cadastro', array('method' => 'post', 'data' => $data));
            
            $final = $this->Usuario->find('count');
            
            $this->assertEqual($final, $inicial);
	}
        
        
  /**
   * 
   */      
        public function testCadastroComUpload() {
            $inicial = $this->Usuario->find('count');
            
            $data = array('Usuario' => array('nome' => 'Teste', 'email' => 'novo@novo.com.br','senha' => '1234',
                             'avatar' => array('name' => 'teste.jpg', 'tmp_name' => 'tmp/ewede3423', 'type' => 'image/jpeg')
                ));
            
            $this->testAction('usuarios/cadastro', array('method' => 'post', 'data' => $data));
            
            $final = $this->Usuario->find('count');
            
            $this->assertEqual($final, $inicial + 1);
        }

        
        
 /**
  * 
  */       
        public function testLogout() {
		$this->testAction('usuarios/logout');
	}

}
