<?php
App::uses('DespesasVariavei', 'Model');

/**
 * DespesasVariavei Test Case
 *
 */
class DespesasVariaveiTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.despesas_variavei'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DespesasVariavei = ClassRegistry::init('DespesasVariavei');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DespesasVariavei);

		parent::tearDown();
	}

}
