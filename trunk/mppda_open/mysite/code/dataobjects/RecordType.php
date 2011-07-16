<?php
/**
 * A type of {@link Record} (letter, memo etc.).
 *
 * @package mppda
 */
class RecordType extends DataObject {

	public static $db = array(
		'Title'       => 'Varchar(255)',
		'Description' => 'Text'
	);

	public static $indexes = array(
		'Title' => true
	);

	public static $searchable_fields = array(
		'Title',
		'Description'
	);

	public static $summary_fields = array(
		'Title'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeByName('Records');
		return $fields;
	}

}