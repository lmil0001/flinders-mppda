<?php
/**
 * An extension to {@link PageComment} that can be attached to any record, not
 * just pages.
 *
 * @package mppda
 */
class DataCommentExtension extends DataObjectDecorator {

	public function extraStatics() {
		return array('db' => array(
			'SubjectClass' => 'Varchar(100)',
			'SubjectID'    => 'Int'
		));
	}

	public function getParent() {
		return DataObject::get_by_id(
			$this->owner->SubjectClass, $this->owner->SubjectID);
	}

	public function SubjectSummary() {
		if ($this->owner->ParentID) {
			$parent = $this->owner->getComponent('Parent');

			return sprintf(
				'<a href="admin/show/%d">%s</a>',
				$parent->ID, $parent->Title
			);
		}

		$parent = $this->getParent();

		if ($parent->hasField('Name')) {
			$title = $parent->Name;
		} else {
			$title = $parent->Title;
		}

		return sprintf(
			'%s: <a href="%s" target="_blank">%s</a>',
			$parent->singular_name(), $parent->Link(), $title
		);
	}

}