<?php
/**
 * An SQL map that removes items with no corresponding records, and lists the
 * number of items next to each option.
 *
 * @package mppda
 */
class FacetingSQLMap extends SQLMap {

	protected $name;
	protected $countField = 'COUNT(*)';

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getKeyField() {
		return $this->keyField;
	}

	/**
	 * @return string
	 */
	public function getTitleField() {
		return $this->titleField;
	}

	/**
	 * @param string $field
	 */
	public function setCountField($field) {
		$this->countField = $field;
	}

	/**
	 * @return SQLQuery
	 */
	public function getQuery() {
		return $this->query;
	}

	protected function genItems() {
		if (isset($this->items)) return;

		$set   = new DataobjectSet();
		$items = $this->query->execute();

		foreach ($items as $item) {
			$count = $item[$this->countField];
			$key   = $item[$this->keyField];
			$title = $item[$this->titleField];

			if (!$count > 0 || !$key || !$title) continue;

			$set->push(new ArrayData(array(
				$this->keyField   => $key,
				$this->titleField => sprintf('%s (%d)', $title, $count)
			)));
		}

		$this->items = $set;
	}

}