<?php
/**
 * @package mppda
 */
class TranscriptLink extends DataObject {

	public static $db = array(
		'Title' => 'Varchar(100)',
		'Link'  => 'Varchar(255)'
	);

	public static $has_one = array(
		'Parent' => 'Record'
	);

	public static $summary_fields = array(
		'Title',
		'Link'
	);

}