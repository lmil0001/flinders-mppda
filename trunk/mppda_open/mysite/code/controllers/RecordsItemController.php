<?php
/**
 * @package mppda
 */
class RecordsItemController extends ListingItemController {

	public static $allowed_actions = array(
		'scan',
		'keywords'
	);

	/**
	 * @return string
	 */
	public function scan($request) {
		$number = $request->param('ID');
		$scan   = $this->item->Scans()->find('Number', $number);

		if (!$scan) {
			$this->httpError(404, 'The requested scan could not be found.');
		}

		$data = new ArrayData(array(
			'Record' => $this->item,
			'Scan'   => $scan
		));
		return $data->renderWith('RecordScanPopup');
	}

	/**
	 * @return string
	 */
	public function keywords() {
		$taggly   = new Taggly();
		$keywords = array();
		$query    = new SQLQuery();
		$baseLink = Controller::join_links(Director::baseURL(), '/records/FilterForm?Keywords__ID=');

		$query = new SQLQuery();
		$query->select('"RecordKeyword"."ID" AS "ID"', '"Title"', 'COUNT(*) AS "Count"');
		$query->from('"Record_Keywords"');
		$query->innerJoin('RecordKeyword', '"RecordKeywordID" = "RecordKeyword"."ID"');
		$query->groupBy('"RecordKeyword"."ID"');

		foreach ($query->execute() as $row) {
			$keywords[] = array($row['Count'], $row['Title'], Controller::join_links(
				$baseLink . $row['ID']
			));
		}

		$cloud = $taggly->cloud($keywords, array(
			'shuffle'     => true,
			'max_font'    => 20,
			'find_Match'  => $this->item->Keywords()->map(),
			'match_Class' => 'current'
		));

		$data = new ArrayData(array(
			'Cloud' => $cloud
		));
		return $data->renderWith('RecordKeywordsCloud');
	}

}