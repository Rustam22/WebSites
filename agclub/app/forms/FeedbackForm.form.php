<?php

	class FeedbackForm extends Form {
		
		public $name;
		//public $address;
		public $email;
		public $text;
		
		public static $enableCSRFSecurity = false;
		
		public function __construct() {
			$messages = Application::$storage['messages']['feedback'];
			
			$this->name = new FormTextField('name', FORM_VALIDATION_STRING);
			$this->name->minLength = 5;
			$this->name->title = $messages['name'];
			
			$this->address = new FormTextField('address', FORM_VALIDATION_STRING);
			$this->address->minLength = 5;
			$this->address->title = $messages['address'];
			
			$this->email = new FormTextField('email', FORM_VALIDATION_EMAIL);
			$this->email->minLength = 5;
			$this->email->title = $messages['email'];
			
			$this->text = new FormTextArea('text', FORM_VALIDATION_STRING);
			$this->text->minLength = 5;
			$this->text->title = $messages['message'];
		}
		
	}

?>