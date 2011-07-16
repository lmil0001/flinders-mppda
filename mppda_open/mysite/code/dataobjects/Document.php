<?php
/**
 * A document is simply a file with an optional title that is attached to one
 * or more record objects.
 *
 * @package mppda
 */
class Document extends DataObject {

	const DOCUMENTS_DIR = 'Documents';

	public static $db = array(
		'Title' => 'Varchar(100)'
	);

	public static $has_one = array(
		'File' => 'File'
	);

	public static $belongs_many_many = array(
		'Records' => 'Record'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		if ($this->isInDB()) {
			$fields->dataFieldByName('File')->setFolderName(self::DOCUMENTS_DIR);
		}

		return $fields;
	}

}