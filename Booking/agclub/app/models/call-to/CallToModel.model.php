<?php	class CallToModel extends CRUDModel {			public $name;		public $subject;		public $time;		public $number;				public function __construct() {			$messages = Application::$messages['model_call_to'];						$this->name = new ModelTextField("name", $messages['field_name'], true, false);			$this->subject = new ModelTextField("subject", $messages['field_subject'], true, false);						$this->time = new ModelTextField("time", $messages['field_time'], true, false);			$this->number = new ModelTextField("number", $messages['field_number'], true, false);		}				public static function initialize() {			self::$multiLang = false;			self::$title = Application::$messages['model_call_to']['title'];			self::$iconPath = 'category-icons.png';			self::$useOwnViewUrl = false;			self::$displayFields = Array('time', 'number');		}		}?>