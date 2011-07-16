<?php
/**
 * @package mppda
 */
class Film extends DataObject {

	public static $db = array(
		'Title'    => 'Varchar(100)',
		'Year'     => 'Int',
		'IMDBLink' => 'Varchar(255)',
                'IMDBID'    => 'Varchar(30)'
	);

	public static $indexes = array(
		'SearchFields' => array(
			'type'  => 'fulltext',
			'name'  => 'SearchFilters',
			'value' => 'Title'),
		'Title'  => true,
		'Year'   => true
	);

	public static $has_one = array(
		'Studio' => 'Organisation'
	);

	public static $belongs_many_many = array(
		'Records' => 'Record'
	);

	public static $extensions = array(
		'Commentable'
	);

	public static $summary_fields = array(
		'Title',
		'Studio.Title',
		'Year'
	);

	public static $searchable_fields = array(
		'Title',
		'Studio.ID'
	);

	public static $field_labels = array(
		'IMDBLink' => 'IMDB link',
                'IMDBID' => 'IMDB ID (for poster only)'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Records');

		$fields->addFieldToTab(
			'Root.Main',
			new DropdownField('Year', null, ArrayLib::valuekey(range(1915, 1945)), null, null, true),
			'IMDBLink',
                        'IMDBID'
		);
		$fields->addFieldToTab(
			'Root.Main', new HasOnePickerField($this, 'Studio')
		);

		return $fields;
	}

	public function getProvideComments() {
		return MppdaUtil::provide_comments($this);
	}

	/**
	 * @return string
	 */
	public function Link() {
		return Controller::join_links(Director::baseURL(), 'films', $this->ID);
	}

}