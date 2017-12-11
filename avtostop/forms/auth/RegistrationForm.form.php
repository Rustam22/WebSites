<?php

	class RegistrationForm extends Form {
		public $email;
		public $password;
		public $passwordConfirm;
		public $questionAnswer;
		public $secretQuestion;
		public $userType;
		public $name;
		public $userAgree;
		
		
		public static $enableCSRFSecurity = false;
		public static $hasCaptcha = false;
		
		public function __construct() {
		
			$this->email = new FormTextField('r-email', FORM_VALIDATION_EMAIL);
			$this->name = new FormTextField('name', FORM_VALIDATION_STRING);
			$this->password = new FormTextField('password', FORM_VALIDATION_STRING);
			$this->passwordConfirm = new FormTextField('password_confirm', FORM_VALIDATION_STRING);
			$this->questionAnswer = new FormTextField('question_answer', FORM_VALIDATION_STRING);
			$this->secretQuestion = new FormTextField('secret_question', FORM_VALIDATION_NUMERIC);
			$this->userType = new FormTextField('user_type', FORM_VALIDATION_NUMERIC);
			$this->userAgree = new FormTextField('user_agree', FORM_VALIDATION_NUMERIC);
			
		}
	}

?>