<?php

	class UserReviewForm extends Form {
		
		public $review;
		public $user;
		
		public static $enableCSRFSecurity = true;
		
		public function __construct() {
			$this->review = new FormTextField('review', FORM_VALIDATION_STRING);
			$this->review->minLength = 3;
			$this->review->required = true;
			
			$this->user = new FormTextField('user', FORM_VALIDATION_NUMERIC);
			$this->user->minLength = 1;
			$this->user->required = true;
		}
		
	}

?>