<?php

	class FormCheckBoxField extends FormField {
		
		public $templateName = 'forms/fields/checkboxfield.tpl';
		public $readOnlyTemplateName = 'forms/fields/readonly/checkboxfield.tpl';
		public $options;
	
        public function __construct($name, $validation = 0, $options = Array(), $required = true) {
            parent::__construct($name, $validation, $required);
			$this->options = $options;
        }
		
		public function view($t, &$smarty) {
			$smarty->assign('options', $this->options);
			$smarty->assign('name', $this->name);
			$smarty->assign('title', $this->title);
			$smarty->assign('required', $this->required);
			$smarty->assign('id', rand(1, 99999));
			if ($this->value) $smarty->assign('value', explode(',', $this->value));
			
			$out = $smarty->fetch($t);
			
			$smarty->clearAssign('options');
			$smarty->clearAssign('name');
			$smarty->clearAssign('title');
			$smarty->clearAssign('required');
			$smarty->clearAssign('id');
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