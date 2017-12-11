<?php

	class AdvertisementForm extends Form {
		
		public $userName;
		public $userMail;
		public $userPhone;
		public $title;
		public $description;
		public $price;
		public $currency;
		public $userId;
		
		public static $enableCSRFSecurity = false;
		
		public function __construct() {
		
			$this->userName = new FormTextField('userName', FORM_VALIDATION_STRING);
			$this->userName->minLength = 3;
			$this->userName->required = false;
			
			$this->userMail = new FormTextField('userMail', FORM_VALIDATION_EMAIL);
			$this->userMail->minLength = 3;
			$this->userMail->required = false;
			
			$this->userPhone = new FormDateField('userPhone', FORM_VALIDATION_STRING);
			$this->userPhone->minLength = 5;
			$this->userPhone->required = false;
			
			$this->title = new FormTextField('title', FORM_VALIDATION_STRING);
			$this->title->minLength = 5;
			$this->title->required = false;
			
			$this->description = new FormTextField('description', FORM_VALIDATION_STRING);
			$this->description->minLength = 3;
			$this->description->required = false;
			
			$this->price = new FormTextField('price', FORM_VALIDATION_STRING);
			$this->price->minLength = 2;
			$this->price->required = false;
			
			$this->currency = new FormTextField('currency', FORM_VALIDATION_NUMERIC);
			$this->currency->minLength = 1;
			$this->currency->required = false;
			
			$this->userId = new FormTextField('userId', FORM_VALIDATION_NUMERIC);
			$this->userId->minLength = 1;
			$this->userId->required = false;
		
		}
		
	}

?>