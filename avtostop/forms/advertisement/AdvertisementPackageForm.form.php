<?php

	class AdvertisementPackageForm extends Form {
	
		public $packageType;
		public $packagePremiumInterval;
		public $packagePaperInterval;
		public $advertisementColor;
		public $showOnMain;
		public $showOnMap;
		public $isQuickly;
		public $currency;
		public $formId;
		public $recordId;
		
		public static $enableCSRFSecurity = false;
		
		public function __construct() {
		
			$this->packageType = new FormTextField('packageType', FORM_VALIDATION_NUMERIC);
			$this->packageType->minLength = 1;
			$this->packageType->required = true;
			
			$this->packagePremiumInterval = new FormTextField('packagePremiumInterval', FORM_VALIDATION_NUMERIC);
			$this->packagePremiumInterval->minLength = 1;
			$this->packagePremiumInterval->required = false;
			
			$this->currency = new FormTextField('currency', FORM_VALIDATION_NUMERIC);
			$this->currency->minLength = 1;
			$this->currency->required = true;
			
			$this->formId = new FormTextField('formId', FORM_VALIDATION_NUMERIC);
			$this->formId->minLength = 1;
			$this->formId->required = true;
			
			$this->recordId = new FormTextField('recordId', FORM_VALIDATION_NUMERIC);
			$this->recordId->minLength = 1;
			$this->recordId->required = true;
			
			$this->packagePaperInterval = new FormTextField('packagePaperInterval', FORM_VALIDATION_NUMERIC);
			$this->packagePaperInterval->minLength = 1;
			$this->packagePaperInterval->required = false;
			
			$this->advertisementColor = new FormTextField('advertisementColor', FORM_VALIDATION_NUMERIC);
			$this->advertisementColor->minLength = 1;
			$this->advertisementColor->required = false;
			
			$this->showOnMain = new FormTextField('showOnMain', FORM_VALIDATION_NUMERIC);
			$this->showOnMain->minLength = 1;
			$this->showOnMain->required = false;
			
			$this->showOnMap = new FormTextField('showOnMap', FORM_VALIDATION_NUMERIC);
			$this->showOnMap->minLength = 1;
			$this->showOnMap->required = false;
			
			$this->isQuickly = new FormTextField('isQuickly', FORM_VALIDATION_NUMERIC);
			$this->isQuickly->minLength = 1;
			$this->isQuickly->required = false;
			
		}
	
	}

?>