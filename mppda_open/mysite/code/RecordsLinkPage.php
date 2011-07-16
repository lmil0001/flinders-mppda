<?php
/**
 * A simple meta-page which allows adding the records browser to the navigation,
 * and lets the user inject content above the content listing.
 *
 * @package mppda
 */
class RecordsLinkPage extends Page {

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Access');
		$fields->removeByName('ClassName');
		$fields->makeFieldReadonly('URLSegment');

		return $fields;
	}

	public function canCreate() {
		return false;
	}

	public function canDelete() {
		return false;
	}

	public function requireDefaultRecords() {
		if (!DataObject::get_one(__CLASS__)) {
			$records = new self();
			$records->Title = 'Records';
			$records->write();
			$records->publish('Stage', 'Live');

			DB::alteration_message('Created records page');
		}

		parent::requireDefaultRecords();
	}

}

class RecordsLinkPage_Controller extends Page_Controller {

	public function index() {
		return $this->redirect('records');
	}

}