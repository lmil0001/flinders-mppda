<?php
/**
 * @package mppda
 */
class RecordsController extends ListingController {

	protected $itemController = 'RecordsItemController';

	public function __construct() {
		parent::__construct(SiteTree::get_by_link($this->Link()));
	}

	public function init() {
		parent::init();
		Requirements::themedCSS('RecordsController');
	}

	public function getItemClass() {
		return 'Record';
	}

	public function getListingFields() {
		return array(
			'Date'               => 'Date',
			'Type.Title'         => 'Type',
			'DescriptionSummary' => 'Description Summary'
		);
	}

	public function getFacetableFields() {
		return array(
			'Date'                => 'Year',
			'Reel.Number'         => 'Reel',
			'Type.Title'          => 'Record Type',
			'Keywords.Title'      => 'Keyword',
			'Organisations.Title' => 'Organisation',
			'Films.Title'         => 'Film',
			'People.FacetName'    => 'Person'
		);
	}

	public function getFacetFilters() {
		return array(
			'Date' => 'WithinYearFilter'
		);
	}

	public function getFulltextFields() {
		return array('ShortDescription', 'LongDescription', 'KeywordsText');
	}

	public function getMetaKeywordsFields() {
		return array('ShortDescription', 'KeywordsText');
	}

	public function getSortableFields() {
		return array('Date');
	}

	public function getDefaultSort() {
		return array('sort' => 'Date', 'dir' => 'ASC');
	}

	protected function getFacetMap($name, $query = null) {
		if ($name != 'Date') return parent::getFacetMap($name, $query);

		if (!$query) {
			$query  = new SQLQuery();
			$query->from($this->getItemClass());
		} else {
			$query = clone $query;
		}

		$conn = DB::getConn();
		$year = $conn->formattedDatetimeClause('"Date"', '%Y');

		$query->select(
			'COUNT(*)',
			"{$year} AS \"ID\"",
			"{$year} as \"Title\"");
		$query->orderby($year);
		$query->groupby($year);

		$map = new FacetingSQLMap($query);
		$map->setName($name);

		return $map;
	}

	public function FilterForm() {
		$form = parent::FilterForm();

		$frameRef = new FieldGroup(
			'Frame Reference',
			new DropdownField(
				'Reel__ID',
				'',
				$this->getFacetMap('Reel.Number'),
				null, null, '(Any reel)'),
			new TextField('FrameNum', ''));

		$form->Fields()->removeByName('Reel__ID');
		$form->Fields()->insertBefore($frameRef, 'Date');

		return $form;
	}

	protected function generateQuery($data, $form) {
		$query = parent::generateQuery($data, $form);

		if (isset($data['FrameNum']) && $data['FrameNum']) {
			$subquery = sprintf(
				'SELECT COUNT(*) FROM "Scan" WHERE "Scan"."ID" = "Record_Scans"."ScanID" AND "Number" = %d',
				$data['FrameNum']
			);

			$query->innerJoin('Record_Scans', sprintf(
				'"Record_Scans"."RecordID" = "Record"."ID" AND (%s) > 0',
				$subquery
			));
		}

		return $query;
	}

	public function Title() {
		return $this->data()->Title;
	}

	public function Link($action = null) {
		return Controller::join_links(Director::baseURL(), 'records', $action);
	}

}