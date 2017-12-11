<?php

	class HoroscopeMonthModel extends CRUDModel {
		
		public $r_id;
		public $lang_id;
		public $horoscopeTitle;
		public $month;
		public $contentMan;
		public $contentWoman;
		
		public function __construct() {
			$messages = Application::$messages['model_horoscope_month'];
			$lang = Application::$settings['default_language'];
			
			$this->horoscopeTitle = new ModelTextField("horoscopeTitle", $messages['field_horoscopeTitle'], true, true);
			//$this->horoscopeTitle->common = true;
			
			$this->sex = new ModelSelectField("sex", $messages['field_sex'], Array(
				1 => 'Man',
				2 => 'Woman'
			), true, true);
			$this->sex->common = true;
			
			$this->month = new ModelSelectField("month", $messages['field_month'], Application::$settings['month'][$lang], true, true);
			$this->month->common = true;
			
			$this->contentMan = new ModelTinyMce("contentMan", $messages['field_contentMan'], true, true);
			$this->contentWoman = new ModelTinyMce("contentWoman", $messages['field_contentWoman'], true, true);
		}
		
		public static function initialize() {
			self::$title = Application::$messages['model_horoscope_month']['title'];
			self::$displayFields = Array('horoscopeTitle', 'month');
			self::$iconPath = 'category-icons.png';
			self::$multiLang = true;
			self::$useOwnViewUrl = false;
		}
		
		public static function getHoroscopeForMonth($month, $lang) {
			$data = self::find(" WHERE `month` = '{#1}' AND `lang_id` = '{#2}' ORDER BY `id` DESC LIMIT 1", Array($month, $lang));
			if (count($data)) return $data[0];
			else return false;
		}
		
	}

?>