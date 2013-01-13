<?php
App::uses('CategoriasDespesasFixa', 'Model');

/**
 * CategoriasDespesasFixa Test Case
 *
 */
class CategoriasDespesasFixaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categorias_despesas_fixa'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CategoriasDespesasFixa = ClassRegistry::init('CategoriasDespesasFixa');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategoriasDespesasFixa);

		parent::tearDown();
	}

}
