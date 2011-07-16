<?php
/**
 * A search filter to get all records within a year.
 *
 * @package mppda
 */
class WithinYearFilter extends SearchFilter {

	/**
	 * @return $query
	 */
	public function apply(SQLQuery $query) {
		$query  = $this->applyRelation($query);
		$conn   = DB::getConn();
		$clause = $conn->formattedDatetimeClause($this->getDbName(), '%Y');
		$time   = strtotime($this->getValue());

		$query->where(sprintf(
			"%s = '%s'", $clause, Convert::raw2sql($this->getValue())
		));
	}

	public function isEmpty() {
		return !strlen($this->getValue()) || !ctype_digit($this->getValue());
	}

}