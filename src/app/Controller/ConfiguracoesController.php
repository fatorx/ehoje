<?php
App::uses('AppController', 'Controller');
/**
 * Despesas Controller
 * 
 */
class ConfiguracoesController extends AppController {

    var $uses = array('Receita', 'Usuario', 'Investimento', 'DespesasFixa', 'DespesasVariavei', 'DespesasExtra');
    
    public function beforeFilter() {
            if ( 2 == Configure::read('debug') ) {
               $this->Receita->setDataSource('develop');
               $this->Usuario->setDataSource('develop');
               $this->Investimento->setDataSource('develop');
               $this->DespesasFixa->setDataSource('develop');
               $this->DespesasVariavei->setDataSource('develop');
               $this->DespesasExtra->setDataSource('develop');
            }
           parent::beforeFilter();
    }
    
    public function index () {
        $this->set( 'receitas', $this->obter_tipos_receitas() );
        $this->set( 'investimentos', $this->obter_tipos_investimentos() );
        $this->set( 'despesasFixas', $this->obter_tipos_despesas_fixas() );
        $this->set( 'despesasVariaveis', $this->obter_tipos_despesas_variaveis() );
        $this->set( 'despesasExtras', $this->obter_tipos_despesas_extras() );
        
        if ( $this->request->is('post') ) {
            
        }
    }
    
    
    private function obter_tipos_receitas () {
        return $this->Receita->find('all');
    }
    
    
    
    private function obter_tipos_investimentos () {
        return $this->Investimento->find('all');
    }
    
    
    private function obter_tipos_despesas_fixas () {
        return $this->DespesasFixa->find('all');
    }
    
    private function obter_tipos_despesas_variaveis () {
        return $this->DespesasVariavei->find('all');
    }
    
    
    private function obter_tipos_despesas_extras () {
        return $this->DespesasExtra->find('all');
    }
    
    
    
    private function novo_tipo_receita () {
    

    }
    
    
    private function novo_tipo_investimento () {
        
    }
    
    
    private function novo_tipo_despesa_fixa () {
        
    }
    
    
    private function novo_tipo_despesa_variavel () {
        
    }
    
    
    private function novo_tipo_despesa_extra () { 
        
        
    }
    
}
