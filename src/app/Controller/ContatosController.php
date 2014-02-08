<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Contatos Controller
 *
 * @property Contato $Contato
 */
class ContatosController extends AppController {

    
    public function beforeFilter() {
            if ( 2 == Configure::read('debug') ) {
               $this->Contato->setDataSource('develop');
            }
           parent::beforeFilter();
    }
    
    /**
 * add method
 *
 * @return void
 */
	public function novo() {
		if ($this->request->is('post')) {
			$this->Contato->create();
			if ($this->Contato->save($this->request->data)) {
                                $dadosUsuario = array('nome' => $this->Session->read('user.nome'), 'email' => $this->Session->read('user.email'));
                                $this->_sendEmailToDeveloper($dadosUsuario, $this->request->data['Contato']);
                                
				$this->Session->setFlash('<p>Agradecemos seu contato ;)</p>', 'default', array('class' => 'notification msgsuccess'));
				$this->redirect('/');
			} else {
				$this->Session->setFlash('<p>:( Não foi possível gravar seu contato, por favor tente novamente</p>', 'default', array('class' => 'notification msgsuccess'));
			}
		}
		$usuarios = $this->Contato->Usuario->find('list');
		$this->set(compact('usuarios'));
	}
        
        
        protected function _sendEmailToDeveloper($dadosUsuario, $dadosDoContato) {
                $email = new CakeEmail;
                $email->config('default');
                
                $email->from(array('noreply@ehoje.net' => 'Contato - Ehoje'));
                $email->to('andrecardosodev@gmail.com');
                $email->subject('Contato do Ehoje');
                $email->emailFormat('html');
                
                $content = 'Olá, Administrador. Há um novo contato gerado através do ehoje. <br /><br />';
                $content .= '<b>Dados do contato: </b><br />';
                $content .= 'Usuário: '.$dadosUsuario['nome'].' <'.$dadosUsuario['email'].'><br />';
                $content .= 'Motivo: '.$dadosDoContato['motivo'].'<br />';
                $content .= 'Descrição: '.$dadosDoContato['descricao'].'<br />';
                $content .= '<br /><br /><br />';
                $content .= '<font size="2">Mensagem gerada automaticamente, não responda este email.</font>';
                
                $email->send($content);
        }
 
}
