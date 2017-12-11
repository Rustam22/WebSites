<?php

	class RatingForm extends Form {
	
		public $rate;
		public $objectId;
		
		public static $enableCSRFSecurity;
		
		public function __construct() {
			$this->rate = new FormTextField('rate', FORM_VALIDATION_NUMERIC);
			$this->objectId = new FormTextField('objectId', FORM_VALIDATION_NUMERIC);
		}
	
	}

?>