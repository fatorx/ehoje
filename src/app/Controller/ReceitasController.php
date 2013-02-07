<?php
App::uses('AppController', 'Controller');
/**
 * Receitas Controller
 *
 * @property Receita $Receita
 */
class ReceitasController extends AppController {

    
    var $uses = array('Receita', 'CategoriasReceita');

/**
 * nova method
 *
 * @return void
 */
	public function nova() {
            if ( $this->Session->read('user') ) {
                $this->set('receitas', $this->CategoriasReceita->find('list', array('fields' => array('id', 'nome'), 'order' => 'nome ASC')) );
                if ($this->request->is('post')) {
                        $this->request->data['Receita']['data'] = date('Y-m-d', strtotime($this->request->data['Receita']['data']));
                        $this->request->data['Receita']['valor'] = str_replace( ',', '.', $this->request->data['Receita']['valor'] );
                        $this->request->data['Receita']['id_categoria_receita'] = $this->request->data['Receita']['tipo'];
                        $this->request->data['Receita']['id_usuario'] = $this->Session->read('user.id');
                       
			$this->Receita->create();

			if ($this->Receita->save($this->request->data)) {
				$this->Session->setFlash('<p>Receita contabilizada com sucesso!</p>', 'default', array( 'class' => 'notification msgsuccess' ));
                                $this->redirect('/');
			} else {
				$this->Session->setFlash('<p>Não foi possível gravar sua receita, por favor tente novamente!</p>', 'default', array( 'class' => 'notification msgerror' ));
			}
		}
            } else {
                $this->redirect('/');
            }
	}
        
        
        
 /**
  * 
  */       
        public function listar() {
            $user = $this->Session->read('user');
            if ( $user ) {
                $this->Receita->recursive = 0;
                $receitas = $this->paginate('Receita',array('id_usuario' => $user['id']));
                $categorias = $this->CategoriasReceita->find('all');

                $this->set(compact('receitas', 'categorias'));
            } else {
                $this->redirect('/');
            }
        }
        
        
        
  /**
   * 
   * @param type $id
   * @throws NotFoundException
   */      
        public function editar($id = null) {
            $this->Receita->id = $id;
            if ( !$this->Receita->exists() ) {
                throw new NotFoundException('Receita inválida');
            }
            if ( $this->request->is('post') || $this->request->is('put') ) {
                debug($this->request->data);
                $this->request->data['Receita']['id'] = $id;
                $this->Receita->create();
                if ( $this->Receita->save($this->request->data) ) {
                    $this->Session->setFlash('Receita editada com sucesso!', 'default', array('class' => 'notification msgsuccess'));
                }
            } else {
                $this->request->data = $this->Receita->read(null, $id);
                $this->set('receitas', $this->CategoriasReceita->find('list', array('fields' => array('id','nome'))));
            }
        }
        
        
 /**
  * delete method
  * 
  * @param int $id
  * @throws NotFoundException
  */       
        public function delete($id) {
            $this->Receita->id = $id;
            if ( !$this->Receita->exists() ) {
                throw new NotFoundException('Receita não localizada');
            }
            if ( $this->Receita->delete($id) ) {
                $this->Session->setFlash('<p>Receita removida com sucesso!</p>', 'default', array('class' => 'notification msgsuccess'));
                $this->redirect(array('action' => 'listar'));
            } else {
                $this->Session->setFlash('<p>Não foi possível remover a receita, por favor tente novamente.</p>', 'default', array('class' => 'notification msgerror'));
            }
        }

}
