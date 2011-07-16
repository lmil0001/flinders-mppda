<?php
/**
 * An image that has been scanned from a microfilm reel. It has a thumbnail
 * and links out to the full version.
 *
 * @package mppda
 */
class Scan extends DataObject {

	public static $db = array(
		'Number' => 'Int'
	);

	public static $has_one = array(
		'Thumbnail' => 'Image',
		'Reel'      => 'Reel'
	);

	public static $belongs_many_many = array(
		'Records' => 'Record'
	);

	public static $summary_fields = array(
		'ID',
		'Reel.ID',
		'Number'
	);

	public static $searchable_fields = array(
		'Reel.ID' => 'ExactMatchFilter',
		'Number'  => 'EndsWithFilter'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$folder = $this->Reel()->Folder();
		$upPath = substr(
			$folder->Filename,
			strlen(ASSETS_DIR) + 1);

		$fields->removeByName('ReelID');
		$fields->removeByName('Records');

		$fields->replaceField('Thumbnail', $thumb = new SimpleImageField('Thumbnail', 'Scan file'));
		$thumb->setFolderName($upPath);

		return $fields;
	}

	/**
	 * @return string
	 */
	public function Summary() {
		return sprintf('%s: Scan #%s', $this->Reel()->Title, $this->FrameReference());
	}

	/**
	 * @return string
	 */
	public function FrameReference() {
		return implode('-', array(
			$this->Reel()->Number, str_pad($this->Number, 4, '0', STR_PAD_LEFT)
		));
	}

}