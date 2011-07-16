<?php
/**
 * Adds a field to control commenting on a dataobject.
 *
 * @package silverstripe-datacomments
 */
class Commentable extends DataObjectDecorator {

	public function extraStatics() {
		return array('db' => array(
			'ProvideComments' => 'Boolean'
		));
	}

	public function updateCMSFields($fields) {
		$fields->addFieldToTab('Root.Behaviour', new CheckboxField(
			'ProvideComments', 'Allow comments on this object?'
		));
	}

	public function updateFrontEndFields($fields) {
		$fields->removeByName('ProvideComments');
	}

}