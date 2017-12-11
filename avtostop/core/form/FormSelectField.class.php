<?php

	class FormSelectField extends FormField {
	
		public $templateName = 'forms/fields/selectfield.tpl';
		public $readOnlyTemplateName = 'forms/fields/readonly/selectfield.tpl';
		public $options;
	
        public function __construct($name, $validation = 1, $options, $required = true) {
            parent::__construct($name, $validation, $required);
			$this->options = $options;
        }
		
		public function view($t, &$smarty) {
			$randNum = rand(999,9999);
			$smarty->assign('options', $this->options);
			$smarty->assign('name', $this->name);
			$smarty->assign('title', $this->title);
			$smarty->assign('randNum', $randNum);
			$smarty->assign('id', rand(1, 9999));
			$smarty->assign('value', $this->value);
			$smarty->assign('required', $this->required);
			
			$out = $smarty->fetch($t);
			
			$smarty->clearAssign('options');
			$smarty->clearAssign('name');
			$smarty->clearAssign('title');
			$smarty->clearAssign('randNum');
			$smarty->clearAssign('id');
			$smarty->clearAssign('value');
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