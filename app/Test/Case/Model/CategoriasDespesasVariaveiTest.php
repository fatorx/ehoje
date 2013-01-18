<?php
App::uses('CategoriasDespesasVariavei', 'Model');

/**
 * CategoriasDespesasVariavei Test Case
 *
 */
class CategoriasDespesasVariaveiTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categorias_despesas_variavei'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CategoriasDespesasVariavei = ClassRegistry::init('CategoriasDespesasVariavei');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategoriasDespesasVariavei);

		parent::tearDown();
	}

}
