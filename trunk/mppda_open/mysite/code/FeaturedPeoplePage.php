<?php
/**
 *
 *
 * @package mppda
 */
class FeaturedPeoplePage extends Page {

	public static $many_many = array(
		'FeaturedPeople' => 'Person'
	);

	public static $many_many_extraFields = array(
		'FeaturedPeople' => array('Sort' => 'Int')
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->addFieldToTab('Root.Content',
			new Tab('FeaturedPeople'), 'Metadata');
		$fields->addFieldToTab('Root.Content.FeaturedPeople',
			new ManyManyPickerField($this, 'FeaturedPeople', 'Featured People', array(
				'Sortable' => true
			)));

		return $fields;
	}

	public function FeaturedPeople() {
		return $this->getManyManyComponents(
			'FeaturedPeople',
			null,
			'"FeaturedPeoplePage_FeaturedPeople"."Sort"'
		);
	}

}

class FeaturedPeoplePage_Controller extends Page_Controller {
}