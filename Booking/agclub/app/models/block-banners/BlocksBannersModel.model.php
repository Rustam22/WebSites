<?php

	class BlocksBannersModel extends CRUDModel {
	
		public $r_id;
		public $lang_id;
		public $iTitle;
		public $url;
		public $image;
		/*
			Values:
			0 : left
			1 : right
			2 : center
		*/
		public $position;
		
		public function __construct() {
			$messages = Application::$messages['common_messages'];
			$this->iTitle = new ModelTextField("iTitle", $messages['field_iTitle'], true, true);
			
			$this->url = new ModelTextField("url", $messages['field_url'], true, true);
			
			$this->image = new ModelFMImageField("image", $messages['field_image'], true, true);
			
			$this->position = new ModelSelectField("position", $messages['field_position'], Array(
				0 => $messages['inleft'],
				1 => $messages['inright'],
				2 => $messages['incenter']
			), true, true);
			$this->position->common = true;
		}
		
		public static function initialize() {
			self::$title = Application::$messages['model_block_banners']['title'];
			self::$iconPath = 'banner-icon.png';
			self::$displayFields = Array('image', 'iTitle', 'url', 'position');
			self::$multiLang = true;
		}
	
	}

?>