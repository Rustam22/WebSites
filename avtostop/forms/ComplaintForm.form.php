<?php

    class ComplaintForm extends Form {

        public $full_name;
        public $new_mail;
        public $mobile;
        public $complaint_text;
        public $csrf_key;
        //public $file;

        public static $enableCSRFSecurity = true;

        public function __construct() {
            $messages = Application::$storage['messages']['feedback'];
            $uploadFolder = Application::$settings['public_folder']."/complaintImages/";

            $this->full_name = new FormTextField('full_name', FORM_VALIDATION_STRING);
            $this->full_name->minLength = 5;

            $this->new_mail = new FormTextField('new_mail', FORM_VALIDATION_EMAIL);
            $this->new_mail->minLength = 5;

            $this->mobile = new FormTextField('mobile2', FORM_VALIDATION_STRING);
            $this->mobile->minLength = 5;

            $this->complaint_text = new FormTextArea('complaint_text', FORM_VALIDATION_STRING);
            $this->complaint_text->minLength = 1;

            $this->csrf_key = new FormTextField('csrf_key', FORM_VALIDATION_STRING);
        }

    }

?>