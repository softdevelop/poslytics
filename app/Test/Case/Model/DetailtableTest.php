<?php
App::uses('Detailtable', 'Model');

/**
 * Detailtable Test Case
 *
 */
class DetailtableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.detailtable',
		'app.generaltable'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Detailtable = ClassRegistry::init('Detailtable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Detailtable);

		parent::tearDown();
	}

}
