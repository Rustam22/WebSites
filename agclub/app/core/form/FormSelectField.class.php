<?php

	class FormSelectField extends FormField {
	
		public $templateName = 'forms/fields/selectfield.tpl';
		public $options;
	
        public function __construct($name, $validation = 1, $options, $required = true) {
            parent::__construct($name, $validation, $required);
			$this->options = $options;
        }
		
		public function getView(&$smarty) {
			$randNum = rand(999,9999);
			$smarty->assign('options',$this->options);
			$smarty->assign('name',$this->name);
			$smarty->assign('title',$this->title);
			$smarty->assign('randNum',$randNum);
			$out = $smarty->fetch($this->templateName);
			$smarty->clearAssign('options');
			$smarty->clearAssign('name');
			$smarty->clearAssign('title');
			$smarty->clearAssign('randNum');
			return $out;
		}
    }

?>