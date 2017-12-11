<?php

	class LocationForm extends Form {
		
		public $city;
		public $country;
		
		public static $enableCSRFSecurity = true;
		
		public function __construct() {
			
			$this->city = new FormTextField('city', FORM_VALIDATION_NUMERIC);
			$this->city->minLength = 1;
			$this->city->required = true;
			
			$this->country = new FormTextField('country', FORM_VALIDATION_NUMERIC);
			$this->country->minLength = 1;
			$this->country->required = true;
			
		}
	}

?>