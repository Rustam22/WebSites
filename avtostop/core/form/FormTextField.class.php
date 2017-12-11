<?php

	class FormTextField extends FormField  {
		
		public $templateName = 'forms/fields/textfield.tpl';
		public $readOnlyTemplateName = 'forms/fields/readonly/textfield.tpl';
	
        public function __construct($name, $validation = 3, $required = true) {
            parent::__construct($name, $validation, $required);
        }
		
		public function view($t, $smarty) {
			$randNum = rand(999,9999);
			$smarty->assign('name', $this->name);
			$smarty->assign('title', $this->title);
			$smarty->assign('randNum', $randNum);
			$smarty->assign('required', $this->required);
			$smarty->assign('value', $this->value);
			
			$out = $smarty->fetch($t);
			
			$smarty->clearAssign('name');
			$smarty->clearAssign('title');
			$smarty->clearAssign('randNum');
			$smarty->clearAssign('required');
			$smarty->clearAssign('value');
			
			return $out;
		}
		
		public function getView(&$smarty) {
			return self::view($this->templateName, $smarty);
		}
		
		public function readOnlyView(&$smarty) {
			return self::view($this->readOnlyTemplateName, $smarty);
		}
    }

?>