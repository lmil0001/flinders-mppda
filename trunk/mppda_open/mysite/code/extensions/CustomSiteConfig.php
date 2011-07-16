<?php

/*
 * @summary
 * Custom site config - allow users to set global site properties.
 * @author Tim Cavanagh
 * @email timcavanagh@threefin.com.au
 * @Silverstripe version 2.4.2
 *
 * @history
 * 7/11/2010    Initial version
 *
 * @todo develop metadata settings more thouroughly.
 */

class CustomSiteConfig extends DataObjectDecorator {

    function extraStatics() {
        return array(
            'db' => array(
                'LogoUrl' => 'Text',
                'LogoTitle' => 'Text',
                'Description' => 'Text',
                'Contributor' => 'Text',
                'Copyright' => 'Text',
                'Coverage' => 'Text',
                'CollectionStartDate' => 'Date',
                'CollectionEndDate' => 'Date',
                'RecordComments'       => 'Enum("On, Off, PerItem", "PerItem")',
                'OrganisationComments' => 'Enum("On, Off, PerItem", "PerItem")',
                'FilmComments'         => 'Enum("On, Off, PerItem", "PerItem")',
                'PersonComments'       => 'Enum("On, Off, PerItem", "PerItem")',
            ),
            'has_one' => array(
                'SiteLogo' => 'Image'
            ),

        );
    }

    public function updateCMSFields(FieldSet $fields) {

        $fields->addFieldToTab("Root.Main", new TextField("Copyright", "Copyright Text"));
        $fields->addFieldToTab("Root.Main", new ImageField("SiteLogo", "Site Logo"));
        $fields->addFieldToTab("Root.Main", new TextField("LogoUrl", "Logo Url"));
        $fields->addFieldToTab("Root.Main", new TextField("LogoTitle", "Logo Title"));

        //Dublin Core
        $fields->addFieldToTab("Root.DublinCore", new TextField("Description"));
        $fields->addFieldToTab("Root.DublinCore", new TextField("Contributor"));
        $fields->addFieldToTab("Root.DublinCore", new TextField("Coverage"));
        // ANDS
        $sdatefield = new DateField("CollectionStartDate", "Collection Start Date");
        $sdatefield->setConfig('showcalendar', true);
        $fields->addFieldToTab("Root.ANDS", $sdatefield);

        $edatefield = new DateField("CollectionEndDate", "Collection End Date");
        $edatefield->setConfig('showcalendar', true);
        $fields->addFieldToTab("Root.ANDS", $edatefield);

        $comments = array(
            'On'      => 'All items can be commented on',
            'Off'     => 'Comments are disabled',
            'PerItem' => 'Allow comments to be enabled on individual items'
        );

        $fields->addFieldsToTab('Root.Comments', array(
            new DropdownField('RecordComments', 'Record Comments', $comments),
            new DropdownField('OrganisationComments', 'Organisation Comments', $comments),
            new DropdownField('FilmComments', 'Film Comments', $comments),
            new DropdownField('PersonComments', 'Person Comments', $comments)
        ));
    }

    public function getDublinCoreStatic() {

        $dcstatic = "<link rel=\"schema.DC\" href=\"http://purl.org/dc/elements/1.1/\" />\n";
        if ($this->owner->Description) {
            $dcstatic .= "<meta name=\"DC.description\" content=\"" . Convert::raw2att($this->owner->Description) . "\" />\n";
        }
        if ($this->owner->Contributor) {
            $dcstatic .= "<meta name=\"DC.contributor\" content=\"" . Convert::raw2att($this->owner->Contributor) . "\" />\n";
        }
        if ($this->owner->Coverage) {
            $dcstatic .= "<meta name=\"DC.coverage\" content=\"" . Convert::raw2att($this->owner->Coverage) . "\" />\n";
        }


        return $dcstatic;
    }

    public function getANDSCollectionStatic() {

        $andsstatic = "<link rel=\"schema.DC\" href=\"http://purl.org/dc/elements/1.1/\" />\n";
        if ($this->owner->Description) {
            $andsstatic .= "<meta name=\"keywords\" content=\"" . Convert::raw2att($this->owner->Description) . "\" />\n";
        }
        if ($this->owner->Contributor) {
            $andsstatic .= "<meta name=\"DC.contributor\" content=\"" . Convert::raw2att($this->owner->Contributor) . "\" />\n";
        }


        return $andsstatic;
    }

    public function requireDefaultRecords() {
        if (Director::isDev()) {
            $loader = new FixtureLoader();
            $loader->loadFixtures();
        }

        $scans = Folder::findOrMake('Reels');
        $scans->Secured = true;
        $scans->write();

        $docs = Folder::findOrMake(Document::DOCUMENTS_DIR);
        $docs->Secured = 1;
        $docs->write();

        DB::alteration_message('Secured scans and documents');

        parent::requireDefaultRecords();
    }

}