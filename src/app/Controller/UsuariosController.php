<?php
App::uses('AppController', 'Controller');
/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 */
class UsuariosController extends AppController {
 
    /**
     * login method
     * 
     * @return void
     */    
        public function login () {
            if ( $this->Session->read('user') ) {
                $this->redirect('/despesas/relatorio/');
            }
            
            if ( $this->request->is('post') ) {
                $this->set('erroLogin', 1);
                if ( $result = $this->Usuario->findByEmail($this->request->data['Usuario']['email']) ) {
                    if ( md5($this->request->data['Usuario']['senha']) == $result['Usuario']['senha'] ) {
                        $dadosUsuario = array('id' => $result['Usuario']['id'], 'nome' => $result['Usuario']['nome'], 'email' => $result['Usuario']['email']);
                        $this->Session->write('user', $dadosUsuario );
                        $this->set('erroLogin', 0);
                        $this->redirect('/despesas/relatorio/');
                    } 
                }
            }
        }
        
        
  /**
   * logout method
   * 
   * @return void
   */      
        public function logout () {
            $this->Session->delete('user');
            $this->Session->setFlash('<p>Sessão finalizada com sucesso.</p>', 'default', array('class' => 'notification msgsuccess'));
            $this->redirect('/');
        }
        
   
 /**
  * cadastro method
  * 
  * @return void
  */      
        public function cadastro () {
            if ( $this->request->is('post') ) {
                
                $this->Usuario->create();
                
                if ( @$this->request->data['Usuario']['avatar'] && @$this->request->data['Usuario']['avatar']['type'] == 'image/png' || @$this->request->data['Usuario']['avatar']['type'] == 'image/jpeg' ) {
                    
                    move_uploaded_file($this->request->data['Usuario']['avatar']['tmp_name'], 'img/users/'.$this->request->data['Usuario']['nome'].'.jpg') ; 
                    $this->request->data['Usuario']['avatar'] = $this->request->data['Usuario']['nome'].'.jpg';
                    
                } else if ( @$this->request->data['Usuario']['avatar']['type'] != 'image/png' && @$this->request->data['Usuario']['avatar']['type'] != 'image/jpeg' ){
                    
                    $this->Session->setFlash('<p>Não foi possível realizar o upload da imagem. Tipo de arquivo não suportado. Tipos permitidos: jpeg e png. Enviado: '.@$this->request->data['Usuario']['avatar']['type'].'</p>', 
                                                        'default', array('class' => 'notification msgerror'));
                    $this->Usuario->data['Usuario']['avatar'] = '';
                    
                }
                
                if ( $this->Usuario->save($this->request->data) ) {
                    $this->request->data['Usuario']['id'] = $this->Usuario->id;
                    $this->Session->write('user', $this->request->data['Usuario']);
                    $this->Session->setFlash('<p>Cadastro realizado com sucesso!</p>', 'default', array('class' => 'notification msgsuccess'));
                    $this->redirect('/');
                } else {
                    $this->Session->setFlash('<p>Não foi possível realizar seu cadastro, por favor tente novamente!</p>', 'default', array('class' => 'notification msgerror'));
                }
            }
        }
       
}
