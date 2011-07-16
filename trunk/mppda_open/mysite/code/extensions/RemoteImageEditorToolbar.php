<?php
/**
 * @package mppda
 */
class RemoteImageEditorToolbar extends Extension {

	public function updateImageForm($form) {
		Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
		Requirements::javascript('mysite/javascript/RemoteImageEditorToolbar.js');

		$fields = $form->Fields();

		$sources = array(
			'local'  => 'Local image asset',
			'remote' => 'Grab a remote image from the web'
		);
		$fields->insertAfter(
			new OptionsetField('InsertSource', 'Image source', $sources, 'local', $form),
			'Heading'
		);

		$fields->insertAfter(
			new TextField('ImageUrl', 'Remote image URL', 'http://', null, $form),
			'InsertSource'
		);

		$folder = new TreeDropdownField('SaveFolderID', 'Folder to save to', 'Folder');
		$folder->setForm($form);
		$folder->setValue(Folder::findOrMake('Uploads/Remote')->ID);
		$fields->insertAfter($folder, 'ImageUrl');

		$source = new TextField('ImageSource', 'Image source', '', null, $form);
		$fields->insertAfter($source, 'CaptionText');

		$link = new TextField('ImageSourceUrl', 'Image source URL', 'http://', null, $form);
		$fields->insertAfter($link, 'ImageSource');

		$form->Actions()->push(new FormAction(
			'doRemoteImageInsert', 'Grab and Insert Image', $form
		));
	}

}