<?php
App::uses('Generaltable', 'Model');

/**
 * Generaltable Test Case
 *
 */
class GeneraltableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.generaltable',
		'app.listtable',
		'app.account',
		'app.user',
		'app.detailtable'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Generaltable = ClassRegistry::init('Generaltable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Generaltable);

		parent::tearDown();
	}

}
