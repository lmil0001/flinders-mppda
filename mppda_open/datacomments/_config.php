<?php
/**
 * @package silverstripe-datacomments
 */

Object::add_extension('PageComment', 'DataCommentExtension');

Director::addRules(50, array(
	'PageComment/rss' => 'CommentRssController'
));
CMSMenu::remove_menu_item('CommentAdmin');