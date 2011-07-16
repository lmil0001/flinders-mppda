<?php
/**
 * Handles listing and displaying films.
 *
 * @package mppda
 */
class FilmsController extends ListingController {

	public function getItemClass() {
		return 'Film';
	}

	public function getListingFields() {
		return array(
			'Title'        => 'Title',
			'Year'         => 'Year',
			'Studio.Title' => 'Studio'
		);
	}

	public function getFacetableFields() {
		return array(
			'Year'         => 'Year',
			'Studio.Title' => 'Studio'
		);
	}

	public function getFulltextFields() {
		return array('Title');
	}

	public function getMetaKeywordsFields() {
		return array('Title');
	}

	public function getSortableFields() {
		return array('Title', 'Year');
	}

	public function getDefaultSort() {
		return array('sort' => 'Title', 'dir' => 'ASC');
	}

	public function Link() {
		return Controller::join_links(Director::baseURL(), 'films');
	}

}