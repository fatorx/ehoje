<?php
App::uses('ReceitasController', 'Controller');

/**
 * ReceitasController Test Case
 *
 */
class ReceitasControllerTest extends ControllerTestCase {

    /**
 * Fixtures
 *
 * @var array
 *//*
	public $fixtures = array(
		'app.usuario',
                'app.receita'
	);*/
    
    public function setUp() {
        parent::setUp();
        $this->Receita = ClassRegistry::init('Receitas');
        $this->Usuario = ClassRegistry::init('Usuarios');
    }

    
    /**
 * 
 */
	public function testLogout() {
		$this->testAction('usuarios/logout');
	}
        
        public function testListarNotLoggedIn() {
            $this->testAction('/receitas/listar');
            $this->assertEqual($this->vars, array());
        }
        
        public function testEditarNotLoggedIn() {
            $this->testAction('/receitas/editar/5');
            $this->assertEqual($this->vars, array());
        }
    
 /**
  * testAddNotLoggedIn method
  */       
	public function testAddNotLoggedIn() {
		$inicio = $this->Receita->find('count');
		
		$data = array('Receita' => array('tipo' => '1', 'data' => date('d/m/Y'), 'valor' => '384.00'));
		$this->testAction('receitas/nova', array('method' => 'post', 'data' => $data));
		
		$fim = $this->Receita->find('count');
		$this->assertEqual($fim, $inicio);
	}
        
  /**
   * 
   */      
        public function testLogin() {
            $this->testAction('/', array('method' => 'post', 'data' => array('Usuario' => array('email' => 'andrecardosodev@gmail.com', 'senha' => 'andre'))));
            $this->assertEqual($this->vars['erroLogin'], 0);
        }
        
        
        public function testIndex() {
            $notExpected = array();
            $this->testAction('/receitas/listar');
            $this->assertNotEqual($notExpected, $this->vars);
        }
        
        
        public function testAddLoggedIn() {
            $inicio = $this->Receita->find('count');

            $data = array('Receita' => array('tipo' => 1, 'data' => date('d/m/Y'), 'valor' => '384.00','descricao' => 'Registro adicionado pelo teste'));
            $this->testAction('receitas/nova', array('method' => 'post', 'data' => $data));

            $fim = $this->Receita->find('count');
            $this->assertEqual($inicio + 1, $fim);
	}
        
        
        public function testEditSemPost() {
            $user = $this->Usuario->find('first', array('order' => array('id' => 'desc')));
            $user = $user['Usuarios']['id'];
            
            $receitas = $this->Receita->find('first', array('order' => array('id' => 'desc')));
            $lastInsert = $receitas['Receitas']['id'];
            
            $this->testAction('/receitas/editar/'.$lastInsert, array('method' => 'get'));

            $this->assertNotEqual($this->vars, array());
            
        }
        
        
        public function testEdit() {
            $receitas = $this->Receita->find('first', array('order' => array('id' => 'desc')));
            $notExpected = $receitas['Receitas']['descricao'];
            
            $user = $this->Usuario->find('first', array('order' => array('id' => 'desc')));
            $user = $user['Usuarios']['id'];
            
            $data = array('Receita' => array('id' => $receitas['Receitas']['id'], 'descricao' => 'Modificada pelo teste', 'id_usuario' => $user));
            
            $this->testAction('/receitas/editar/'.$receitas['Receitas']['id'], array('method' => 'post', 'data' => $data));
            
            $receitas = $this->Receita->read(null, $receitas['Receitas']['id']);
            $newValue = $receitas['Receitas']['descricao'];
            
            $this->assertNotEqual($newValue, $notExpected);
            
        }
        
	
        public function testDelete() {
            $notExpected = $this->Receita->find('count');
            
            $receitas = $this->Receita->find('first', array('order' => array('id' => 'desc')));
            $idRemover = $receitas['Receitas']['id'];
            
            $this->testAction('/receitas/delete/'.$idRemover);
            
            $current = $this->Receita->find('count');
            
            $this->assertEqual($current, $notExpected - 1);
        }
        
}
