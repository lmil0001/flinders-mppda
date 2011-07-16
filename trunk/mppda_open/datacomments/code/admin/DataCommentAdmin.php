<?php
/**
 * An extension to the default comment admin that displays comments without @author Andrew
 * parent ID, and shows the subject they are attached to.
 *
 * @package silverstripe-datacomments
 */
class DataCommentAdmin extends CommentAdmin {

	public static $url_segment  = 'comments';
	public static $url_rule     = '/$Action';
	public static $url_priority = 100;
	public static $menu_title   = 'Comments';

	public function EditForm() {
		switch ($section = $this->Section()) {
			case 'approved':
				$filter = "\"IsSpam\" = 0 AND \"NeedsModeration\" = 0";
				$title = "<h2>". _t('CommentAdmin.APPROVEDCOMMENTS', 'Approved Comments')."</h2>";
				break;
			case 'unmoderated':
				$filter = '"NeedsModeration" = 1';
				$title = "<h2>"._t('CommentAdmin.COMMENTSAWAITINGMODERATION', 'Comments Awaiting Moderation')."</h2>";
				break;
			default:
				$filter = '"IsSpam" = 1';
				$title = "<h2>"._t('CommentAdmin.SPAM', 'Spam')."</h2>";
				break;
		}

		$tableFields = array(
			"Name" => _t('CommentAdmin.AUTHOR', 'Author'),
			"Comment" => _t('CommentAdmin.COMMENT', 'Comment'),
			"SubjectSummary" => 'Subject',
			"CommenterURL" => _t('CommentAdmin.COMMENTERURL', 'URL'),
			"Created" => _t('CommentAdmin.DATEPOSTED', 'Date Posted')
		);

		$popupFields = new FieldSet(
			new TextField('Name', _t('CommentAdmin.NAME', 'Name')),
			new TextField('CommenterURL', _t('CommentAdmin.COMMENTERURL', 'URL')),
			new TextareaField('Comment', _t('CommentAdmin.COMMENT', 'Comment'))
		);

		$idField = new HiddenField('ID', '', $section);
		$table = new CommentTableField($this, "Comments", "PageComment", $section, $tableFields, $popupFields, array($filter), 'Created DESC');

		$table->setParentClass(false);
		$table->setFieldCasting(array(
			'Created' => 'SS_Datetime->Full',
			'Comment' => array('HTMLText->LimitCharacters', 150)
		));

		$table->setPageSize(self::get_comments_per_page());
		$table->addSelectOptions(array('all'=>'All', 'none'=>'None'));
		$table->Markable = true;

		$fields = new FieldSet(
			new LiteralField("Title", $title),
			$idField,
			$table
		);

		$actions = new FieldSet();

		if($section == 'unmoderated') {
			$actions->push(new FormAction('acceptmarked', _t('CommentAdmin.ACCEPT', 'Accept')));
		}

		if($section == 'approved' || $section == 'unmoderated') {
			$actions->push(new FormAction('spammarked', _t('CommentAdmin.SPAMMARKED', 'Mark as spam')));
		}

		if($section == 'spam') {
			$actions->push(new FormAction('hammarked', _t('CommentAdmin.MARKASNOTSPAM', 'Mark as not spam')));
		}

		$actions->push(new FormAction('deletemarked', _t('CommentAdmin.DELETE', 'Delete')));

		if($section == 'spam') {
			$actions->push(new FormAction('deleteall', _t('CommentAdmin.DELETEALL', 'Delete All')));
		}

		$form = new Form($this, "EditForm", $fields, $actions);

		return $form;
	}

}