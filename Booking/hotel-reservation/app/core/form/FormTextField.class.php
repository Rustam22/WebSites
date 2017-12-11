<?php

	class FormTextField extends FormField  {
		
		public $templateName = 'forms/fields/textfield.tpl';
	
        public function __construct($name, $validation = 3, $required = true) {
            parent::__construct($name, $validation, $required);
        }
		
		public function getView(&$smarty) {
			$randNum = rand(999,9999);
			$smarty->assign('name',$this->name);
			$smarty->assign('title',$this->title);
			$smarty->assign('randNum',$randNum);
			$out = $smarty->fetch($this->templateName);
			$smarty->clearAssign('name');
			$smarty->clearAssign('title');
			$smarty->clearAssign('randNum');
			return $out;
		}
    }

?>