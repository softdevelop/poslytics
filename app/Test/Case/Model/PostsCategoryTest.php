<?php
App::uses('PostsCategory', 'Model');

/**
 * PostsCategory Test Case
 *
 */
class PostsCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.posts_category',
		'app.pot'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PostsCategory = ClassRegistry::init('PostsCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PostsCategory);

		parent::tearDown();
	}

}
