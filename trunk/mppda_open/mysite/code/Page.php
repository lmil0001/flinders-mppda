<?php

/*
 * @summary
 * Defines the homepage type
 * @author Tim Cavanagh
 * @email timcavanagh@threefin.com.au
 * @Silverstripe version 2.4.2
 *
 * @history
 * 12/11/2010   Initial version
 * 10/12/2010   Added footer links (if page is not visible in menu and is footer link then add to footer links menu)
 * 28/12/2010   Moved equl col jquery call to homepage
 *
 */

class Page extends SiteTree {

    public static $db = array(
        "ShowInFooterMenu" => "Boolean"
    );

    function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab("Root.Behaviour", new CheckboxField("ShowInFooterMenu", "Show in footer menu"));
        return $fields;
    }

}

class Page_Controller extends ContentController {

    public function init() {
        parent::init();
        // jQuery start
        Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
        Requirements::javascript(SAPPHIRE_DIR . '/javascript/jquery_improvements.js');
        Requirements::javascript("mysite/javascript/global.js");
        Requirements::customScript('jQuery(document).ready(function(){clearField("#SearchForm_SearchForm");});');
    }

    function footerLinks() {
        $whereStatement = "ShowInFooterMenu = 1 AND ShowInMenus = 0";
        return DataObject::get("Page", $whereStatement);
    }

	/**
	 * @return SearchForm
	 */
	public function SearchForm() {
		$form = parent::SearchForm();
		$form->setFormAction(Controller::join_links(
			Director::baseURL(), 'home/SearchForm'
		));
		return $form;
	}

}