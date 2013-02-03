<?php
App::uses('AppController', 'Controller');
/**
 * Despesas Controller
 * 
 */
class DespesasController extends AppController {

    var $uses = array('DespesasFixa', 'Receita',  'DespesasVariavei', 'DespesasExtra', 'CategoriasDespesasFixa', 'CategoriasDespesasVariavei', 'CategoriasDespesasExtra', 'Investimento', 'CategoriasInvestimento');
    
    
 /**
  * 
  */   
    public function relatorio () {
        if ( $this->Session->read('user') ) {
            $this->set('janeiro', array('receita' => $this->obter_receita('01'), 'despesa' => $this->obter_despesa('01','total') ));
            $this->set('fevereiro', array('receita' => $this->obter_receita('02'), 'despesa' => $this->obter_despesa('02','total') ));
            $this->set('marco', array('receita' => $this->obter_receita('03'), 'despesa' => $this->obter_despesa('03','total') ));
            $this->set('abril', array('receita' => $this->obter_receita('04'), 'despesa' => $this->obter_despesa('04','total') ));
            $this->set('maio', array('receita' => $this->obter_receita('05'), 'despesa' => $this->obter_despesa('05','total') ));
            $this->set('junho', array('receita' => $this->obter_receita('06'), 'despesa' => $this->obter_despesa('06','total') ));
            $this->set('julho', array('receita' => $this->obter_receita('07'), 'despesa' => $this->obter_despesa('07','total') ));
            $this->set('agosto', array('receita' => $this->obter_receita('08'), 'despesa' => $this->obter_despesa('08','total') ));
            $this->set('setembro', array('receita' => $this->obter_receita('09'), 'despesa' => $this->obter_despesa('09','total') ));
            $this->set('outubro', array('receita' => $this->obter_receita('10'), 'despesa' => $this->obter_despesa('10','total') ));
            $this->set('novembro', array('receita' => $this->obter_receita('11'), 'despesa' => $this->obter_despesa('11','total') ));
            $this->set('dezembro', array('receita' => $this->obter_receita('12'), 'despesa' => $this->obter_despesa('12','total') ));

            $this->set('proporcao',$this->obter_despesa(date('m'), 'array'));
            
            App::import('controller','functions');
            $Functions = new FunctionsController;
            
            $this->set('mesAtual', $Functions->obter_nome_mes(date('m') ));
        } else {
            $this->redirect('/');
        }
    }
    
    
    public function nova () {
        if ( $this->Session->read('user') ) {
            $this->set('despesasFixas', $this->CategoriasDespesasFixa->find('all'));
            $this->set('despesasVariaveis', $this->CategoriasDespesasVariavei->find('all'));
            $this->set('despesasExtras', $this->CategoriasDespesasExtra->find('all'));
        
            if ( $this->request->is('post') && @$this->request->data['Despesa']['valor'] != '' ) {
                $this->request->data['Despesa']['data'] = date('Y-m-d', strtotime($this->request->data['Despesa']['data']));
                $this->request->data['Despesa']['valor'] = str_replace( ',', '.', $this->request->data['Despesa']['valor'] );
                $despesa = explode( ';',$this->request->data['Despesa']['tipo'] );
                $tipoDespesa = $despesa[0];
                $idDespesa = $despesa[1];
                $despesaGravada = false;
                
                switch ($tipoDespesa) {
                    case 'v':
                        $this->DespesasVariavei->create();
                        
                        $this->request->data['DespesasVariavei']['descricao'] = $this->request->data['Despesa']['descricao'];
                        $this->request->data['DespesasVariavei']['data'] = $this->request->data['Despesa']['data'];
                        $this->request->data['DespesasVariavei']['valor'] = $this->request->data['Despesa']['valor'];
                        $this->request->data['DespesasVariavei']['id_categoria_despesa_variavel'] = $idDespesa;
                        $this->request->data['DespesasVariavei']['id_usuario'] = $this->Session->read('user.id');
                        
                        if ( $this->DespesasVariavei->save( $this->request->data ) ) {
                            $despesaGravada = true;
                        }
                        break;
                   
                   case 'e':
                       $this->DespesasExtra->create();
                        
                       $this->request->data['DespesasExtra']['descricao'] = $this->request->data['Despesa']['descricao'];
                       $this->request->data['DespesasExtra']['data'] = $this->request->data['Despesa']['data'];
                       $this->request->data['DespesasExtra']['valor'] = $this->request->data['Despesa']['valor'];
                       $this->request->data['DespesasExtra']['id_categoria_despesa_extra'] = $idDespesa;
                       $this->request->data['DespesasExtra']['id_usuario'] = $this->Session->read('user.id');

                       if ( $this->DespesasExtra->save( $this->request->data ) ) {
                           $despesaGravada = true;
                       }
                       break;

                    default:
                      $this->DespesasFixa->create();
                      
                      $this->request->data['DespesasFixa']['descricao'] = $this->request->data['Despesa']['descricao'];  
                      $this->request->data['DespesasFixa']['data'] = $this->request->data['Despesa']['data'];
                      $this->request->data['DespesasFixa']['valor'] = $this->request->data['Despesa']['valor'];
                      $this->request->data['DespesasFixa']['id_categoria_despesa_fixa'] = $idDespesa;
                      $this->request->data['DespesasFixa']['id_usuario'] = $this->Session->read('user.id');

                      if ( $this->DespesasFixa->save( $this->request->data ) ) {
                          $despesaGravada = true;
                      }  
                      break;
                }
                
                if ( $despesaGravada ) {
                    $this->Session->setFlash('<p>Despesa contabilizada com sucesso!</p>', 'default', array( 'class' => 'notification msgsuccess'));
                    $this->redirect('/');
                } else {
                    $this->Session->setFlash('<p>Não foi possível contabilizar a despesa, por favor tente novamente.</p>', 'default', array( 'class' => 'notification msgerror' ));
                    $this->redirect('/');
                }
            }
        } else {
            $this->redirect('/');
        }
    }
   
    
/** 
 * 
 */
    public function investimento () {
        if ( $this->Session->read('user') ) {
            $this->set('investimentos', $this->CategoriasInvestimento->find('list', array('fields' => array('id', 'nome'), 'order' => 'nome ASC')) );
            
            if ( $this->request->is('post') && @$this->request->data['Investimento']['valor'] != '' ) {
                $this->request->data['Investimento']['id_categoria_investimento'] = $this->request->data['Investimento']['tipo'];
                $this->request->data['Investimento']['id_usuario'] = $this->Session->read('user.id');
                $this->request->data['Investimento']['valor'] = str_replace(',', '.', $this->request->data['Investimento']['valor']);
                $this->request->data['Investimento']['data'] = date('Y-m-d', strtotime($this->request->data['Investimento']['data']));
                
                $this->Investimento->create();
                if ( $this->Investimento->save( $this->request->data ) ) {
                    $this->Session->setFlash('<p>Investimento cadastrado com sucesso!</p>', 'default', array( 'class' => 'notification msgsuccess' ));
                    $this->redirect('/');
                } else {
                    $this->Session->setFlash('<p>Não foi possível gravar o investimento, por favor tente novamente.</p>', 'default', array( 'class' => 'notification msgerror' ));
                }
            }
        } else {
            $this->redirect('/');
        }
    }
    
  
    
 /**
  * obter_receita method
  *  
  * @param type $mesBase
  * @return type
  */   
    private function obter_receita ( $mesBase ) {
        $dataInicial = date('Y-').$mesBase.date('-01');
        $dataFinal = date('Y-').$mesBase.date('-31');
        
        $valorFinal = 0;
        
        $result = $this->Receita->query("select sum(Receita.valor) as total from receitas Receita where Receita.data between '$dataInicial' and '$dataFinal' and id_usuario='".$this->Session->read('user.id')."'");
        $valorFinal = (int) $result['0']['0']['total'];
        return $valorFinal;
    }   
    
    
/**
 * 
 * 
 * @param type $mesBase
 * @param type $tipo (total e array)
 * @return type
 */    
    private function obter_despesa ( $mesBase, $tipo = 'total' ) {
        $dataInicial = date('Y-').$mesBase.date('-01');
        $dataFinal = date('Y-').$mesBase.date('-31');
        
        $valorFinal = 0;
        $arrayFinal = Array();
       
        $despesasFixas = $this->DespesasFixa->query("select sum(Despesa.valor) as total from despesas_fixas Despesa where Despesa.data between '$dataInicial' and '$dataFinal' and id_usuario='".$this->Session->read('user.id')."'");
        $despesasFixas = $despesasFixas['0']['0']['total'];
        if ( $despesasFixas != null ) {
            $valorFinal += $despesasFixas;
            $arrayFinal[] = $despesasFixas;
        }
        
        $despesasVariaveis = $this->DespesasVariavei->query("select sum(Despesa.valor) as total from despesas_variaveis Despesa where Despesa.data between '$dataInicial' and '$dataFinal' and id_usuario='".$this->Session->read('user.id')."'");
        $despesasVariaveis = $despesasVariaveis['0']['0']['total'];
        if ( $despesasVariaveis != null ) {
            $valorFinal += $despesasVariaveis;
            $arrayFinal[] = $despesasVariaveis;
        }
        
        $despesasExtras = $this->DespesasExtra->query("select sum(Despesa.valor) as total from despesas_extras Despesa where Despesa.data between '$dataInicial' and '$dataFinal' and id_usuario='".$this->Session->read('user.id')."'");
        $despesasExtras = $despesasExtras['0']['0']['total'];
        if ( $despesasExtras != null ) {
            $valorFinal += $despesasExtras;
            $arrayFinal[] = $despesasExtras;
        }
        
        $investimentos = $this->Investimento->query("select sum(Despesa.valor) as total from investimentos Despesa where Despesa.data between '$dataInicial' and '$dataFinal' and id_usuario='".$this->Session->read('user.id')."'");
        $investimentos = $investimentos['0']['0']['total'];
        if ( $investimentos != null ) {
            $valorFinal += $investimentos;
            $arrayFinal[] = $investimentos;
        }
        
        if ( $tipo == 'total' ) {
            $valorFinal = (int) $valorFinal;
        } else {
            $valorFinal = $arrayFinal;
        }
        
        return $valorFinal; 
    }
    
}
