<?php

	class VacancyForm extends Form {
		
		public $profArea;
		public $title;
		public $cityId;
		public $countryId;
		public $contactUser;
		public $salaryFrom;
		public $salaryTo;
		public $salaryCurrency;
		public $experience;
		public $workTime;
		public $busyTime;
		public $description;
		
		public static $enableCSRFSecurity = false;
		
		public function __construct() {
			
			$this->title = new FormTextField('title', FORM_VALIDATION_STRING);
			$this->title->minLength = 3;
			$this->title->required = false;
			
			$this->profArea = new FormTextField('profArea', FORM_VALIDATION_NUMERIC);
			$this->profArea->minLength = 1;
			$this->profArea->required = false;
			
			$this->cityId = new FormTextField('cityId', FORM_VALIDATION_NUMERIC);
			$this->cityId->minLength = 1;
			$this->cityId->required = false;
			
			$this->countryId = new FormTextField('countryId', FORM_VALIDATION_NUMERIC);
			$this->countryId->minLength = 1;
			$this->countryId->required = false;
			
			$this->contactUser = new FormTextField('contactUser', FORM_VALIDATION_STRING);
			$this->contactUser->minLength = 3;
			$this->contactUser->required = false;
			
			$this->salaryFrom = new FormTextField('salaryFrom', FORM_VALIDATION_NUMERIC);
			$this->salaryFrom->minLength = 1;
			$this->salaryFrom->required = false;
			
			$this->salaryTo = new FormTextField('salaryTo', FORM_VALIDATION_NUMERIC);
			$this->salaryTo->minLength = 1;
			$this->salaryTo->required = false;
			
			$this->salaryCurrency = new FormTextField('salaryCurrency', FORM_VALIDATION_NUMERIC);
			$this->salaryCurrency->minLength = 1;
			$this->salaryCurrency->required = false;
			
			$this->experience = new FormTextField('experience', FORM_VALIDATION_NUMERIC);
			$this->experience->minLength = 1;
			$this->experience->required = false;
			
			$this->workTime = new FormTextField('workTime', FORM_VALIDATION_NUMERIC);
			$this->workTime->minLength = 1;
			$this->workTime->required = false;
			
			$this->busyTime = new FormTextField('busyTime', FORM_VALIDATION_NUMERIC);
			$this->busyTime->minLength = 1;
			$this->busyTime->required = false;
			
			$this->description = new FormTextField('description', FORM_VALIDATION_STRING);
			$this->description->minLength = 3;
			$this->description->required = false;
			
			
		}
		
	}

?>