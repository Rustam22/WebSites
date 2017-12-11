<?php

	class FormRadioField extends FormField {
		
		public $templateName = 'forms/fields/radiofield.tpl';
		public $readOnlyTemplateName = 'forms/fields/readonly/radiofield.tpl';
		public $options;
	
        public function __construct($name, $validation = 0, $options, $required = true) {
            parent::__construct($name, $validation, $required);
			$this->options = $options;
        }
		
		public function view($t, &$smarty) {
			$smarty->assign('options', $this->options);
			$smarty->assign('name', $this->name);
			$smarty->assign('title', $this->title);
			$smarty->assign('id', rand(1, 99999));
			$smarty->assign('required', $this->required);
			$smarty->assign('value', $this->value);
			
			$out = $smarty->fetch($t);
			
			$smarty->clearAssign('options');
			$smarty->clearAssign('name');
			$smarty->clearAssign('title');
			$smarty->clearAssign('id');
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