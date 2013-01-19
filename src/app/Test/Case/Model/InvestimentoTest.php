<?php
App::uses('Investimento', 'Model');

/**
 * Investimento Test Case
 *
 */
class InvestimentoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.investimento'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Investimento = ClassRegistry::init('Investimento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Investimento);

		parent::tearDown();
	}

}
