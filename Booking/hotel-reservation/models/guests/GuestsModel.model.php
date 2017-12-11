<?php

	class GuestsModel extends CRUDModel {
		
		public $name;
		public $token;
		
		public function __construct() {
			$messages = Application::$messages['common_messages'];
			
			$this->name = new ModelTextField("name", $messages['name'], true, false);
			
			$this->token = new ModelTextField("token", '', true, false);
			$this->token->hidden = true;
			$this->token->required = false;
			
		}
		
		public static function initialize() {
			self::$multiLang = false;
			self::$title = Application::$messages['model_guest']['title'];
			self::$iconPath = 'category-icons.png';
			self::$useOwnViewUrl = false;
			self::$displayFields = Array('name');
		}
		
		public static function getByToken($token) {
			return self::find(" WHERE `token` = '{#1}'", Array($token));
		}
		
	}

?>