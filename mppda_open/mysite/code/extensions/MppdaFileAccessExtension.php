<?php
/**
 * Allows any users who are logged in to view full size scans and documents.
 *
 * @package mppda
 */
class MppdaFileAccessExtension extends DataObjectDecorator {

	public function canViewSecured() {
		$filename = $this->owner->Filename;
		$url      = Director::makeRelative(Controller::curr()->getRequest()->getURL());

		if (strpos($filename, 'assets/Documents/') === 0 && Member::currentUserID()) {
			return true;
		}

		$isScan   = strpos($filename, 'assets/Reels/') === 0;
		$isResize = strpos($url, '/_resampled/') && $url != $filename;

		if ($isScan) {
			return Member::currentUserID() || $isResize;
		}
	}

}