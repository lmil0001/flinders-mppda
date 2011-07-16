<?php
/**
 * @package mppda
 */
class RemoteImageEditorCms extends LeftAndMainDecorator {

	public function doRemoteImageInsert($data, $form) {
		$data   = $form->getData();
		$url    = $data['ImageUrl'];
		$folder = DataObject::get_by_id('Folder', (int) $data['SaveFolderID']);

		if (!$url) {
			return new SS_HTTPResponse(null, 400, 'Please specify an image URL.');
		}

		if (!$folder) {
			return new SS_HTTPResponse(
				null, 400, 'Please specify a folder to save the image to.'
			);
		}

		if (($size = @getimagesize($url)) === false) {
			return new SS_HTTPResponse(
				null, 400, 'Could not grab remote image. Please ensure the URL'
				. ' is correct and points to an image file.'
			);
		}

		// Create the image object.
		$file = new Image();
		$file->ParentID = $folder->ID;
		$file->Name     = basename($url);
		$file->write();

		// Grab the remote image.
		file_put_contents($file->getFullPath(), file_get_contents($url));

		$response = Convert::raw2json(array(
			'src'    => $file->Filename,
			'width'  => (int) $size[0],
			'height' => (int) $size[1]
		));
		$response = new SS_HTTPResponse($response);
		$response->addHeader('Content-Type', 'application/json');
		return $response;
	}

}