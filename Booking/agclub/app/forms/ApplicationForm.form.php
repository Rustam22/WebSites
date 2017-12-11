<?php

	class ApplicationForm extends Form {
		
		public $status;
		public $companyName;
		public $legalAddress;
		public $currentAddress;
		public $regCertificate;
		public $voen;
		public $cityNumber;
		public $mobileNumber;
		public $fax;
		public $email;
		public $site;
		public $description;
		public $logo;
		public $chiefName;
		public $chiefPosition;
		public $chiefPassport;
		public $chiefMobilePhone;
		public $chiefMail;
		public $chiefPhoto;
		public $atibPartnerName;
		public $atibPartnerPosition;
		public $atibPartnerMob;
		public $atibPartnerMail;
		public $atibDate;
		
		public static $enableCSRFSecurity = true;
		
		public function __construct() {
			$messages = Application::$storage['messages']['app_form'];
			$this->status = new FormSelectField('status', 0, Array(
				0 => $messages['huq'], 
				1 => $messages['fiz']
			));
			$this->status->templateName = 'forms/fields/status-selectfield.tpl';
			
			$this->companyName = new FormTextField('companyName');
			$this->companyName->title = $messages['companyName'];
			
			$this->legalAddress = new FormTextField('legalAddress');
			$this->legalAddress->title = $messages['legalAddress'];
			
			$this->currentAddress = new FormTextField('currentAddress');
			$this->currentAddress->title = $messages['currentAddress'];
			
			$this->regCertificate = new FormFileField('regCertificate', Application::$settings['public_folder'] . ds .'site_users' . ds . 'reg-certificate', Application::$settings['image_extensions']);
			$this->regCertificate->title = $messages['regCertificate'];
			$this->regCertificate->cssClasses = " form-element-physical ";
			
			$this->voen = new FormFileField('voen', Application::$settings['public_folder'] . ds .'site_users' . ds . 'voen', Application::$settings['image_extensions']);
			$this->voen->title = $messages['voen'];
			
			$this->cityNumber = new FormTextField('cityNumber');
			$this->cityNumber->title = $messages['cityNumber'];
			$this->cityNumber->templateName = 'forms/fields/city-number-select-field.tpl';
			
			$this->mobileNumber = new FormTextField('mobileNumber');
			$this->mobileNumber->templateName = 'forms/fields/mobile-number-select-field.tpl';
			$this->mobileNumber->title = $messages['mobileNumber'];
			
			$this->fax = new FormTextField('fax');
			$this->fax->title = $messages['fax'];
			$this->fax->templateName = 'forms/fields/city-number-select-field.tpl';
			
			$this->email = new FormTextField('email', FORM_VALIDATION_EMAIL);
			$this->email->title = $messages['email'];
			
			$this->site = new FormTextField('site');
			$this->site->title = $messages['site'];
			
			$this->description = new FormFileField('description', Application::$settings['public_folder'] . ds .'site_users' . ds . 'company-description', Application::$settings['image_extensions']);
			$this->description->title = $messages['description'];
			
			$this->logo = new FormFileField('logo', Application::$settings['public_folder'] . ds .'site_users' . ds . 'logo', Application::$settings['image_extensions']);
			$this->logo->title = $messages['logo'];
			$this->logo->cssClasses = " form-element-physical ";
			
			$this->chiefName = new FormTextField('chiefName');
			$this->chiefName->title = $messages['chiefName'];
			
			$this->chiefPosition = new FormTextField('chiefPosition');
			$this->chiefPosition->title = $messages['chiefPosition'];
			
			$this->chiefPassport = new FormFileField('chiefPassport', Application::$settings['public_folder'] . ds .'site_users' . ds . 'chief-passport', Application::$settings['image_extensions']);
			$this->chiefPassport->title = $messages['chiefPassport'];
			
			$this->chiefMobilePhone = new FormTextField('chiefMobilePhone');
			$this->chiefMobilePhone->title = $messages['chiefMobilePhone'];
			$this->chiefMobilePhone->templateName = 'forms/fields/mobile-number-select-field.tpl';
			
			$this->chiefMail = new FormTextField('chiefMail');
			$this->chiefMail->title = $messages['chiefMail'];
			
			$this->chiefPhoto = new FormFileField('chiefPhoto', Application::$settings['public_folder'] . ds .'site_users' . ds . 'chief-photo', Application::$settings['image_extensions']);
			$this->chiefPhoto->title = $messages['chiefPhoto'];
			
			$this->atibPartnerName = new FormTextField('atibPartnerName');
			$this->atibPartnerName->title = $messages['atibPartnerName'];
			
			$this->atibPartnerPosition = new FormTextField('atibPartnerPosition');
			$this->atibPartnerPosition->title = $messages['atibPartnerPosition'];
			
			$this->atibPartnerMob = new FormTextField('atibPartnerMob');
			$this->atibPartnerMob->title = $messages['atibPartnerMob'];
			$this->atibPartnerMob->templateName = 'forms/fields/mobile-number-select-field.tpl';
			
			$this->atibPartnerMail = new FormTextField('atibPartnerMail');
			$this->atibPartnerMail->title = $messages['atibPartnerMail'];
			
			$this->atibDate = new FormTextField('atibDate');
			$this->atibDate->title = $messages['atibDate'];
		}
		
	}

?>