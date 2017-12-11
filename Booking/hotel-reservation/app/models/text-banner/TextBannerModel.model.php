<?php

	class TextBannerModel extends CRUDModel {
		
		public $r_id;
		public $lang_id;
		public $iTitle;
		public $content;
		
		public function __construct() {
			$messages = Application::$messages['model_text_banner'];
			$this->iTitle = new ModelTextField("iTitle", $messages['field_iTitle'], true, true);
			$this->iTitle->required = false;
			
			$this->content = new ModelTextArea("content", $messages['field_content'], true, true);
			$this->content->required = false;
		}
		
		public static function initialize() {
			self::$displayFields = Array('iTitle');
			self::$title = Application::$messages['model_text_banner']['title'];
			self::$iconPath = 'category-icons.png';
			self::$multiLang = true;
			self::$useOwnViewUrl = false;
		}
		
	}

?>