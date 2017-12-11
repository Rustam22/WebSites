<?php

	class SecretQuestionsModel extends CRUDModel {
	
		public $r_id;
		public $lang_id;
		public $qTitle;
		
		public static $multiLang = true;
		
		public function __construct() {
		
			$this->qTitle = new ModelTextField('qTitle', 'Sual', true, true);
			$this->qTitle->required = false;
		}
		
		public static function initialize() {
			self::$title = 'Gizli sual';
			self::$iconPath = 'banner-icon.png';
			self::$displayFields = Array('qTitle');
			self::$multiLang = true;
			self::$useOwnViewUrl = false;
		}
		
		public static function getQuestions($lang) {
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `lang_id` = '{#1}' ";
			return self::fQuery($sql, Array($lang));
		}
		
	}

?>