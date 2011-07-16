<?php
/**
 * Exposes some useful search filter functionality to faceting.
 *
 * @package mppda
 */
class FacetingUtilitySearchFilter extends SearchFilter {

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @ignore
	 */
	public function apply(SQLQuery $query) { /* ... */ }

}