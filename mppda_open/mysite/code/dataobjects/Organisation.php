<?php
/**
 * @package mppda
 */
class Organisation extends DataObject {

	public static $db = array(
		'Title'       => 'Varchar(100)',
		'Division'    => 'Varchar(100)',
		'Description' => 'HTMLText',
		'Comments'    => 'HTMLText'
	);

	public static $indexes = array(
		'SearchFields' => array(
			'type'  => 'fulltext',
			'name'  => 'SearchFilters',
			'value' => 'Title, Division, Description'),
		'Title' => true
	);

	public static $many_many = array(
		'People' => 'Person'
	);

	public static $belongs_many_many = array(
		'Records' => 'Record'
	);

	public static $extensions = array(
		'Commentable'
	);

	public static $summary_fields = array(
		'Title',
		'Division'
	);

	/**
	 * Returns the organisation title with the division included.
	 *
	 * @return string
	 */
	public function getFullTitle() {
		if ($this->Division) {
			return sprintf('%s (%s)', $this->Title, $this->Division);
		} else {
			return $this->Title;
		}
	}

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('People');
		$fields->removeByName('Records');

		$fields->dataFieldByName('Description')->setRows(15);
		$fields->dataFieldByName('Comments')->setRows(10);

		return $fields;
	}

	public function getCMSExtraFields() {
		return new FieldSet(
			new HeaderField('AssociateOrgHeader', 'Associate Organisation'),
			new ReadonlyField('FullTitle', 'Title'),
			new DropdownField('Correspondence', null, array(
				'None'     => 'None',
				'Sender'   => 'Sender',
				'Receiver' => 'Receiver'
			), 'None')
		);
	}

	public function getProvideComments() {
		return MppdaUtil::provide_comments($this);
	}

	/**
	 * @return string
	 */
	public function Summary() {
		return $this->getFullTitle();
	}

	/**
	 * @return string
	 */
	public function Link() {
		return Controller::join_links(Director::baseURL(), 'organisations', $this->ID);
	}

}