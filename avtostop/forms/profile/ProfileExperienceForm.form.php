<?php

	class ProfileExperienceForm extends Form {
		
		public $company;
		public $profession;
		public $dateStart;
		public $dateEnd;
		public $description;
		
		public static $enableCSRFSecurity = true;
		
		public function __construct() {
			
			$this->company = new FormTextField('company', FORM_VALIDATION_STRING);
			$this->company->minLength = 3;
			$this->company->required = true;
			
			$this->profession = new FormTextField('profession', FORM_VALIDATION_STRING);
			$this->profession->minLength = 3;
			$this->profession->required = true;
			
			$this->dateStart = new FormTextField('dateStart', FORM_VALIDATION_STRING);
			$this->dateStart->minLength = 3;
			$this->dateStart->required = true;
			
			
			$this->dateEnd = new FormTextField('dateEnd', FORM_VALIDATION_STRING);
			$this->dateEnd->minLength = 3;
			$this->dateEnd->required = true;
			
			$this->description = new FormTextField('description', FORM_VALIDATION_STRING);
			$this->description->minLength = 3;
			$this->description->required = true;
			
		}
		
	}

?>