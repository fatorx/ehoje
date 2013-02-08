<?php
App::uses('DespesasController', 'Controller');

/**
 * ReceitasController Test Case
 *
 */
class DespesasControllerTest extends ControllerTestCase {

    public function setUp() {
        parent::setUp();
        $this->DespesaFixa = ClassRegistry::init('DespesasFixas');
        $this->DespesaVariavei = ClassRegistry::init('DespesasVariavei');
        $this->DespesaExtra = ClassRegistry::init('DespesasExtra');
        $this->Investimento = ClassRegistry::init('Investimentos');
    }

  
    public function testAddDespesaFixaNotLoggedIn() {
        $this->logout();
        
        $inicial = $this->DespesaFixa->find('count');
        
        $data = array('DespesasFixa' => array('tipo' => 'f:1','data' => date('Y-m-d'), 'valor' => '134.00', 'descricao' => 'Registro que não deveria estar aqui'));
        
        $this->testAction('despesas/nova', array('method' => 'post', 'data' => $data));
        
        $final = $this->DespesaFixa->find('count');
        
        $this->assertEqual($final, $inicial);
    }
    
    
    public function testAddDespesaVariaveiNotLoggedIn() {        
        $inicial = $this->DespesaVariavei->find('count');
        
        $data = array('Despesa' => array('tipo' => 'v;1','data' => date('Y-m-d'), 'valor' => '134.00', 'descricao' => 'Registro que não deveria estar aqui'));
        
        $this->testAction('despesas/nova', array('method' => 'post', 'data' => $data));
        
        $final = $this->DespesaVariavei->find('count');
        
        $this->assertEqual($final, $inicial);
    }
    
    
    public function testAddDespesaExtraNotLoggedIn() {        
        $inicial = $this->DespesaExtra->find('count');
        
        $data = array('Despesa' => array('tipo' => 'e;1','data' => date('Y-m-d'), 'valor' => '134.00', 'descricao' => 'Registro que não deveria estar aqui'));
        
        $this->testAction('despesas/nova', array('method' => 'post', 'data' => $data));
        
        $final = $this->DespesaExtra->find('count');
        
        $this->assertEqual($final, $inicial);
    }
    
    
    public function testAddInvestimentoNotLoggedIn() {        
        $inicial = $this->Investimento->find('count');
        
        $data = array('Investimento' => array('tipo' => '1','data' => date('Y-m-d'), 'valor' => '134.00', 'descricao' => 'Registro que não deveria estar aqui'));
        
        $this->testAction('despesas/investimento', array('method' => 'post', 'data' => $data));
        
        $final = $this->Investimento->find('count');
        
        $this->assertEqual($final, $inicial);
    }
    
    
    public function testAddDespesaFixaLoggedIn() {
        $this->login();
        
        $inicial = $this->DespesaFixa->find('count');
        
        $data = array('Despesa' => array('tipo' => 'f;1','data' => date('Y-m-d'), 'valor' => '134.00', 'descricao' => 'Registro que não deveria estar aqui'));
        
        $this->testAction('despesas/nova', array('method' => 'post', 'data' => $data));
        
        $final = $this->DespesaFixa->find('count');
        
        $this->assertEqual($final, $inicial + 1);
    }
    
    
    public function testAddDespesaVariaveiLoggedIn() {        
        $inicial = $this->DespesaVariavei->find('count');
        
        $data = array('Despesa' => array('tipo' => 'v;1','data' => date('Y-m-d'), 'valor' => '134.00', 'descricao' => 'Registro que não deveria estar aqui'));
        
        $this->testAction('despesas/nova', array('method' => 'post', 'data' => $data));
        
        $final = $this->DespesaVariavei->find('count');
        
        $this->assertEqual($final, $inicial + 1);
    }
    
    
    public function testAddDespesaExtraLoggedIn() {        
        $inicial = $this->DespesaExtra->find('count');
        
        $data = array('Despesa' => array('tipo' => 'e;1','data' => date('Y-m-d'), 'valor' => '134.00', 'descricao' => 'Registro que não deveria estar aqui'));
        
        $this->testAction('despesas/nova', array('method' => 'post', 'data' => $data));
        
        $final = $this->DespesaExtra->find('count');
        
        $this->assertEqual($final, $inicial + 1);
    }
    
    
    public function testAddInvestimentoLoggedIn() {        
        $inicial = $this->Investimento->find('count');
        
        $data = array('Investimento' => array('tipo' => '1','data' => date('Y-m-d'), 'valor' => '134.00', 'descricao' => 'Registro que não deveria estar aqui'));
        
        $this->testAction('despesas/investimento', array('method' => 'post', 'data' => $data));
        
        $final = $this->Investimento->find('count');
        
        $this->assertEqual($final, $inicial + 1);
    }
    
    
    /**
     * 
     */
    public function testRelatorio() {
            $this->testAction('/despesas/relatorio');
            $this->assertNotEqual($this->vars['mesAtual'],null);
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
