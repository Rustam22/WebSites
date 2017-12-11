<?php

	class IBannerItemsModel extends CRUDModel {
	
		public $r_id;
		public $lang_id;
		public $bannerTitle;
		public $category;
		public $image;
		public $text;
		public $position;
	
		public static $multiLang = true;
	
		public function __construct() {
			$messages = Application::$messages['model_ibanner_items'];
			
			$this->bannerTitle = new ModelTextField("bannerTitle", $messages['field_bannerTitle'], true, true);
			$this->bannerTitle->common = true;
			
			$category = IBannerCategoriesModel::getAsKeyVal('id', 'categoryTitle', Application::$settings['default_language']);
			$this->category = new ModelCheckBoxField("category", $messages['field_category'], $category, true, true);
			
			$this->image = new ModelFMImageField("image", $messages['field_image'], true, true);
			
			$this->text = new ModelTextArea("text", $messages['field_text'], true, true);
			
			$this->position = new ModelSelectField("sex", $messages['field_position'], Array(
				0 => Application::$messages['common_messages']['inleft'], 
				1 => Application::$messages['common_messages']['incenter'], 
				2 => Application::$messages['common_messages']['inright']
			), true, true);
		}
		
		public static function initialize() {
			self::$multiLang = true;
			self::$title = Application::$messages['model_ibanner_items']['title'];
			self::$iconPath = 'category-icons.png';
			self::$useOwnViewUrl = false;
			self::$displayFields = Array('image', 'bannerTitle', 'category', 'position');
		}
		
		public static function getBanners($user, $lang, $limit = 9) {
			
			$categories = null;
			if ($user) {
				$user = SiteUsersModel::getById($user['id']);
				$categories = IBannerCategoriesModel::getCategoriesForUser($user);
			} else {
				$categories = IBannerCategoriesModel::getCategoriesForUser();
			}
			$out = Array();
			$userName = '';
			if ($categories) {
				$cId = Array();
				foreach ($categories as $c) {
					$cId[] = "`category` LIKE '%," . $c->id->value . ",%'";
				}
				$cId = join(" OR ", $cId);
				$out = self::find(" WHERE `lang_id` = '".$lang."' AND " . $cId);
				$userName = $user->name->value;
			} else $out = self::find(" WHERE `lang_id` = '".$lang."' ORDER BY RAND() LIMIT ".$limit);
			
			$c = count($out);
			
			for ($i = 0; $i < $c; $i++) {
				$out[$i]->text->value = Utils::pasteToTag($out[$i]->text->value, $userName, 'name');
				switch (intval($out[$i]->position->value)) {
					case 0:
						$out[$i]->posClass = 'text-left';
						break;
					case 1:
						$out[$i]->posClass = 'text-center';
						break;
					case 2:
						$out[$i]->posClass = 'text-right';
						break;
					default:
						$out[$i]->posClass = 'text-center';
						break;
				}
			}
			return $out;
		}
		
	}

?>