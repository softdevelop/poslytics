<?php
/**
 * GeneraltableFixture
 *
 */
class GeneraltableFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'listtable_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'account_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'salary' => array('type' => 'float', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'listtable_id' => 1,
			'account_id' => 1,
			'salary' => 1
		),
	);

}
