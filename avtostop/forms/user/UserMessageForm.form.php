<?php

	class UserMessageForm extends Form {
	
		public $message;
		public $userId;
		
		public static $enableCSRFSecurity = true;
		public static $hasCaptcha = true;
		
		public function __construct() {
			
			$this->message = new FormTextField('message', FORM_VALIDATION_STRING);
			$this->message->minLength = 3;
			$this->message->required = true;
			
			$this->userId = new FormTextField('userId', FORM_VALIDATION_NUMERIC);
			$this->userId->minLength = 1;
			$this->userId->required = true;
			
		}
	
	}

?>