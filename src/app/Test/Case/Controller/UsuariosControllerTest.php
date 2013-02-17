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
        $this->assertEqual($this->vars['erroLogin'], 0);
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
            
            $data = array('Usuario' => array('nome' => 'Teste', 'email' => null,'senha' => '1234'));
            
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
        
        
        public function testMinhaConta(){
            $usuario = $this->Usuario->find('first', array('order' => array('id' => 'desc')));
            $idUsuario = $usuario['Usuarios']['id'];
            $nomeAntigo = $usuario['Usuarios']['nome'];
            
            $data = array('Usuario' => array('email' => 'alterado@teste.com.br', 'nome' => 'andre', 'senha' => 'andre', 'avatar' => array('name' => 'teste.jpg', 'tmp_name' => 'tmp/e4232e23kj'), 'id' => $idUsuario));
            
            $this->testAction('/usuarios/minhaConta', array('data' => $data,'method' => 'post'));
            
            $novosDados = $this->Usuario->read(null, $idUsuario);
            $novoNome = $novosDados['Usuarios']['nome'];
            
            $this->assertNotEqual('andre', $nomeAntigo);
        }

 /**
  * 
  */       
        public function testLogout() {
            $this->testAction('usuarios/logout');
            $this->assertEqual($this->controller->view, 'logout');
	}
        
        
        public function testRecuperarSenha() {
            $data = array('Usuario' => array('email' => 'alterado@teste.com.br'));
            $result = $this->testAction('/usuarios/recuperarSenha', array('data' => $data, 'method' => 'post'));
        }

}
