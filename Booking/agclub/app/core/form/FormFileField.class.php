<?php

	class FormFileField {
        
        public $name;
        public $required;
        public $uploadFolder;
        public $allowedExtensions;
        public $maxFileSize;
		public $templateName = 'forms/fields/filefield.tpl';
		public $cssClasses;
        
        public function __construct($name, $uploadFolder, $allowedExtensions = Array(), $maxFileSize = 2000000, $required = true) {
            $this->name = $name;
            $this->uploadFolder = $uploadFolder;
            $this->required = $required;
            $this->allowedExtensions = $allowedExtensions;
            $this->maxFileSize = $maxFileSize;
        }
        
        public function getFromPost() {
            if (isset($_FILES[$this->name]) && ($_FILES[$this->name]["error"] == 0)) {
                $fileExtension = Utils::getFileExtension($_FILES[$this->name]["name"]);
                if (in_array($fileExtension, $this->allowedExtensions)) {
                    if ($_FILES[$this->name]["size"] <= $this->maxFileSize) {
                        $fileName = $this->generateFileName($_FILES[$this->name]["name"]);
                        $this->upload($_FILES[$this->name]["tmp_name"], $fileName);
                        return $fileName;
                    } else return false;
                } else return false;
            } else if ($this->required) return false;
            return "";
        }
        
		public function getView(&$smarty) {
			$randNum = rand(999,9999);
			$smarty->assign('name',$this->name);
			$smarty->assign('title',$this->title);
			$smarty->assign('randNum',$randNum);
			$smarty->assign('cssClasses',$this->cssClasses);
			$out = $smarty->fetch($this->templateName);
			$smarty->clearAssign('name');
			$smarty->clearAssign('title');
			$smarty->clearAssign('randNum');
			$smarty->clearAssign('cssClasses');
			return $out;
		}
		
        protected function generateFileName($inputFileName) {
            $randName = md5(date('Y-m-d H:i:s') . rand(1,10000));
            $fileName = $randName . '_' . Utils::getFileNameWithoutExt($inputFileName) . '.' . Utils::getFileExtension($inputFileName);
            return $fileName;
        }
        
        protected function upload($from, $to) {
            move_uploaded_file($from, $this->uploadFolder . ds . $to);
        }
    }

?>