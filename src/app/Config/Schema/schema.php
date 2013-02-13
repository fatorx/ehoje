<?php 
class AppSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $categorias_despesas_extras = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'nome' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);
	public $categorias_despesas_fixas = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'nome' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);
	public $categorias_despesas_variaveis = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'nome' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);
	public $contatos = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'usuario_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'motivo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'descricao' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_contatos_1' => array('column' => 'usuario_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);
	public $despesas_extras = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'id_usuario' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'id_categoria_despesa_extra' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'data' => array('type' => 'date', 'null' => false, 'default' => null),
		'valor' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'descricao' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_despesas_extras_1' => array('column' => 'id_categoria_despesa_extra', 'unique' => 0),
			'fk_despesas_extras_2' => array('column' => 'id_usuario', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);
	public $despesas_fixas = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'id_usuario' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'id_categoria_despesa_fixa' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'data' => array('type' => 'date', 'null' => false, 'default' => null),
		'valor' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'descricao' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_despesas_fixas_1' => array('column' => 'id_categoria_despesa_fixa', 'unique' => 0),
			'fk_despesas_fixas_2' => array('column' => 'id_usuario', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);
	public $despesas_variaveis = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'id_usuario' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'id_categoria_despesa_variavel' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'data' => array('type' => 'date', 'null' => false, 'default' => null),
		'valor' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'descricao' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_despesas_variaveis_1' => array('column' => 'id_categoria_despesa_variavel', 'unique' => 0),
			'fk_despesas_variaveis_2' => array('column' => 'id_usuario', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);
	public $investimentos = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'id_usuario' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'id_categoria_investimento' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'data' => array('type' => 'date', 'null' => false, 'default' => null),
		'valor' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'descricao' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_investimentos_1' => array('column' => 'id_categoria_investimento', 'unique' => 0),
			'fk_investimentos_2' => array('column' => 'id_usuario', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);
	public $receitas = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'id_usuario' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'id_categoria_receita' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'data' => array('type' => 'date', 'null' => false, 'default' => null),
		'valor' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'descricao' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_receitas_1' => array('column' => 'id_categoria_receita', 'unique' => 0),
			'fk_receitas_2' => array('column' => 'id_usuario', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);
	public $usuarios = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'nome' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'senha' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'avatar' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);
}
