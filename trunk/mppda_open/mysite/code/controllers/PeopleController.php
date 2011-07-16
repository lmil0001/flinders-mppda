<?php
/**
 * @package mppda
 */
class PeopleController extends ListingController {

	public function getItemClass() {
		return 'Person';
	}

	public function getListingFields() {
		return array(
			'Name'     => 'Full Name',
			'Surname'  => 'Surname',
			'BornYear' => 'Born',
			'DiedYear' => 'Died'
		);
	}

	public function getFacetableFields() {
		return array(
			'Organisations.Title' => 'Organisation'
		);
	}

	public function getFulltextFields() {
		return array('Name', 'About');
	}

	public function getMetaKeywordsFields() {
		return array('Name', 'About');
	}

	public function getSortableFields() {
		return array('Name', 'Surname', 'BornYear', 'DiedYear');
	}

	public function getDefaultSort() {
		return array('sort' => 'Surname', 'dir' => 'ASC');
	}

	public function Link() {
		return Controller::join_links(Director::baseURL(), 'people');
	}

}