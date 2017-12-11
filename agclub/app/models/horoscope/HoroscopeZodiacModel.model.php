<?php

	class HoroscopeZodiacModel extends CRUDModel {
		
		public $r_id;
		public $lang_id;
		public $horoscopeTitle;
		public $sex;
		public $zodiac;
		public $month;
		public $content;
		
		public function __construct() {
			$messages = Application::$messages['model_horoscope_zodiac'];
			$lang = Application::$settings['default_language'];
			
			$this->horoscopeTitle = new ModelTextField("horoscopeTitle", $messages['field_horoscopeTitle'], true, true);
			//$this->horoscopeTitle->common = true;
			
			$this->sex = new ModelSelectField("sex", $messages['field_sex'], Array(
				1 => 'Man',
				2 => 'Woman'
			), true, true);
			$this->sex->common = true;
			
			$this->zodiac = new ModelSelectField("zodiac", $messages['field_zodiac'], Application::$settings['zodiac'][$lang], true, true);
			$this->zodiac->common = true;
			
			$this->month = new ModelSelectField("month", $messages['field_month'], Application::$settings['month'][$lang], true, true);
			$this->month->common = true;
			
			$this->content = new ModelTinyMce("content", $messages['field_content'], true, true);
		}
		
		public static function initialize() {
			self::$title = Application::$messages['model_horoscope_zodiac']['title'];
			self::$displayFields = Array('horoscopeTitle', 'sex', 'zodiac', 'month');
			self::$iconPath = 'category-icons.png';
			self::$multiLang = true;
			self::$useOwnViewUrl = false;
		}
		
		public static function getHoroscope($sex, $zodiac, $lang, $month) {
			$r = self::find(
				" WHERE 
				`lang_id` = '{#1}' 
				AND `zodiac` = '{#2}' 
				AND `sex` = '{#3}' 
				AND `month` = '{#4}'
				ORDER BY `r_id` LIMIT 1", 
				Array($lang, $zodiac, $sex, $month)
			);
			if (count($r)) return $r[0];
			else return false;
		}
		
	}

?>