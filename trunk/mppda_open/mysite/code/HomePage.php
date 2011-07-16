<?php

/*
 *
 * @summary
 * Defines the homepage type
 * @author Tim Cavanagh
 * @email timcavanagh@threefin.com.au
 * @Silverstripe version 2.4.2
 *
 * @history
 * 12/11/2010    Initial version
 *
 */

class HomePage extends Page {

    public static $has_many = array(
        'SliderImages' => 'HomePage_SliderImage'
    );
    public static $many_many = array(
        'FeaturedRecords' => 'Record',
        'FeaturedOrganisations' => 'Organisation'
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab(
            'Root.Content.SliderImages',
            new OrderableComplexTableField(
                $this, 'SliderImages', 'HomePage_SliderImage'
            ));

        $fields->addFieldToTab('Root.Content.FeaturedRecords', new ManyManyPickerField(
                        $this, 'FeaturedRecords', 'Featured Records'
        ));

        $fields->addFieldToTab('Root.Content.FeaturedOrganisations', new ManyManyPickerField(
                        $this, 'FeaturedOrganisations', 'Featured Organisations'
        ));

        return $fields;
    }

    /**
     * @return UserDefinedForm_Controller
     
    public function getContactForm() {
        $contact = SiteTree::get_by_link('contact-us');

        if ($contact instanceof UserDefinedForm) {
            return new UserDefinedForm_Controller($contact);
        }
    }*/

    // Return the latest news article
    public function LatestNews() {
        $news = DataObject::get_one("NewsArticle", "", "", "OriginalPublishedDate DESC");
        return $news;
    }

}

class HomePage_Controller extends Page_Controller {

    public function init() {
        parent::init();
        // jQuery slider start
        Requirements::javascript("mysite/javascript/jquery.nivo.slider.pack.js");
        Requirements::javascript("mysite/javascript/equalcols.js");
        Requirements::customScript('jQuery(document).ready(function(){jQuery("#slider").nivoSlider();jQuery(".block").equalHeights(420);});');
        Requirements::css("mysite/css/nivo-slider.css");

        // Include UserForms validation code.
        //Validator::set_javascript_validation_handler('none');
        //Requirements::javascript('userforms/thirdparty/jquery-validate/jquery.validate.min.js');
    }

    /**
     * Returns a randomly selected featured record.
     *
     * @return Record
     */
    public function getRandomFeaturedRecord() {
        $feature = $this->getManyManyComponents(
            'FeaturedRecords', null, DB::getConn()->random(), null, 1
        );

        if ($feature) return $feature->First();
    }

    /**
     * Returns a randomly selected list of 8 organisations.
     *
     * @return Record
     */
    public function getRandomFeaturedOrganisation() {
        $feature = $this->getManyManyComponents(
            'FeaturedOrganisations', null, DB::getConn()->random(), null, 8
        );

        if ($feature) return $feature;
    }

}

class HomePage_SliderImage extends DataObject {

    public static $db = array(
        'Title' => 'Varchar(100)',
        'Link' => 'Varchar(255)',
        'Caption' => 'Varchar(255)'
    );

    public static $has_one = array(
        'Image' => 'Image',
        'Parent' => 'HomePage'
    );

    public static $extensions = array(
        'Orderable'
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        if (!$this->isInDB()) {
            $fields->replaceField('Image', new SimpleImageField(
                            'Image', null, null, null, null, 'Uploads/Slider'
            ));
        }

        return $fields;
    }

}
