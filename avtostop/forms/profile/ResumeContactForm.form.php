<?php

	class ResumeContactForm extends Form {
		
		public $cityId;
		public $familyStatus;
		public $mobilePhone;
		public $homePhone;
		public $webPage;
		public $email;
		public $skype;
		
		public static $enableCSRFSecurity = false;
		
		public function __construct() {
			
			$this->cityId = new FormCityField('cityId', FORM_VALIDATION_STRING);
			$this->cityId->minLength = 1;
			$this->cityId->required = false;
			$this->cityId->title = Application::$m['resume_contact']['cityId'];
			
			$this->familyStatus = new FormRadioField('familyStatus', FORM_VALIDATION_NUMERIC, Application::$m['resume_family_status']);
			$this->familyStatus->minLength = 1;
			$this->familyStatus->required = false;
			$this->familyStatus->title = Application::$m['resume_contact']['familyStatus'];
			
			$this->mobilePhone = new FormTextField('mobilePhone', FORM_VALIDATION_STRING);
			$this->mobilePhone->minLength = 5;
			$this->mobilePhone->required = false;
			$this->mobilePhone->title = Application::$m['resume_contact']['mobilePhone'];
			$this->mobilePhone->clearAfter = true;
			
			$this->homePhone = new FormTextField('homePhone', FORM_VALIDATION_STRING);
			$this->homePhone->minLength = 5;
			$this->homePhone->required = false;
			$this->homePhone->title = Application::$m['resume_contact']['homePhone'];
			
			$this->webPage = new FormTextField('webPage', FORM_VALIDATION_STRING);
			$this->webPage->minLength = 5;
			$this->webPage->required = false;
			$this->webPage->title = Application::$m['resume_contact']['webPage'];
			
			$this->email = new FormTextField('email', FORM_VALIDATION_EMAIL);
			$this->email->minLength = 4;
			$this->email->required = false;
			$this->email->title = Application::$m['resume_contact']['email'];
			
			$this->skype = new FormTextField('skype', FORM_VALIDATION_STRING);
			$this->skype->minLength = 3;
			$this->skype->required = false;
			$this->skype->title = Application::$m['resume_contact']['skype'];
			
		}
		
	}

?>