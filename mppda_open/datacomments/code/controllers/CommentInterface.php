<?php
/**
 * A comment interface that allows attaching comments to non-page DataObjects.
 *
 * @package mppda
 */
class CommentInterface extends PageCommentInterface {

	public static $allowed_actions = array(
		'deleteall',
		'rss'
	);

	public function PostCommentForm() {
		if (!$this->page->ProvideComments) {
			return false;
		}

		$form = parent::PostCommentForm();

		$form->Fields()->removeByName('ParentID');
		$form->Fields()->push(new HiddenField('SubjectClass', '', $this->page->class));
		$form->Fields()->push(new HiddenField('SubjectID', '', $this->page->ID));

		return $form;
	}

	/**
	 * Deletes all comments linked to this page.
	 */
	public function deleteall($request) {
		$token = SecurityToken::inst();
		if(!$token->checkRequest($request)) return $this->httpError(400);

		$comments = $this->Comments();
		if ($comments) foreach ($comments as $comment) {
			if ($comment->canDelete()) $comment->delete();
		}

		return Director::is_ajax() ? '' : Director::redirectBack();
	}

	/**
	 * Returns an RSS feed for comments on this object.
	 */
	public function rss() {
		$rss = new RSSFeed(
			$this->Comments(),
			$this->controller->Link(),
			"Comments on {$this->controller->Title}",
			'',
			'RSSTitle',
			'Comment',
			'RSSName');
		$rss->outputToBrowser();
	}

	public function Comments() {
		$filters = array();
		$order   = PageCommentInterface::$order_comments_by;
		$limit   = array(
			'start' => isset($_GET['commentStart']) ? (int) $_GET['commentStart'] : 0,
			'limit' => PageComment::$comments_per_page
		);

		if (!isset($_GET['showspam'])) $filters[] = '"IsSpam" = 0';
		if (Permission::check('CMS_ACCESS_CommentAdmin')) $filters[] = '"NeedsModeration" = 0';

		if ($filters) {
			$filter = 'AND ' . implode(' AND ', $filters);
		} else {
			$filter = null;
		}

		$comments = DataObject::get(
			'PageComment',
			sprintf('"SubjectClass" = \'%s\' AND "SubjectID" = %d',
				$this->page->class, $this->page->ID, $filter),
			$order,
			null,
			$limit);

		if ($comments) {
			$comments->setPaginationGetVar('commentStart');
		}

		return $comments;
	}

	public function DeleteAllLink() {
		if(!Permission::check('CMS_ACCESS_CommentAdmin')) return;

		return SecurityToken::inst()->addToUrl(Controller::join_links(
			$this->Link(), 'deleteall'
		));
	}

	public function CommentRssLink() {
		return Controller::join_links($this->Link(), 'rss');
	}

}