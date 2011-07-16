<?php
/**
 * @package mppda
 */
class Person extends DataObject {

	public static $db = array(
		'Name'        => 'Varchar(350)',
		'FacetName'   => 'Varchar(350)',
		'Title'       => 'Varchar(50)',
		'FirstName'   => 'Varchar(100)',
		'MiddleName'  => 'Varchar(100)',
		'Surname'     => 'Varchar(100)',
		'Role'        => 'Varchar(255)',
		'About'       => 'HTMLText',
		'BornYear'    => 'Varchar(20)',
		'DiedYear'    => 'Varchar(20)'
	);

	public static $indexes = array(
		'SearchFields' => array(
			'type'  => 'fulltext',
			'name'  => 'SearchFilters',
			'value' => 'Name, About'),
		'FacetName' => true
	);

	public static $belongs_many_many = array(
		'Organisations' => 'Organisation',
		'Records'       => 'Record'
	);

	public static $extensions = array(
		'Commentable'
	);

	public static $summary_fields = array(
		'Name',
		'Surname'
	);

	public static $plural_name = 'People';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Name');
		$fields->removeByName('FacetName');
		$fields->removeByName('Organisations');
		$fields->removeByName('Records');

		$fields->addFieldToTab('Root.Main',
			new HeaderField('PersonTitle', 'Person Details'), 'Title'
		);

		$titles = DB::query(
			'SELECT DISTINCT "Title" FROM "Person" ORDER BY "Title"'
		);
		$fields->replaceField('Title', new AddableDropdownField(
			'Title', null, $titles->keyedColumn(), null, null, true
		));

		if ($this->isInDB()) {
			$fields->addFieldsToTab('Root.Main', array(
				new HeaderField('OrganisationsHeader', 'Organisations'),
				new ManyManyPickerField($this, 'Organisations', '')
			));
		} else {
			$fields->addFieldToTab('Root.Main', new LiteralField('',
				'<p>You can add organisations once you save for the first time.</p>'
			));
		}

		$fields->dataFieldByName('About')->setRows(10);

		return $fields;
	}

	public function getCMSExtraFields() {
		$orgs = DataObject::get('Organisation');

		return new FieldSet(
			new HeaderField('AssociatePersonHeader', 'Associate Person'),
			new ReadonlyField('Name', 'Name'),
			new DropdownField(
				'OrganisationID',
				'Organisation',
				$orgs ? $orgs->map('ID', 'FullTitle') : array(),
				null, null, true),
			new TextField('CustomRole', 'Role'),
			new DropdownField('Correspondence', null, array(
				'None'     => 'None',
				'Sender'   => 'Sender',
				'Receiver' => 'Receiver'
			), 'None')
		);
	}

	/**
	 * Joins the name parts and writes the full name to the DB.
	 */
	public function onBeforeWrite() {
		$this->Name = implode(
			' ', array($this->Title, $this->FirstName, $this->MiddleName, $this->Surname)
		);

		$facetName  = $this->Surname ? "{$this->Surname}, " : '';
		$facetName .= implode(' ', array($this->Title, $this->FirstName, $this->MiddleName));
		$this->FacetName = trim($facetName, ' ,');

		parent::onBeforeWrite();
	}

	public function requireDefaultRecords() {
		// If there are no records with Role set, assume we need to migrate the
		// About column to it.
		if (!DataObject::get_one('Person', '"Role" IS NOT NULL')) {
			DB::query('UPDATE "Person" SET "Role" = "About"');
			DB::query('UPDATE "Person" SET "About" = NULL');
			DB::alteration_message('Migrated Person->Description to Person->Role', 'changed');
		}

		parent::requireDefaultRecords();
	}

	public function getProvideComments() {
		return MppdaUtil::provide_comments($this);
	}

	/**
	 * @return string
	 */
	public function Summary() {
		$parts = array($this->Name);

		if ($this->CustomRole) {
			$parts[] = $this->CustomRole;
		} elseif ($this->Role) {
			$parts[] = $this->Role;
		}

		if ($this->OrganisationID) {
			$parts[] = DataObject::get_by_id('Organisation', $this->OrganisationID)->getFullTitle();
		}

		return implode(', ', $parts);
	}

	/**
	 * @return string
	 */
	public function Link() {
		return Controller::join_links(Director::baseURL(), 'people', $this->ID);
	}

}