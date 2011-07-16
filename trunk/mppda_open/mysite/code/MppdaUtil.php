<?php
/**
 * @package mppda
 */
class MppdaUtil {

	public static $default_stopwords = array('about', 'again', 'also', 'been',
		'before', 'cause', 'come', 'could', 'does', 'each', 'even', 'from', 'give',
		'have', 'here', 'just', 'like', 'made', 'many', 'most', 'much', 'must',
		'only', 'other', 'said', 'same', 'should', 'since', 'some', 'such', 'tell',
		'than', 'that', 'their', 'them', 'then', 'there', 'these', 'they', 'thing',
		'this', 'through', 'very', 'want', 'well', 'were', 'what', 'when', 'where',
		'which', 'while', 'will', 'with', 'within', 'would', 'your');

	/**
	 * Calculates a number of keywords from a raw input string.
	 *
	 * @param  string $input
	 * @param  in     $num
	 * @param  int    $minLength
	 * @param  array  $stopwords
	 * @return array
	 */
	public static function calculate_keywords($input, $num = 15, $minLength = 4, $stopwords = null) {
		if ($stopwords === null) {
			$stopwords = self::$default_stopwords;
		}

		$input = preg_replace('~<br\s*/?>~i', ' ', $input);
		$input = html_entity_decode($input, ENT_NOQUOTES , 'UTF-8');
		$input = strtolower($input);
		$input = strip_tags($input);

		$words   = str_word_count($input, 1);
		$counts  = array();
		$matches = array();

		foreach ($words as $word) {
			if (strlen($word) >= $minLength && !in_array($word, $stopwords)) {
				$counts[$word] = preg_match_all("/\b$word\b/", $input, $matches);
			}
		}

		arsort($counts);
		$counts = array_keys($counts);

		return array_slice($counts, 0, $num);
	}

	/**
	 * Checks if comments should be enabled on an object.
	 *
	 * @param  DataObject $item
	 * @return bool
	 */
	public static function provide_comments($item) {
		$class = $item->class;
		switch (SiteConfig::current_site_config()->{$class . 'Comments'}) {
			case 'On':     return true;
			case 'Off':     return false;
			case 'PerItem': return $item->getField('ProvideComments');
		}
	}

}