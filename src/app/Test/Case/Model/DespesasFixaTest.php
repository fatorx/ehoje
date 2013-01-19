<?php
App::uses('DespesasFixa', 'Model');

/**
 * DespesasFixa Test Case
 *
 */
class DespesasFixaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.despesas_fixa'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DespesasFixa = ClassRegistry::init('DespesasFixa');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DespesasFixa);

		parent::tearDown();
	}

}
