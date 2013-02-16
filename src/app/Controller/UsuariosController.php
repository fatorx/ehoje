<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

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
            
            $this->set('usuarios', $this->Usuario->find('count'));
            if ( $this->request->is('post') ) {
                $this->set('erroLogin', 1);
                if ( $result = $this->Usuario->findByEmail($this->request->data['Usuario']['email']) ) {
                    if ( md5($this->request->data['Usuario']['senha']) == $result['Usuario']['senha'] ) {
                        $dadosUsuario = array(  'id' => $result['Usuario']['id'], 
                                                'nome' => $result['Usuario']['nome'], 
                                                'email' => $result['Usuario']['email'],
                                                'avatar' => $result['Usuario']['avatar']);
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
            $this->set('usuarios', $this->Usuario->find('count'));
            if ( $this->request->is('post') ) {
                
                $this->Usuario->create();
                
                if ( @$this->request->data['Usuario']['avatar']['tmp_name'] != '' && @$this->request->data['Usuario']['avatar']['type'] == 'image/png' || @$this->request->data['Usuario']['avatar']['type'] == 'image/jpeg' ) {
                    move_uploaded_file($this->request->data['Usuario']['avatar']['tmp_name'], 'img/users/'.$this->request->data['Usuario']['nome'].'.jpg') ; 
                    $this->request->data['Usuario']['avatar'] = $this->request->data['Usuario']['nome'].'.jpg';
                    
                } else if ( @$this->request->data['Usuario']['avatar']['type'] != 'image/png' && @$this->request->data['Usuario']['avatar']['type'] != 'image/jpeg' ){
                    
                    $this->Session->setFlash('<p>Não foi possível realizar o upload da imagem. Tipo de arquivo não suportado. Tipos permitidos: jpeg e png. Enviado: '.@$this->request->data['Usuario']['avatar']['type'].'</p>', 
                                                        'default', array('class' => 'notification msgerror'));
                    $this->Usuario->data['Usuario']['avatar'] = '';
                    
                }
                if (!is_string(@$this->request->data['Usuario']['avatar'])) { 
                    $this->request->data['Usuario']['avatar'] = null;
                }
                if ( $this->Usuario->save($this->request->data) ) {
                    if ($this->_sendEmailToUser($this->request->data['Usuario'])) {
                        $this->request->data['Usuario']['id'] = $this->Usuario->id;
                        $this->Session->write('user', $this->request->data['Usuario']);
                        $this->Session->setFlash('<p>Cadastro realizado com sucesso!</p>', 'default', array('class' => 'notification msgsuccess'));
                        $this->redirect('/');
                    } else {
                        $this->Session->setFlash('<p>:( Seu cadastro foi concluído, mas não conseguimos lhe enviar o email de boas vindas</p>', 'default', array('class' => 'notification msginfo'));
                        $this->redirect('/');
                    }
                } else {
                    $this->Session->setFlash('<p>Não foi possível realizar seu cadastro, por favor tente novamente!</p>', 'default', array('class' => 'notification msgerror'));
                }
            }
        }
        
        
        public function minhaConta() {
            $user = $this->Session->read('user');
            if ( $user ) {
                if ( $this->request->is('post') || $this->request->is('put') ) {
                    $this->request->data['Usuario']['id'] = $user['id'];
                    
                    $avatar = $this->request->data['Usuario']['avatar'];
                    $this->request->data['Usuario']['avatar'] = $this->request->data['Usuario']['nome'].'.jpg';
                    if ( $avatar['name'] && $avatar['tmp_name'] ) {
                        if (!move_uploaded_file($avatar['tmp_name'], 'img/users/'.$this->request->data['Usuario']['nome'].'.jpg') ) {
                            unset($this->request->data['Usuario']['avatar']);
                        }
                    }
                    
                    $this->Usuario->create();
                    if ( $this->Usuario->save($this->request->data) ) {
                        $this->Session->setFlash('<p>Dados alterado com sucesso!</p>', 'default', array('class' => 'notification msgsuccess'));
                        $this->redirect('/despesas/relatorio/');
                    } else {
                        $this->Session->setFlash('<p>Não foi possível alterar os dados, por favor tente novamente.</p>', 'default', array('class' => 'notification msgerror'));
                        $this->redirect('/usuarios/minhaConta');
                    }
                    
                } else {
                    $this->request->data = $this->Usuario->read(null, $user['id']);
                }
            } else {
                $this->redirect('/');
            }
        }
        
        
 /**
  * 
  * @param object $user
  * @return boolean
  */       
        protected function _sendEmailToUser($user) {
                $email = new CakeEmail;
                $email->config('default');
                
                $email->from(array('noreply@ehoje.net' => 'Ehoje? quanto gastei?'));
                $email->to($user['email']);
                $email->subject('Cadastro realizado');
                $email->message('Obrigado por utilizar o Ehoje?!');
                $email->emailFormat('html');
                
                $content = 'Olá, '.$user['nome'].'! <br /><br />';
                $content .= 'Seja bem vindo(a) ao Ehoje?! Aqui você poderá controlar suas finanças pessoais de forma simples e prática. <br /><br />';
                $content .= 'Esperamos que nossa ferramenta seja muito útil à você, se gostar da mesma, por favor indique aos seus conhecidos. Gostaríamos de conquistar cada vez mais usuários ;) .<br /><br />';
                $content .= '<b>Seus dados de acesso:</b><br />';
                $content .= 'Endereço de acesso: <a href="http://ehoje.net">http://ehoje.net</a><br />';
                $content .= 'Login: '.$user['email'].'<br />';
                $content .= 'Senha: '.$user['senha'].'<br />';
                $content .= '<br /><br /><br />';
                $content .= '<font size="2">Mensagem gerada automaticamente, não responda este email.</font>';
                
                
                if ($email->send($content) ) {
                    return true;
                }
                    
        }
       
}
