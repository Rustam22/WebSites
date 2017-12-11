<?php

	class ApplicationFormModel extends CRUDModel {
		
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
		public $submitted;
		
		public static $multiLang = false;
		
		public function __construct(
			$status = null,
			$companyName = null,
			$legalAddress = null,
			$currentAddress = null,
			$regCertificate = null,
			$voen = null,
			$cityNumber = null,
			$mobileNumber = null,
			$fax = null,
			$email = null,
			$site = null,
			$description = null,
			$logo = null,
			$chiefName = null,
			$chiefPosition = null,
			$chiefPassport = null,
			$chiefMobilePhone = null,
			$chiefMail = null,
			$chiefPhoto = null,
			$atibPartnerName = null,
			$atibPartnerPosition = null,
			$atibPartnerMob = null,
			$atibPartnerMail = null,
			$atibDate = null,
			$submitted = null
		) {
			$messages = Application::$messages['application_form'];
			
			$this->status = new ModelSelectField("status", $messages['status'], Array(0 => 'H', 1 => 'F'), true, false);
			$this->status->value = $status;
			
			$this->companyName = new ModelTextField("companyName", $messages['companyName'], true, false);
			$this->companyName->value = $companyName;
			
			$this->legalAddress = new ModelTextField("legalAddress", $messages['legalAddress'], true, false);
			$this->legalAddress->value = $legalAddress;
			
			$this->currentAddress = new ModelTextField("currentAddress", $messages['currentAddress'], true, false);
			$this->currentAddress->value = $currentAddress;
			
			$this->regCertificate = new ModelFMImageField("regCertificate", $messages['regCertificate'], false, true);
			$this->regCertificate->value = $regCertificate;
			
			$this->voen = new ModelFMImageField("voen", $messages['voen'], false, true);
			$this->voen->value = $voen;
			
			$this->cityNumber = new ModelTextField("cityNumber", $messages['cityNumber'], true, false);
			$this->cityNumber->value = $cityNumber;
			
			$this->mobileNumber = new ModelTextField("mobileNumber", $messages['mobileNumber'], true, false);
			$this->mobileNumber->value = $mobileNumber;
			
			$this->fax = new ModelTextField("fax", $messages['fax'], true, false);
			$this->fax->value = $fax;
			
			$this->email = new ModelTextField("email", $messages['email'], true, false);
			$this->email->value = $email;
			
			$this->site = new ModelTextField("site", $messages['site'], true, false);
			$this->site->value = $site;
			
			$this->description = new ModelFMImageField("description", $messages['description'], false, true);
			$this->description->value = $description;
			
			$this->logo = new ModelFMImageField("logo", $messages['logo'], false, true);
			$this->logo->value = $logo;
			
			$this->chiefName = new ModelTextField("chiefName", $messages['chiefName'], true, false);
			$this->chiefName->value = $chiefName;
			
			$this->chiefPosition = new ModelTextField("chiefPosition", $messages['chiefPosition'], true, false);
			$this->chiefPosition->value = $chiefPosition;
			
			$this->chiefPassport = new ModelFMImageField("chiefPassport", $messages['chiefPassport'], false, true);
			$this->chiefPassport->value = $chiefPassport;
			
			$this->chiefMobilePhone = new ModelTextField("chiefMobilePhone", $messages['chiefMobilePhone'], true, false);
			$this->chiefMobilePhone->value = $chiefMobilePhone;
			
			$this->chiefMail = new ModelTextField("chiefMail", $messages['chiefMail'], true, false);
			$this->chiefMail->value = $chiefMail;
			
			$this->chiefPhoto = new ModelFMImageField("chiefPhoto", $messages['chiefPhoto'], false, true);
			$this->chiefPhoto->value = $chiefPhoto;
			
			$this->atibPartnerName = new ModelTextField("atibPartnerName", $messages['atibPartnerName'], true, false);
			$this->atibPartnerName->value = $atibPartnerName;
			
			$this->atibPartnerPosition = new ModelTextField("atibPartnerPosition", $messages['atibPartnerPosition'], true, false);
			$this->atibPartnerPosition->value = $atibPartnerPosition;
			
			$this->atibPartnerMob = new ModelTextField("atibPartnerMob", $messages['atibPartnerMob'], true, false);
			$this->atibPartnerMob->value = $atibPartnerMob;
			
			$this->atibPartnerMail = new ModelTextField("atibPartnerMail", $messages['atibPartnerMail'], true, false);
			$this->atibPartnerMail->value = $atibPartnerMail;
			
			$this->atibDate = new ModelDateField("atibDate", $messages['atibDate'], true, false);
			$this->atibDate->value = $atibDate;
			
			$this->submitted = new ModelSelectField("submitted", $messages['submitted'], Array(
				0 => 'No', 
				1 => 'Yes'
			), true, false);
			$this->submitted->value = $submitted;
			
		}
		
		public static function initialize() {
			self::$multiLang = false;
			self::$displayFields = Array('companyName');
			self::$iconPath = 'category-icons.png';
			self::$title = Application::$messages['application_form']['title'];
			self::$viewUrl = 'application-form';
			self::$useOwnViewUrl = false;
		}
		
	}

?>