<?php
/**
 * A record that represents a collection of scan images, with associated links
 * and metadata.
 *
 * @package mppda
 * @todo    Support attaching people to this record.
 */
class Record extends DataObject {

	public static $db = array(
		'ShortDescription' => 'Text',
		'LongDescription'  => 'HTMLText',
		'KeywordsText'     => 'Text',
		'Date'             => 'Date',
		'InfoLink'         => 'Varchar(255)',
		'FrameStart'       => 'Varchar(15)',
		'FrameEnd'         => 'Varchar(15)',
		'Todo'             => 'Boolean',
		'LegacyID'         => 'Int',
		'Index'            => 'Varchar(100)',
		'Year'             => 'Varchar(4)',
		'Comments'         => 'Text'
	);

	public static $indexes = array(
		'SearchFields' => array(
			'type'  => 'fulltext',
			'name'  => 'SearchFilters',
			'value' => 'ShortDescription,LongDescription,KeywordsText'),
		'Date' => true
	);

	public static $has_one = array(
		'Reel' => 'Reel',
		'Type' => 'RecordType'
	);

	public static $has_many = array(
		'TranscriptLinks' => 'TranscriptLink'
	);

	public static $many_many = array(
		'Keywords'      => 'RecordKeyword',
		'Scans'         => 'Scan',
		'Documents'     => 'Document',
		'Films'         => 'Film',
		'Organisations' => 'Organisation',
		'People'        => 'Person'
	);

	public static $many_many_extraFields = array(
		'Organisations' => array(
			'Correspondence' => 'Enum("Sender, Receiver, None", "None")'
		),
		'People' => array(
			'OrganisationID' => 'Int',
			'CustomRole'     => 'Varchar(255)',
			'Correspondence' => 'Enum("Sender, Receiver, None", "None")'
		),
		'Documents' => array(
			'Sort' => 'Int'
		)
	);

	public static $extensions = array(
		'Commentable'
	);

	public static $searchable_fields = array(
		'ID' => array('field' => 'TextField'),
		'ShortDescription',
		'Date',
		'Reel.ID',
		'Todo'
	);

	public static $summary_fields = array(
		'ID',
		'DescriptionSummary',
		'Date',
		'Reel.Title'
	);

	/**
	 * @return string
	 */
	public function getDescriptionSummary() {
		return $this->obj('ShortDescription')->LimitCharacters(120);
	}

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Keywords');
		$fields->removeByName('KeywordsText');
		$fields->removeByName('TranscriptLinks');

		$fields->dataFieldByName('Date')->setConfig('showcalendar', true);

		$fields->fieldByName('Root.Main')->getChildren()->changeFieldOrder(array(
			'Date', 'TypeID', 'ShortDescription', 'LongDescription','Todo',
			'ReelID', 'FrameStart', 'FrameEnd'
		));

		if ($this->ID) {
			$idLink = new ReadonlyField(
				'RecordID',
				'Record ID',
				"<a href=\"{$this->Link()}\" target=\"_blank\">Record #{$this->ID}</a>"
			);
			$idLink->dontEscape = true;
			$fields->addFieldToTab('Root.Main', $idLink,'Date');
		}

		$keywords = new TagField('Keywords', 'Keywords (comma separated)');
		$keywords->setSeparator(',');
		$fields->addFieldToTab('Root.Main', $keywords, 'ShortDescription');

		$fields->insertBefore(new HeaderField('RecordTitle', 'Record'), 'Title');
		$fields->insertBefore(new HeaderField('ReelTitle', 'Reel'), 'ReelID');

		$fields->dataFieldByName('LongDescription')->setRows(20);
		$fields->dataFieldByName('Todo')->setTitle('This record still has work ' .
			'to do on it');

		$fields->addFieldsToTab('Root.Main', array(
			new HeaderField('LinksHeader', 'Links'),
			new TextField('InfoLink', 'Further information link'),
			new HeaderField('TranscriptLinksHeader', 'Transcript Links', 4),
			new TableField(
				'TranscriptLinks', 'TranscriptLink', null,
				array(
					'Title' => 'TextField',
					'Link'  => 'TextField'
				),
				'ParentID', $this->ID
			)
		));

		if ($this->ID) {
			$fields->addFieldToTab(
				'Root.Scans',
				new ManyManyPickerField($this, 'Scans', 'Scans')
			);

			$fields->removeByName('Films');
			$fields->removeByName('Organisations');
			$fields->removeByName('People');

			$fields->addFieldsToTab('Root.Associations', array(
				new ManyManyPickerField($this, 'Films'),
				new ManyManyPickerField($this, 'Organisations', null, array(
					'ExtraFields' => 'getCMSExtraFields'
				)),
				new ManyManyPickerField($this, 'People', null, array(
					'ExtraFields' => 'getCMSExtraFields'
				))
			));

			$fields->removeByName('Documents');
			$fields->addFieldToTab('Root.Documents', new ManyManyPickerField(
				$this, 'Documents', null, array('Sortable' => true)
			));
		} else {
			$fields->addFieldToTab('Root.Scans', new LiteralField(
				'ScanNote', '<p>You can add reel scans after you save for the ' .
				'first time.</p>'
			));
			$fields->addFieldToTab('Root.Associations', new LiteralField(
				'ScanNote', '<p>You can add associations after you save for the ' .
				'first time.</p>'
			));
			$fields->addFieldToTab('Root.Documents', new LiteralField(
				'DocumentNote', '<p>You can add documents after you save for ' .
				'the first time.</p>'
			));
		}

		$fields->addFieldsToTab('Root.Legacy', array(
			new ReadonlyField('LegacyID', 'Legacy record ID'),
			new ReadonlyField('Index', 'Index'),
			new ReadonlyField('Year', 'Year'),
			new ReadonlyField('Comments', 'Comments')
		));

		$root = $fields->fieldByName('Root');
		$tabs = $root->getChildren()->toArray();

		foreach ($tabs as $tab) {
			$tabs[$tab->Name()] = $tab;
		}

		$root->getChildren()->emptyItems();
		foreach (array('Main', 'Scans', 'Associations', 'Documents', 'Behaviour', 'Legacy') as $tab) {
			$root->getChildren()->push($tabs[$tab]);
		}

		return $fields;
	}

	public function getCMSValidator() {
		return new RequiredFields('ReelID');
	}

	protected function onBeforeWrite() {
		// Save an enumerated list of the keywords and record type title
		// attached to this object in a text column so it can be indexed.
		$this->KeywordsText = implode(', ', $this->Keywords()->map());

		if ($this->TypeID) {
			$this->KeywordsText = $this->KeywordsText . ', ' . $this->Type()->Title;
		}

		parent::onBeforeWrite();
	}

	/**
	 * @return DataObjectSet
	 */
	public function Documents() {
		return $this->getManyManyComponents('Documents', null, '"Record_Documents"."Sort"');
	}

	public function getTitle() {
		return 'Record #' . $this->ID;
	}

	public function getProvideComments() {
		return MppdaUtil::provide_comments($this);
	}

	/**
	 * Returns all organisations and people attached to this record with a
	 * specific corresponsdence value.
	 *
	 * @param string $type
	 * @return DataObjectSet
	 */
	public function CorrespondenceEntities($type) {
		$result = new DataObjectSet();
		$base   = Controller::join_links(Director::baseURL(), 'records/FilterForm');

		foreach ($this->Organisations() as $org) {
			if ($org->Correspondence == $type) $result->push(new ArrayData(array(
				'Title' => $org->getFullTitle(),
				'Link'  => $org->Link()
			)));
		}

		foreach ($this->People() as $person) {
			if ($person->Correspondence == $type) $result->push(new ArrayData(array(
				'Title' => $person->Summary(),
				'Link'  => $person->Link()
			)));
		}

		$result->sort('Title');
		return $result;
	}

	/**
	 * @return DataObjectSet
	 */
	public function LinkedKeywords() {
		$result   = new DataObjectSet();
		$query    = new SQLQuery();
		$baseLink = Controller::join_links(Director::baseURL(), 'records/FilterForm?Keywords__ID=');

		$query->select(array(
			'"RecordKeyword"."ID" AS "ID"',
			'"Title"',
			'"RecordKeywordID" AS "ParentKeywordID"',
			'(SELECT COUNT(*) FROM "Record_Keywords" WHERE "RecordKeywordID" = "ParentKeywordID") AS "Count"'
		));
		$query->from('RecordKeyword');
		$query->innerJoin('Record_Keywords', '"RecordKeyword"."ID" = "RecordKeywordID"');
		$query->where('"RecordID"', $this->ID);
		$query->orderby('"Title"');

		foreach ($query->execute() as $row) {
			$result->push(new ArrayData(array(
				'Title' => $row['Title'],
				'Count' => $row['Count'],
				'Link'  => $baseLink . $row['ID']
			)));
		}

		return $result;
	}

	/**
	 * @return string
	 */
	public function Link($action = null) {
		return Controller::join_links(Director::baseURL(), 'records', $this->ID, $action);
	}

}