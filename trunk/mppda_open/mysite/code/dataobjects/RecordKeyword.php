<?php
/**
 * A keyword that can be attached to several records.
 *
 * @package mppda
 */
class RecordKeyword extends DataObject {

	public static $db = array(
		'Title' => 'Varchar(100)'
	);

	public static $belongs_many_many = array(
		'Records' => 'Record'
	);

	public static $indexes = array(
		'Title' => true
	);

	public static $searchable_fields = array(
		'Title'
	);

	public static $summary_fields = array(
		'Title',
		'RecordsCount'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$base   = Controller::join_links(Director::baseURL(), 'admin/records/Record/');

		$records = new TableListField(
			'Records',
			'Record',
			null,
			$this->getManyManyFilter('Records', null),
			null,
			$this->getManyManyJoin('Records', null)
		);
		$records->setPermissions(array('show'));
		$records->setFieldFormatting(array(
			'DescriptionSummary' => '<a href=\"' . $base . '$ID/edit\">$DescriptionSummary</a>'
		));

		$fields->removeByName('Records');
		$fields->addFieldsToTab('Root.Main', array(
			new HeaderField('LinkedRecordsHeader', 'Linked Records'),
			$records
		));

		return $fields;
	}

}