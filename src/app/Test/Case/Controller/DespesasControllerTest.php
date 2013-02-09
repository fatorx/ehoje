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
    
    public function testListarNotLoggedIn() {
        $this->logout();
        $this->testAction('/despesas/listar');
        $this->assertEqual($this->vars, array());
    }
    
    public function testRelatorioNotLoggedIn() {
        $this->testAction('/despesas/relatorio');
        $this->assertEqual($this->vars, array());
    }
    
    public function testListarInvestimentosNotLoggedIn() {
        $this->testAction('/despesas/listar_investimentos');
        $this->assertEqual($this->vars, array());
    }
    
    public function testEditarInvestimentoNotLoggedIn() {
        $this->logout();
        $this->testAction('/despesas/editar_investimento/3');
        $this->assertEqual($this->vars, array());
    }
    
    public function testDeleteInvestimentoNotLoggedIn() {
        $this->logout();
        $this->testAction('/despesas/delete_investimento/3');
        $this->assertEqual($this->vars, array());
    }
    
    public function testDeleteDespesaFixaNotLoggedIn() {
        $this->testAction('/despesas/delete_fixa/3');
        $this->assertEqual($this->vars, array());
    }
    
    public function testDeleteDespesaVariaveiNotLoggedIn() {
        $this->testAction('/despesas/delete_variavel/3');
        $this->assertEqual($this->vars, array());
    }
    
    public function testDeleteDespesaExtraNotLoggedIn() {
        $this->testAction('/despesas/delete_extra/3');
        $this->assertEqual($this->vars, array());
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
    
    
    public function testEditarDespesaFixa() {
        $expected = 'Despesa alterada pelo teste';
        
        $lastId = $this->DespesaFixa->find('first', array('order' => array('id' => 'desc')));
        $lastId = $lastId['DespesasFixas']['id'];
        
        $data = array('Despesa' => array(
                    'tipo' => 'f;1',
                    'descricao' => $expected,
                    'id' => $lastId,
                    'valor' => '234.99'
        ));
        
        $this->testAction('/despesas/editar/'.$lastId.'/f', array('method' => 'post', 'data' => $data));
        
        $content = $this->DespesaFixa->read(null, $lastId);
        $this->assertEqual($expected, $content['DespesasFixas']['descricao']);
    }
    
    
    public function testAddDespesaVariaveiLoggedIn() {        
        $inicial = $this->DespesaVariavei->find('count');
        
        $data = array('Despesa' => array('tipo' => 'v;1','data' => date('Y-m-d'), 'valor' => '134.00', 'descricao' => 'Registro que não deveria estar aqui'));
        
        $this->testAction('despesas/nova', array('method' => 'post', 'data' => $data));
        
        $final = $this->DespesaVariavei->find('count');
        
        $this->assertEqual($final, $inicial + 1);
    }
    
    public function testEditarDespesaVariavei() {
        $expected = 'Despesa alterada pelo teste';
        
        $lastId = $this->DespesaVariavei->find('first', array('order' => array('id' => 'desc')));
        $lastId = $lastId['DespesasVariavei']['id'];
        
        $data = array('Despesa' => array(
                    'tipo' => 'v;1',
                    'descricao' => $expected,
                    'id' => $lastId,
                    'valor' => '234.99'
        ));
        
        $this->testAction('/despesas/editar/'.$lastId.'/v', array('method' => 'post', 'data' => $data));
        
        $content = $this->DespesaVariavei->read(null, $lastId);
        $this->assertEqual($expected, $content['DespesasVariavei']['descricao']);
    }
    
    
    public function testAddDespesaExtraLoggedIn() {        
        $inicial = $this->DespesaExtra->find('count');
        
        $data = array('Despesa' => array('tipo' => 'e;1','data' => date('Y-m-d'), 'valor' => '134.00', 'descricao' => 'Registro que não deveria estar aqui'));
        
        $this->testAction('despesas/nova', array('method' => 'post', 'data' => $data));
        
        $final = $this->DespesaExtra->find('count');
        
        $this->assertEqual($final, $inicial + 1);
    }
    
    public function testEditarDespesaExtra() {
        $expected = 'Despesa alterada pelo teste';
        
        $lastId = $this->DespesaExtra->find('first', array('order' => array('id' => 'desc')));
        $lastId = $lastId['DespesasExtra']['id'];
        
        $data = array('Despesa' => array(
                    'tipo' => 'e;1',
                    'descricao' => $expected,
                    'id' => $lastId,
                    'valor' => '234.99'
        ));
        
        $this->testAction('/despesas/editar/'.$lastId.'/e', array('method' => 'post', 'data' => $data));
        
        $content = $this->DespesaExtra->read(null, $lastId);
        $this->assertEqual($expected, $content['DespesasExtra']['descricao']);
    }
    
    
    public function testEditarDespesaSemPost() {
        $lastId = $this->DespesaExtra->find('first', array('order' => array('id' => 'desc')));
        $lastId = $lastId['DespesasExtra']['id'];
        
        $this->testAction('/despesas/editar/'.$lastId.'/e', array('method' => 'get'));
        $this->assertNotEqual($this->vars, array());
    }
    
    
    public function testAddInvestimentoLoggedIn() {        
        $inicial = $this->Investimento->find('count');
        
        $data = array('Investimento' => array('tipo' => '1','data' => date('Y-m-d'), 'valor' => '134.00', 'descricao' => 'Registro que não deveria estar aqui'));
        
        $this->testAction('despesas/investimento', array('method' => 'post', 'data' => $data));
        
        $final = $this->Investimento->find('count');
        
        $this->assertEqual($final, $inicial + 1);
    }
    
    
    
    
    public function testListar() {
        $this->testAction('/despesas/listar');
        $this->assertNotEqual($this->vars, array());
    }
    
    
    public function testListarInvestimentos() {
        $this->testAction('/despesas/listar_investimentos');
        $this->assertNotEqual($this->vars, array());
    }
    
    
    public function testEditarInvestimentoVisualizar() {
        $expected = 'Investimento editado pelo teste';
        $lastId = $this->Investimento->find('first', array('order' => array('id' => 'desc')));
        $lastId = $lastId['Investimentos']['id'];
        
        $this->testAction('/despesas/editar_investimento/'.$lastId, array('method' => 'get'));
        
        $content = $this->Investimento->read(null, $lastId);
        
        $this->assertNotEqual($expected, $content['Investimentos']['descricao']);
        
    }
    
    public function testEditarInvestimento() {
        $expected = 'Investimento editado pelo teste';
        $lastId = $this->Investimento->find('first', array('order' => array('id' => 'desc')));
        $lastId = $lastId['Investimentos']['id'];
        
        $data = array('Investimento' => array('descricao' => $expected, 'id' => $lastId, 'valor' => '234.67'));
        
        $this->testAction('/despesas/editar_investimento/'.$lastId, array('method' => 'post', 'data' => $data));
        
        $content = $this->Investimento->read(null, $lastId);
        
        $this->assertEqual($expected, $content['Investimentos']['descricao']);
        
    }
    
    
    public function testDeleteInvestimento() {
        $initial = $this->Investimento->find('count');
        
        $lastId = $this->Investimento->find('first', array('order' => array('id' => 'desc')));
        $lastId = $lastId['Investimentos']['id'];
        
        $this->testAction('/despesas/delete_investimento/'.$lastId);
        
        $final = $this->Investimento->find('count');
        
        $this->assertNotEqual($final, $initial);
    }
    
    
    public function testDeleteDespesaFixa() {
        $initial = $this->DespesaFixa->find('count');
        
        $lastId = $this->DespesaFixa->find('first', array('order' => array('id' => 'desc')));
        $lastId = $lastId['DespesasFixas']['id'];
        
        $this->testAction('/despesas/delete_fixa/'.$lastId);
        
        $final = $this->DespesaFixa->find('count');
        
        $this->assertNotEqual($final, $initial);
    }
    
    
    public function testDeleteDespesaVariavei() {
        $initial = $this->DespesaVariavei->find('count');
        
        $lastId = $this->DespesaVariavei->find('first', array('order' => array('id' => 'desc')));
        $lastId = $lastId['DespesasVariavei']['id'];
        
        $this->testAction('/despesas/delete_variavel/'.$lastId);
        
        $final = $this->DespesaVariavei->find('count');
        
        $this->assertNotEqual($final, $initial);
    }
    
    
    public function testDeleteDespesaExtra() {
        $initial = $this->DespesaExtra->find('count');
        
        $lastId = $this->DespesaExtra->find('first', array('order' => array('id' => 'desc')));
        $lastId = $lastId['DespesasExtra']['id'];
        
        $this->testAction('/despesas/delete_extra/'.$lastId);
        
        $final = $this->DespesaExtra->find('count');
        
        $this->assertNotEqual($final, $initial);
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
		$this->testAction('/usuarios/logout');
	}

}
