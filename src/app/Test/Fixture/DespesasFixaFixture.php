<?php
/**
 * DespesasFixaFixture
 *
 */
class DespesasFixaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'data' => array('type' => 'date', 'null' => false, 'default' => null),
		'valor' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'tipo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'id_categoria_despesa_fixa' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'id_usuario' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_despesas_fixas_1' => array('column' => 'id_categoria_despesa_fixa', 'unique' => 0),
			'fk_despesas_fixas_2' => array('column' => 'id_usuario', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'data' => '2013-01-12',
			'valor' => 1,
			'tipo' => 'Lorem ipsum dolor sit amet',
			'id_categoria_despesa_fixa' => 1,
			'id_usuario' => 1
		),
	);

}
