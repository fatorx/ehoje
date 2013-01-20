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

}
