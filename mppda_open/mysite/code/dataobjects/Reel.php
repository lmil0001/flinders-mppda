<?php
/**
 * A reel that a microfilm record was retrieved from.
 *
 * @package mppda
 */
class Reel extends DataObject {

	public static $db = array(
		'Title'  => 'Varchar(100)',
		'Number' => 'Int'
	);

	public static $default_sort = '"Number"';

	public static $has_one = array(
		'Folder' => 'Folder'
	);

	public static $has_many = array(
		'Scans' => 'Scan'
	);

	public static $indexes = array(
		'Number' => true
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeByName('Folder');
		return $fields;
	}

	public function getCMSValidator() {
		return new RequiredFields('Title');
	}

	public function onBeforeWrite() {
		if (!$this->FolderID) {
			$name = preg_replace('/ +/', '-', $this->Title);
			$name = preg_replace('/[^A-Za-z0-9.+_\-]/', '', $name);

			$folder = Folder::findOrMake("Reels/$name");
			$this->FolderID = $folder->ID;

			$folder->Title = $this->Title;
			$folder->write();
		} elseif ($this->isChanged('Title')) {
			$this->Folder()->Title = $this->Title;
			$this->Folder()->Name  = $this->Title;
			$this->Folder()->write();
		}

		parent::onBeforeWrite();
	}

}