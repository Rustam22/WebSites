<?php

	class FormTextArea extends FormField  {
		
		public $templateName = 'forms/fields/textarea.tpl';
		public $readOnlyTemplateName = 'forms/fields/readonly/textarea.tpl';
	
        public function __construct($name, $validation = 1, $required = true) {
            parent::__construct($name, $validation, $required);
        }
		
		public function view($t, &$smarty) {
			$smarty->assign('name', $this->name);
			$smarty->assign('title', $this->title);
			$smarty->assign('required', $this->required);
			$smarty->assign('value', $this->value);
			
			$out = $smarty->fetch($t);
			
			$smarty->clearAssign('name');
			$smarty->clearAssign('title');
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