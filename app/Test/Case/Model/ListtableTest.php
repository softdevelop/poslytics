<?php
App::uses('Listtable', 'Model');

/**
 * Listtable Test Case
 *
 */
class ListtableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.listtable',
		'app.generaltable',
		'app.user',
		'app.job',
		'app.post',
		'app.category',
		'app.detailtable'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Listtable = ClassRegistry::init('Listtable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Listtable);

		parent::tearDown();
	}

}
