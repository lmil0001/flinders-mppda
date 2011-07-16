<?php
/**
 * Handles rendering an individual listing item.
 *
 * @package mppda
 */
class ListingItemController extends Page_Controller {

	public static $allowed_actions = array(
		'index',
		'Comments'
	);

	protected $parent;
	protected $item;

	/**
	 * @param ListingController $parent
	 * @param DataObject $item
	 */
	public function __construct($parent, $item) {
		$this->parent = $parent;
		$this->item   = $item;

		parent::__construct();

		if ($this->parent->data()->isInDB()) {
			$this->data()->ParentID = $this->parent->data()->ID;
		} else {
			$this->unshiftBreadcrumb($this->parent->Title(), $this->parent->Link());
		}

		if ($meta = $this->parent->getMetaKeywordsFields()) {
			$values = array();

			foreach ($meta as $field) {
				$values[] = $this->item->$field;
			}

			$this->data()->MetaKeywords = implode(', ', MppdaUtil::calculate_keywords(
				implode(' ', $values)
			));
		}
	}

	public function index() {
		return $this->parent->getViewer('view')->process($this);
	}

	public function Title() {
		if ($this->item->hasField('Name')) {
			return $this->item->Name;
		} else {
			return $this->item->Title;
		}
	}

	public function Item() {
		return $this->item;
	}

	public function Link() {
		return Controller::join_links($this->parent->Link(), $this->item->ID);
	}

	/**
	 * @return ListingController
	 */
	public function ParentController() {
		return $this->parent;
	}

	/**
	 * @return CommentInterface
	 */
	public function Comments() {
		return new CommentInterface($this, 'Comments', $this->item);
	}

}