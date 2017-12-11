<?php

	class UserContactTypesModel extends CRUDModel {
	
		public $r_id;
		public $lang_id;
		public $cTitle;
		
		public static $multiLang = true;
		
		public function __construct() {
		
			$this->cTitle = new ModelTextField('cTitle', 'Adı', true, true);
			$this->cTitle->required = false;
		}
		
		public static function initialize() {
			self::$title = 'İstifadəçi kontakt növləri';
			self::$iconPath = 'banner-icon.png';
			self::$displayFields = Array('cTitle');
			self::$multiLang = true;
			self::$useOwnViewUrl = false;
		}
		
		public static function getTypes($lang) {
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `lang_id` = '{#1}' ";
			return self::fQuery($sql, Array($lang));
		}
	
	}

?>