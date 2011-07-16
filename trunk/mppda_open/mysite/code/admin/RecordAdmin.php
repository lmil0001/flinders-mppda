<?php
/**
 * Allows administrators to manage MPPDA records and related objects.
 *
 * @package mpdaa
 */
class RecordAdmin extends ModelAdmin {

	public static $menu_title = 'Records';
	public static $url_segment = 'records';

	public static $managed_models = array(
		'Record'        => array(
			'title' => 'Records',
			'record_controller' => 'RecordAdmin_RecordRecord'),
		'RecordType'    => array('title' => 'Record Types'),
		'RecordKeyword' => array(
			'title' => 'Record Keywords',
			'collection_controller' => 'RecordAdmin_KeywordCollection'),
		'Reel'          => array('title' => 'Reels'),
		'Document'      => array('title' => 'Documents'),
		'Film'          => array('title' => 'Films'),
		'Organisation'  => array('title' => 'Organisations'),
		'Person'        => array('title' => 'People')
	);

	public static $model_importers = array();

	public function init() {
		parent::init();

		Requirements::javascript(THIRDPARTY_DIR . '/jquery-metadata/jquery.metadata.js');
		Requirements::javascript('mysite/javascript/RecordAdmin.js');
		Requirements::css('mysite/css/RecordAdmin.css');
		HtmlEditorConfig::set_active('simple');
	}

}

class RecordAdmin_KeywordCollection extends ModelAdmin_CollectionController {
	public function getResultsTable($search) {
		$table = parent::getResultsTable($search);

		$query = $table->getQuery();
		$count = 'SELECT COUNT(*) FROM "Record_Keywords" WHERE "RecordKeywordID" = "RecordKeyword"."ID"';
		$query->select[] = "($count) AS RecordsCount";
		$table->setCustomQuery($query);

		return $table;
	}
}

class RecordAdmin_RecordRecord extends ModelAdmin_RecordController {
	public function EditForm() {
		$form   = parent::EditForm();
		$record = $this->currentRecord;

		$prev = DataObject::get_one('Record', '"ID" < ' . $record->ID, true, '"ID" DESC');
		$next = DataObject::get_one('Record', '"ID" > ' . $record->ID, true, '"ID" ASC');

		if ($next) {
			$link   = $this->parentController->Link("{$next->ID}/edit");
			$action = new FormAction('nextRecord', 'Next Record');
			$action->addExtraClass(sprintf("{ link: '%s' }", Convert::raw2js($link)));
			$form->Actions()->insertFirst($action);
		}

		if ($prev) {
			$link   = $this->parentController->Link("{$prev->ID}/edit");
			$action = new FormAction('prevRecord', 'Previous Record');
			$action->addExtraClass(sprintf("{ link: '%s' }", Convert::raw2js($link)));
			if (!$next) $action->addExtraClass('only');
			$form->Actions()->insertFirst($action);
		}

		return $form;
	}
}
