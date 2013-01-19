<?php
App::uses('AppController', 'Controller');
/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 */
class UsuariosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Usuario->recursive = 0;
		$this->set('usuarios', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$this->set('usuario', $this->Usuario->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Usuario->create();
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Usuario->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->Usuario->delete()) {
			$this->Session->setFlash(__('Usuario deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Usuario was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        
      
    /**
     * 
     */    
        public function login () {
            if ( !$this->Session->read('user') ) {
                if ( $this->request->is('post') ) {
                    
                    $result = $this->Usuario->findByEmail($this->request->data['Usuario']['email']);
                    
                    if ( $result )  {
                        if ( md5($this->request->data['Usuario']['senha']) == $result['Usuario']['senha'] ) {
                            $dadosUsuario = array('id' => $result['Usuario']['id'], 'nome' => $result['Usuario']['nome'], 'email' => $result['Usuario']['email']);
                            if ( $this->inicia_sessao($dadosUsuario) ) {
                                $this->redirect('/despesas/relatorio/');
                            } else {
                                $this->set('erroLogin', 1);
                            }
                        } else {
                            $this->set('erroLogin', 1);
                        } 
                    } else {
                        $this->set('erroLogin', 1);
                    }
                }
            } else {
                $this->redirect('/despesas/relatorio/');
            }
        }
        
       
  /**
   * inicia_sessao method
   * 
   * @param type $dadosUsuario
   * @return boolean
   */      
        private function inicia_sessao ( $dadosUsuario ) {
            if ( $this->Session->write('user', $dadosUsuario) ) {
                return true;
            }
        }
        
        
  /**
   * 
   */      
        public function logout () {
            $this->Session->delete('user');
            $this->Session->setFlash('Sessão finalizada com sucesso.', 'default', array('class' => 'notification msgsuccess', 'before' => '<p>', 'after' => '</p>'));
            $this->redirect('/');
        }
        
   
 /**
  * cadastro method
  * 
  */      
        public function cadastro () {
            if ( !$this->Session->read('user') ) {
                if ( $this->request->is('post') ) {
                    debug($this->request->data);
                    $this->request->data['Usuario']['senha'] = md5($this->request->data['Usuario']['senha']);
                    
                    $this->Usuario->create();
                    if ( $this->Usuario->save($this->request->data) ) {
                        $this->request->data['Usuario']['id'] = $this->Usuario->id;
                        if ( $this->inicia_sessao($this->request->data['Usuario']) ) {
                            $this->Session->setFlash('Cadastro realizado com sucesso!', 'default', array('class' => 'notification msgsuccess', 'before' => '<p>', 'after' => '</p>'));
                            $this->redirect('/');
                        }
                    } else {
                        $this->Session->setFlash('Não foi possível realizar seu cadastro, por favor tente novamente!', 'default', array('class' => 'notification msgerror', 'before' => '<p>', 'after' => '</p>'));
                    }
                }
            } else {
                $this->redirect('/');
            }
        }
       
}
