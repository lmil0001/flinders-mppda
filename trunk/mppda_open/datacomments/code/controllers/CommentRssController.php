<?php
/**
 * Returns an RSS feed for all comments across the site.
 *
 * @package silverstripe-datacomments
 */
class CommentRssController extends Controller {

	public static $allowed_actions = array(
		'index'
	);

	public function index() {
		$filter   = Permission::check('ADMIN') ? '' : 'AND "NeedsModeration" = 0';
		$comments = DataObject::get(
			'PageComment', '"IsSpam" = 0 ' . $filter,
			'"Created" DESC', null, 10
		);

		if (!$comments) {
			$comments = new DataObjectSet();
		}

		$rss = new RSSFeed(
			$comments, '/', 'Comments', '', 'RSSTitle', 'Comment', 'RSSName');
		$rss->outputToBrowser();
	}

}