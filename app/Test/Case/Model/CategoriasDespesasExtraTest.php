<?php
App::uses('CategoriasDespesasExtra', 'Model');

/**
 * CategoriasDespesasExtra Test Case
 *
 */
class CategoriasDespesasExtraTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categorias_despesas_extra'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CategoriasDespesasExtra = ClassRegistry::init('CategoriasDespesasExtra');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategoriasDespesasExtra);

		parent::tearDown();
	}

}
