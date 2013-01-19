<?php
App::uses('DespesasExtra', 'Model');

/**
 * DespesasExtra Test Case
 *
 */
class DespesasExtraTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.despesas_extra'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DespesasExtra = ClassRegistry::init('DespesasExtra');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DespesasExtra);

		parent::tearDown();
	}

}
