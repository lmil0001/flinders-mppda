<?php
/**
 * @package mppda
 */
class OrganisationsController extends ListingController {

	public function getItemClass() {
		return 'Organisation';
	}

	public function getListingFields() {
		return array(
			'Title'    => 'Title',
			'Division' => 'Division'
		);
	}

	public function getFulltextFields() {
		return array('Title', 'Division', 'Description');
	}

	public function getMetaKeywordsFields() {
		return array('Title', 'Division', 'Description');
	}

	public function getSortableFields() {
		return array('Title');
	}

	public function getDefaultSort() {
		return array('sort' => 'Title', 'dir' => 'ASC');
	}

	public function Link() {
		return Controller::join_links(Director::baseURL(), 'organisations');
	}

}