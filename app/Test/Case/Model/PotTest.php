<?php
App::uses('Pot', 'Model');

/**
 * Pot Test Case
 *
 */
class PotTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pot',
		'app.user',
		'app.posts_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pot = ClassRegistry::init('Pot');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pot);

		parent::tearDown();
	}

}
