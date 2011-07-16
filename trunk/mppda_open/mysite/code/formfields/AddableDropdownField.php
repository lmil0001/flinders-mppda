<?php
/**
 * A {@link DropdownField} that also allows you to either select an existing
 * value or add a new one.
 *
 * @package mppda
 */
class AddableDropdownField extends DropdownField {

	protected $extraClass = 'dropdown';

	/**
	 * @return string
	 */
	public function Field() {
		Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
		Requirements::javascript(THIRDPARTY_DIR . '/jquery-ui/jquery-ui-1.8rc3.custom.js');
		Requirements::css(THIRDPARTY_DIR . '/jquery-ui-themes/smoothness/jquery-ui-1.8rc3.custom.css');
		Requirements::javascript('mysite/javascript/AddableDropdownField.js');
		Requirements::css('mysite/css/AddableDropdownField.css');

		$field = $this->customise(array(
			'Dropdown' => parent::Field()
		));
		return $this->renderWith('AddableDropdownField');
	}

}