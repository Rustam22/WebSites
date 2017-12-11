<?php
	
	class ResumeMainForm extends Form {
		
		public $profession;
		public $profArea;
		public $salary;
		public $salaryCurrency;
		public $education;
		public $eduLevel;
		public $educationMore;
		public $workTime;
		public $busy;
		public $workTimeMore;
		public $ownLanguage;
		public $languages;
		public $drivingLicense;
		public $computerKnowledges;
		
		public static $enableCSRFSecurity = false;
		
		public function __construct() {
			
			$this->profession = new FormTextField('profession', FORM_VALIDATION_STRING);
			$this->profession->minLength = 3;
			$this->profession->required = false;
			$this->profession->title = Application::$m['resume_main']['profession'];
			
			$this->profArea = new FormSelectField('profArea', FORM_VALIDATION_NUMERIC, CategoryModel::getProfArea($_SESSION['lang']));
			$this->profArea->minLength = 1;
			$this->profArea->required = false;
			$this->profArea->title = Application::$m['resume_main']['profArea'];
			
			$this->salary = new FormTextField('salary', FORM_VALIDATION_NUMERIC);
			$this->salary->minLength = 1;
			$this->salary->required = false;
			$this->salary->title = Application::$m['resume_main']['salary'];
			
			$this->salaryCurrency = new FormSelectField('salaryCurrency', FORM_VALIDATION_NUMERIC, Application::$settings['currency']);
			$this->salaryCurrency->minLength = 1;
			$this->salaryCurrency->required = false;
			$this->salaryCurrency->title = Application::$m['resume_main']['salaryCurrency'];
			
			$this->education = new FormTextField('education', FORM_VALIDATION_STRING);
			$this->education->minLength = 3;
			$this->education->required = false;
			$this->education->title = Application::$m['resume_main']['education'];
			
			$this->eduLevel = new FormSelectField('eduLevel', FORM_VALIDATION_NUMERIC, Application::$m['resume_edu_level']);
			$this->eduLevel->minLength = 1;
			$this->eduLevel->required = false;
			$this->eduLevel->title = Application::$m['resume_main']['eduLevel'];
			$this->eduLevel->clearAfter = true;
			
			$this->educationMore = new FormTextArea('educationMore', FORM_VALIDATION_STRING);
			$this->educationMore->minLength = 1;
			$this->educationMore->required = false;
			$this->educationMore->title = Application::$m['resume_main']['educationMore'];
			$this->educationMore->clearAfter = true;
			
			$this->workTime = new FormSelectField('workTime', FORM_VALIDATION_NUMERIC, Application::$m['resume_work_time']);
			$this->workTime->minLength = 1;
			$this->workTime->required = false;
			$this->workTime->title = Application::$m['resume_main']['workTime'];
			
			$this->busy = new FormSelectField('busy', FORM_VALIDATION_NUMERIC, Application::$m['resume_busy']);
			$this->busy->minLength = 1;
			$this->busy->required = false;
			$this->busy->title = Application::$m['resume_main']['busy'];
			$this->busy->clearAfter = true;
			
			$this->workTimeMore = new FormTextArea('workTimeMore', FORM_VALIDATION_STRING);
			$this->workTimeMore->minLength = 1;
			$this->workTimeMore->required = false;
			$this->workTimeMore->title = Application::$m['resume_main']['workTimeMore'];
			$this->workTimeMore->clearAfter = true;
			
			$this->ownLanguage = new FormTextField('ownLanguage', FORM_VALIDATION_STRING);
			$this->ownLanguage->minLength = 3;
			$this->ownLanguage->required = false;
			$this->ownLanguage->title = Application::$m['resume_main']['ownLanguage'];
			
			$this->languages = new FormSelectField('languages', FORM_VALIDATION_NUMERIC, Application::$m['resume_languages']);
			$this->languages->minLength = 1;
			$this->languages->required = false;
			$this->languages->title = Application::$m['resume_main']['languages'];
			
			$this->drivingLicense = new FormSelectField('drivingLicense', FORM_VALIDATION_NUMERIC, Application::$m['resume_driving_license']);
			$this->drivingLicense->minLength = 1;
			$this->drivingLicense->required = false;
			$this->drivingLicense->title = Application::$m['resume_main']['drivingLicense'];
			$this->drivingLicense->clearAfter = true;
			
			$this->computerKnowledges = new FormTextArea('computerKnowledges', FORM_VALIDATION_STRING);
			$this->computerKnowledges->minLength = 1;
			$this->computerKnowledges->required = false;
			$this->computerKnowledges->title = Application::$m['resume_main']['computerKnowledges'];
			
		}
		
	}
	
?>