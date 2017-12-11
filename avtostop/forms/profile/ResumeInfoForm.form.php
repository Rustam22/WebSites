<?php

	class ResumeInfoForm extends Form {
		
		public $name;
		public $sex;
		public $birthday;
		public $citizenship;
		
		public static $enableCSRFSecurity = false;
		
		public function __construct() {
			
			$this->name = new FormTextField('name', FORM_VALIDATION_STRING);
			$this->name->minLength = 3;
			$this->name->required = false;
			$this->name->title = 'name';
			$this->name->value = 'name';
			
			$this->sex = new FormRadioField('sex', FORM_VALIDATION_NUMERIC, Array(
				'0' => 'man',
				'1' => 'woman'
			));
			$this->sex->minLength = 1;
			$this->sex->required = false;
			$this->sex->title = 'Sex';
			$this->sex->value = '1';
			$this->sex->templateName = 'forms' . ds . 'fields' . ds . 'radio-horizontal.tpl';
			$this->sex->readOnlyTemplateName = 'forms' . ds . 'fields' . ds . 'readonly' . ds . 'radio-horizontal.tpl';
			
			$this->birthday = new FormDateField('birthday', FORM_VALIDATION_STRING);
			$this->birthday->minLength = 3;
			$this->birthday->required = false;
			$this->birthday->title = 'Birthday';
			$this->birthday->value = 'Birthday';
			
			$this->citizenship = new FormSelectField('citizenship', FORM_VALIDATION_STRING, Array(
				1 => 'Citizenship1',
				2 => 'Citizenship2',
				3 => 'Citizenship3'
			));
			$this->citizenship->minLength = 1;
			$this->citizenship->required = false;
			$this->citizenship->title = 'Citizenship';
			$this->citizenship->value = '3';
			
			
		}
		
	}

?>