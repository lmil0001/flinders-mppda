<?php
/**
 * @package silverstripe-breadcrumbs
 */
class BreadcrumbsExtension extends Extension {

	protected $unshifted = array();
	protected $pushed = array();

	/**
	 * @param  int $depth
	 * @return string
	 */
	public function Breadcrumbs($depth = 20) {
		$items  = $this->getBreadcrumbItems($depth);
		$parts = array();

		if (count($items) < 2) return;

		foreach (array_values($items) as $key => $item) {
			if ($key == count($items) - 1) {
				$parts[] = Convert::raw2xml($item->title);
			} else {
				$parts[] = sprintf(
					'<a href="%s">%s</a>',
					$item->link,
					Convert::raw2xml($item->title)
				);
			}
		}

		return implode(SiteTree::$breadcrumbs_delimiter, $parts);
	}

	/**
	 * @param  int $depth
	 * @return object[]
	 */
	public function getBreadcrumbItems($depth = 20) {
		$items = array();
		$curr  = $this->owner;

		while ($curr && (!$depth || count($items) < $depth)) {
			if ($curr->ShowInMenus) {
				$items[] = (object) array(
					'title' => $curr->Title,
					'link'  => $curr->Link()
				);
			}
			$curr = $curr->getParent();
		}

		return array_merge($this->unshifted, array_reverse($items), $this->pushed);
	}

	/**
	 * Push an item onto the end of the breadcrumb stack.
	 */
	public function pushBreadcrumb($title, $link) {
		$this->pushed[] = (object) array('title' => $title, 'link' => $link);
	}

	/**
	 * Unshift an item onto the beginning of the breadcrumb stack.
	 */
	public function unshiftBreadcrumb($title, $link) {
		array_unshift($this->unshifted, (object) array(
			'title' => $title, 'link' => $link
		));
	}

}