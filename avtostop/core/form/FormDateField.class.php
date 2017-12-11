<?php

	class FormDateField extends FormField  {
		
		public $templateName = 'forms/fields/datefield.tpl';
		public $readOnlyTemplateName = 'forms/fields/readonly/datefield.tpl';
	
        public function __construct($name, $validation = 0, $required = true) {
            parent::__construct($name, $validation, $required);
        }
		
		public function view($t, &$smarty) {
			$smarty->assign('name', $this->name);
			$smarty->assign('title', $this->title);
			$smarty->assign('value', $this->value);
			$smarty->assign('id', rand(1, 9999));
			$smarty->assign('required', $this->required);
			
			$out = $smarty->fetch($t);
			
			$smarty->clearAssign('name');
			$smarty->clearAssign('title');
			$smarty->clearAssign('value');
			$smarty->clearAssign('id');
			$smarty->clearAssign('required');
			
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