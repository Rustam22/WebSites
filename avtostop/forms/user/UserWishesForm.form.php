<?php

	class UserWishesForm extends Form {
		
		public $salary;
		public $profession;
		public $cityId;
		public $countryId;
		
		public static $enableCSRFSecurity = true;
		
		public function __construct() {
		
			$this->salary = new FormTextField('salary', FORM_VALIDATION_STRING);
			$this->salary->minLength = 3;
			$this->salary->required = false;
			
			$this->profession = new FormDateField('profession', FORM_VALIDATION_STRING);
			$this->profession->minLength = 3;
			$this->profession->required = false;
			
			$this->cityId = new FormTextField('city_wish_id', FORM_VALIDATION_NUMERIC);
			$this->cityId->minLength = 1;
			$this->cityId->required = false;
			
			$this->countryId = new FormTextField('country_wish_id', FORM_VALIDATION_NUMERIC);
			$this->countryId->minLength = 1;
			$this->countryId->required = false;
		
		}
		
	}

?>