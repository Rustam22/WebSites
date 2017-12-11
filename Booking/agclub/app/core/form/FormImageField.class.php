<?php

	class FormImageField extends FormFileField {
        public function __construct($name, $uploadFolder, $allowedExtensions = Array(), $maxFileSize = 2000000, $required = true) {
            parent::__construct($name, $uploadFolder, $allowedExtensions, $maxFileSize, $required);
        }
    }

?>