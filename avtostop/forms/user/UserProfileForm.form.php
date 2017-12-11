<?php

	class UserProfileForm extends Form {
		
		public $name;
		public $sex;
		public $birthDay;
		public $cityId;
		public $countryId;
		public $about;
		public $skills;
		public $education;
		public $courses;
		
		public static $enableCSRFSecurity = true;
		
		public function __construct() {
		
			$this->name = new FormTextField('name', FORM_VALIDATION_STRING);
			$this->name->minLength = 3;
			$this->name->required = false;
			
			$this->sex = new FormTextField('sex', FORM_VALIDATION_NUMERIC);
			$this->sex->minLength = 1;
			$this->sex->required = false;
			
			$this->birthDay = new FormDateField('birthday', FORM_VALIDATION_STRING);
			$this->birthDay->minLength = 10;
			$this->birthDay->required = false;
			
			$this->cityId = new FormTextField('city_id', FORM_VALIDATION_NUMERIC);
			$this->cityId->minLength = 1;
			$this->cityId->required = false;
			
			$this->countryId = new FormTextField('country_id', FORM_VALIDATION_NUMERIC);
			$this->countryId->minLength = 1;
			$this->countryId->required = false;
			
			$this->about = new FormTextField('about', FORM_VALIDATION_STRING);
			$this->about->minLength = 3;
			$this->about->required = false;
			
			$this->skills = new FormTextField('skills', FORM_VALIDATION_STRING);
			$this->skills->minLength = 3;
			$this->skills->required = false;
			
			$this->education = new FormTextField('education', FORM_VALIDATION_STRING);
			$this->education->minLength = 3;
			$this->education->required = false;
			
			$this->courses = new FormTextField('courses', FORM_VALIDATION_STRING);
			$this->courses->minLength = 3;
			$this->courses->required = false;
		
		}
		
	}

?>