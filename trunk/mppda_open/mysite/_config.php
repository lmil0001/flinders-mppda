<?php

global $project;
$project = 'mysite';


global $databaseConfig;
$databaseConfig = array(
	"type" => "MySQLDatabase",
	"server" => "localhost", 
	"username" => "db_username", 
	"password" => "db_password", 
	"database" => "db_name",
);


MySQLDatabase::set_connection_charset('utf8');

// This line set's the current theme. More themes can be
// downloaded from http://www.silverstripe.org/themes/
SSViewer::set_theme('mppda');

// Set the site locale
i18n::set_locale('en_AU');
i18n::set_time_format('HH:mm');
i18n::set_date_format('dd/MM/YYYY');

// Add controller rules.
Director::addRules(50, array(
	'films'         => 'FilmsController',
	'people'        => 'PeopleController',
	'organisations' => 'OrganisationsController',
	'records'       => 'RecordsController'
));

// enable nested URLs for this site (e.g. page/sub-page/)
SiteTree::enable_nested_urls();

// Custom config settings
Object::add_extension('SiteConfig', 'CustomSiteConfig');
Object::add_extension('File', 'MppdaFileAccessExtension');
Object::add_extension('HtmlEditorField_Toolbar', 'RemoteImageEditorToolbar');
Object::add_extension('LeftAndMain', 'RemoteImageEditorCms');
GoogleLogger::activate('SiteConfig');

// enable site search
FulltextSearchable::enable();

// Add spam protection.
RecaptchaField::$public_api_key  = 'your_public_recaptcha_api_key';
RecaptchaField::$private_api_key = 'your_private_recaptcha_api_key';

SpamProtectorManager::set_spam_protector('RecaptchaProtector');

// add a simple html editor config
HtmlEditorConfig::get('simple')->setOptions(array(
	'friendly_name'     => 'Simple',
	'language'          => i18n::get_tinymce_lang(),
	'document_base_url' => Director::absoluteBaseURL(),
	'mode'              => 'specific_textareas'
));
HtmlEditorConfig::get('simple')->enablePlugins('media');
HtmlEditorConfig::get('simple')->enablePlugins(array(
	'ssbuttons' => '../../../cms/javascript/tinymce_ssbuttons/editor_plugin_src.js'
));
HtmlEditorConfig::get('simple')->setButtonsForLine(1, array(
	'bold', 'italic', 'underline', 'strikethrough', 'separator', 'undo',
	'redo', 'separator', 'formatselect', 'cleanup', 'separator',
	'bullist', 'numlist', 'separator', 'ssimage', 'sslink', 'unlink'
));
HtmlEditorConfig::get('simple')->setButtonsForLine(2);
HtmlEditorConfig::get('simple')->setButtonsForLine(3);

// Register all the fixture files
FixtureLoader::$preload_fixtures[] = array(
	'file'   => 'mysite/fixtures/siteconfig.yml',
	'type'   => 'SiteConfig',
	'filter' => null
);
FixtureLoader::$preload_fixtures[] = array(
	'file'   => 'mysite/fixtures/pages.yml',
	'type'   => 'Page',
	'filter' => null
);
