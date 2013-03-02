<?php
App::uses('AppController', 'Controller');
/**
 * Despesas Controller
 * 
 */
class DespesasController extends AppController {

    var $uses = array(  'DespesasFixa', 'Receita',  'DespesasVariavei', 
                        'DespesasExtra', 'CategoriasDespesasFixa', 'CategoriasDespesasVariavei', 
                        'CategoriasDespesasExtra', 'Investimento', 'CategoriasInvestimento');
    
    
    
    public function listar() {
        $user = $this->Session->read('user');
        if ( $user ) {
           $despesasFixas = $this->DespesasFixa->find('all', array('conditions' => array('id_usuario' => $user['id']),'order' => array('data' => 'desc'), 'limit' => 50));
           $despesasVariaveis = $this->DespesasVariavei->find('all', array('conditions' => array('id_usuario' => $user['id']),'order' => array('data' => 'desc'), 'limit' => 50)); 
           $despesasExtras = $this->DespesasExtra->find('all', array('conditions' => array('id_usuario' => $user['id']),'order' => array('data' => 'desc'), 'limit' => 50)); 
           
           $categoriasFixas = $this->CategoriasDespesasFixa->find('all');
           $categoriasVariaveis = $this->CategoriasDespesasVariavei->find('all');
           $categoriasExtras = $this->CategoriasDespesasExtra->find('all');
           
           $this->set(compact('despesasFixas', 'despesasVariaveis', 'despesasExtras',
                         'categoriasFixas', 'categoriasVariaveis', 'categoriasExtras'       
                   ));
        } else {
            $this->redirect('/');
        }
    }
    
 /**
  * relatorio method
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

            App::import('controller','functions');
            $Functions = new FunctionsController;
            
            if ( $this->request->is('post') ) {
                $mes = $this->request->data['Despesa']['mes'];
                $mesAtual = $Functions->obter_nome_mes($this->request->data['Despesa']['mes']);
            } else {
                $mes = date('m');
                $mesAtual = $Functions->obter_nome_mes(date('m') );
            }
            
            $despesas = $this->obter_despesa(date('m'), 'array');
            $receitas = $this->obter_receita(date('m')) * 100;
            
            $despesaFixa = $despesas[0] * 100;
            $despesaVariavel = $despesas[1] * 100;
            $despesaExtra = $despesas[2] * 100;
            $investimentos = $despesas[3] * 100;
            
            $saldo = $receitas - $despesaFixa;
            $saldo = $saldo - $despesaVariavel;
            $saldo = $saldo - $despesaExtra;
            $saldo = $saldo - $investimentos;
            
            $proporcao = $this->obter_despesa($mes, 'array');
            
            $this->set(compact('proporcao', 'mesAtual', 'saldo'));
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
                    $this->redirect('/despesas/nova');
                } else {
                    $this->Session->setFlash('<p>Não foi possível contabilizar a despesa, por favor tente novamente.</p>', 'default', array( 'class' => 'notification msgerror' ));
                    $this->redirect('/despesas/nova');
                }
            }
        } else {
            $this->redirect('/');
        }
    }
    
    
    public function editar($id = null, $tipo = null) {
        $user = $this->Session->read('user');
        if ( $user ) {
           switch ($tipo) {
               case 'f':
                   $despesa = $this->DespesasFixa->find('all', array('conditions' => array('id' => $id, 'id_usuario' => $user['id'])));
                   $despesa = $despesa['0']['DespesasFixa'];
                   $despesa['id_categoria'] = $despesa['id_categoria_despesa_fixa'];
                   $current = 'f;';
                   break;
               case 'v':
                   $despesa = $this->DespesasVariavei->find('all', array('conditions' => array('id' => $id, 'id_usuario' => $user['id'])));
                   $despesa = $despesa['0']['DespesasVariavei'];
                   $despesa['id_categoria'] = $despesa['id_categoria_despesa_variavel'];
                   $current = 'v;';
                   break;
               case 'e':
                   $despesa = $this->DespesasExtra->find('all', array('conditions' => array('id' => $id, 'id_usuario' => $user['id'])));
                   $despesa = $despesa['0']['DespesasExtra'];
                   $despesa['id_categoria'] = $despesa['id_categoria_despesa_extra'];
                   $current = 'e;';
                   break;
           } 
           
           if ( !$despesa ) {
               throw new NotFoundException('Despesa não localizada');
           }
           
           if ( $this->request->is('post') || $this->request->is('put')) {
                
                $despesa = explode( ';',$this->request->data['Despesa']['tipo'] );
                $tipoDespesa = $despesa[0];
                $idDespesa = $despesa[1];
                
                $saveSuccess = false;
                debug($this->request->data);
                switch($tipoDespesa) {
                    case 'f':
                        $this->request->data['DespesasFixa'] = $this->request->data['Despesa'];
                        $this->request->data['DespesasFixa']['id_categoria_despesa_fixa'] = $idDespesa;
                        $this->request->data['DespesasFixa']['id_usuario'] = $user['id'];
                        if ( $this->DespesasFixa->save($this->request->data['DespesasFixa']) ) {
                            $saveSuccess = true;
                        }
                        break;
                    case 'v':
                        $this->request->data['DespesasVariavei'] = $this->request->data['Despesa'];
                        $this->request->data['DespesasVariavel']['id_categoria_despesa_variavel'] = $idDespesa;
                        $this->request->data['DespesasVariavei']['id_usuario'] = $user['id'];
                        if ( $this->DespesasVariavei->save($this->request->data['DespesasVariavei']) ) {
                            $saveSuccess = true;
                        }
                        break;
                    case 'e':
                        $this->request->data['DespesasExtra'] = $this->request->data['Despesa'];
                        $this->request->data['DespesasExtra']['id_categoria_despesa_extra'] = $idDespesa;
                        $this->request->data['DespesasExtra']['id_usuario'] = $user['id'];
                        
                        if ( $this->DespesasExtra->save($this->request->data['DespesasExtra']) ) {
                            $saveSuccess = true;
                        }
                        break;
                }
                
                if ( $saveSuccess ) {
                    $this->Session->setFlash('<p>Despesa editada com sucesso!</p>', 'default', array('class' => 'notification msgsuccess'));
                    $this->redirect('/despesas/listar/');
                } else {
                    $this->Session->setFlash('<p>Não foi possíve editar a despesa, por favor tente novamente.</p>', 'default', array('class' => 'notification msgerror'));
                }
                
           } else {
               $despesasFixas = $this->CategoriasDespesasFixa->find('all');
               $despesasVariaveis = $this->CategoriasDespesasVariavei->find('all');
               $despesasExtras = $this->CategoriasDespesasExtra->find('all');
               
               $this->set(compact( 'despesasFixas', 'despesasVariaveis', 'despesasExtras', 'current' ));
               
               $this->request->data['Despesa'] = $despesa;
           }
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
                
                $this->Investimento->create();
                if ( $this->Investimento->save( $this->request->data ) ) {
                    $this->Session->setFlash('<p>Investimento cadastrado com sucesso!</p>', 'default', array( 'class' => 'notification msgsuccess' ));
                    $this->redirect('/despesas/investimento');
                } else {
                    $this->Session->setFlash('<p>Não foi possível gravar o investimento, por favor tente novamente.</p>', 'default', array( 'class' => 'notification msgerror' ));
                }
            }
        } else {
            $this->redirect('/');
        }
    }
    
    
 /**
  * 
  */   
    public function listar_investimentos() {
        $user = $this->Session->read('user');
        if ( $user ) {
            $investimento = $this->paginate('Investimento',array('id_usuario' => $user['id']));
            $categoriaInvestimentos = $this->CategoriasInvestimento->find('all');
            $this->set(compact('investimento','categoriaInvestimentos'));
        } else {
            $this->redirect('/');
        }
    }
    
    
    public function editar_investimento($id) {
        $user = $this->Session->read('user');
        if ( $user ) {
            $inv = $this->Investimento->read(null,$id);
            $this->Investimento->id = $id;
            if ( !$this->Investimento->exists() || $inv['Investimento']['id_usuario'] != $user['id'] ) {
                throw new NotFoundException('Investimento inválido');
            }
            if ( $this->request->is('post') || $this->request->is('put') ) {
                $this->request->data['Investimento']['id'] = $id;
                $this->request->data['Investimento']['id_usuario'] = $user['id'];
                
                $this->Investimento->create();
                
                if ( $this->Investimento->save($this->request->data) ) {
                    $this->Session->setFlash('<p>Dados do investimento alterados com sucesso!</p>', 'default', array('class' => 'notification msgsuccess'));
                    $this->redirect('/despesas/listar_investimentos/');
                } else {
                    $this->Session->setFlash('<p>Não foi possível alterar os dados do investimento, por favor tente novamente.</p>', 'default', array('class' => 'notification msgerror'));
                    $this->redirect('/despesas/listar_investimentos/');
                }
                
            } else {
                $this->request->data = $inv;
                $this->set('investimentos', $this->CategoriasInvestimento->find('list', array('fields' => array('id','nome'))));
            }
        } else {
            $this->redirect('/');
        }       
    }
    
    
    
 /**
  * delete_investimento method
  * 
  * @param int $id
  * @throws NotFoundException
  */   
    public function delete_investimento($id) {
       $user = $this->Session->read('user');
       if ( $user ) {
           $this->Investimento->id = $id;
           $inv = $this->Investimento->read(null,$id);
           if ( !$this->Investimento->exists() || $inv['Investimento']['id_usuario'] != $user['id'] ) {
               throw new NotFoundException('Investimento inválido');
           }
           if ( $this->Investimento->delete($id) ) {
               $this->Session->setFlash('<p>Investimento removido com sucesso!</p>', 'default', array('class' => 'notification msgsuccess'));
               $this->redirect('/despesas/listar_investimentos/');
           } else {
               $this->Session->setFlash('<p>Não foi possível remover o investimento, por favor tente novamente.</p>', 'default', array('class' => 'notification msgerror'));
               $this->redirect('/despesas/listar_investimentos/');
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
        } else {
            $arrayFinal[] = '';
        }
        
        $despesasVariaveis = $this->DespesasVariavei->query("select sum(Despesa.valor) as total from despesas_variaveis Despesa where Despesa.data between '$dataInicial' and '$dataFinal' and id_usuario='".$this->Session->read('user.id')."'");
        $despesasVariaveis = $despesasVariaveis['0']['0']['total'];
        if ( $despesasVariaveis != null ) {
            $valorFinal += $despesasVariaveis;
            $arrayFinal[] = $despesasVariaveis;
        } else {
            $arrayFinal[] = '';
        }
        
        $despesasExtras = $this->DespesasExtra->query("select sum(Despesa.valor) as total from despesas_extras Despesa where Despesa.data between '$dataInicial' and '$dataFinal' and id_usuario='".$this->Session->read('user.id')."'");
        $despesasExtras = $despesasExtras['0']['0']['total'];
        if ( $despesasExtras != null ) {
            $valorFinal += $despesasExtras;
            $arrayFinal[] = $despesasExtras;
        } else {
            $arrayFinal[] = '';
        }
        
        $investimentos = $this->Investimento->query("select sum(Despesa.valor) as total from investimentos Despesa where Despesa.data between '$dataInicial' and '$dataFinal' and id_usuario='".$this->Session->read('user.id')."'");
        $investimentos = $investimentos['0']['0']['total'];
        if ( $investimentos != null ) {
            $valorFinal += $investimentos;
            $arrayFinal[] = $investimentos;
        } else {
            $arrayFinal[] = '';
        }
        
        if ( $tipo == 'total' ) {
            $valorFinal = (int) $valorFinal;
        } else {
            $valorFinal = $arrayFinal;
        }
        
        return $valorFinal; 
    }
    
    
 /**
  * 
  * @param type $id
  * @throws NotFoundException
  */   
    public function delete_fixa($id = null) {
        $user = $this->Session->read('user');
        if ( $user ) {
           $despesa = $this->DespesasFixa->find('all', array('conditions' => array('id' => $id, 'id_usuario' => $user['id']))); 
           if ( !$despesa ) {
               throw new NotFoundException('Despesa inválida');
           } else {
               if ( $this->DespesasFixa->delete($id) ) {
                   $this->Session->setFlash('<p>Despesa removida com sucesso!</p>', 'default', array('class' => 'notification msgsuccess'));
                   $this->redirect('/despesas/listar/');
               } else {
                   $this->Session->setFlash('<p>Não foi possível remover a despesa, por favor tente novamente.</p>', 'default', array('class' => 'notification msgerror'));
                   $this->redirect('/despesas/listar/');
               }
           } 
        } else {
            $this->redirect('/');
        }
    }
    
    
    /**
  * 
  * @param type $id
  * @throws NotFoundException
  */   
    public function delete_variavel($id = null) {
        $user = $this->Session->read('user');
        if ( $user ) {
           $despesa = $this->DespesasVariavei->find('all', array('conditions' => array('id' => $id, 'id_usuario' => $user['id']))); 
           if ( !$despesa ) {
               throw new NotFoundException('Despesa inválida');
           } else {
               if ( $this->DespesasVariavei->delete($id) ) {
                   $this->Session->setFlash('<p>Despesa removida com sucesso!</p>', 'default', array('class' => 'notification msgsuccess'));
                   $this->redirect('/despesas/listar/');
               } else {
                   $this->Session->setFlash('<p>Não foi possível remover a despesa, por favor tente novamente.</p>', 'default', array('class' => 'notification msgerror'));
                   $this->redirect('/despesas/listar/');
               }
           } 
        } else {
            $this->redirect('/');
        }
    }
    
    /**
  * 
  * @param type $id
  * @throws NotFoundException
  */   
    public function delete_extra($id = null) {
        $user = $this->Session->read('user');
        if ( $user ) {
           $despesa = $this->DespesasExtra->find('all', array('conditions' => array('id' => $id, 'id_usuario' => $user['id']))); 
           if ( !$despesa ) {
               throw new NotFoundException('Despesa inválida');
           } else {
               if ( $this->DespesasExtra->delete($id) ) {
                   $this->Session->setFlash('<p>Despesa removida com sucesso!</p>', 'default', array('class' => 'notification msgsuccess'));
                   $this->redirect('/despesas/listar/');
               } else {
                   $this->Session->setFlash('<p>Não foi possível remover a despesa, por favor tente novamente.</p>', 'default', array('class' => 'notification msgerror'));
                   $this->redirect('/despesas/listar/');
               }
           } 
        } else {
            $this->redirect('/');
        }
    }
    
}
