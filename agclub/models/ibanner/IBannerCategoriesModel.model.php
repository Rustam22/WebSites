<?php

	class IBannerCategoriesModel extends CRUDModel {
	
		public $categoryTitle;
		public $sex;
		public $ageMin;
		public $ageMax;
		public $interests;
		public $since;
		
		public function __construct() {
			$messages = Application::$messages['model_ibanner_categories'];
			
			$this->categoryTitle = new ModelTextField("categoryTitle", $messages['field_categoryTitle'], true, false);
			
			$this->sex = new ModelSelectField("sex", $messages['field_sex'], Array(
				0 => 'man', 
				1 => 'woman', 
				2 => 'all'
			), true, false);
			$this->sex->required = false;
			
			$this->ageMin = new ModelIntegerField("ageMin", $messages['field_ageMin'], true, false);
			$this->ageMin->required = false;
			
			$this->ageMax = new ModelIntegerField("ageMax", $messages['field_ageMax'], true, false);
			$this->ageMax->required = false;
			
			$interests = CategoryModel::getAsKeyVal('r_id', 'categoryItemTitle', Application::$settings['default_language']);
			$this->interests = new ModelCheckBoxField("interests", $messages['field_interests'], $interests, true, false);
			$this->interests->required = false;
			
			$this->since = new ModelDateField("since", $messages['field_since'], true, true);
			$this->since->required = false;
			
		}
		
		public static function initialize() {
			self::$multiLang = false;
			self::$title = Application::$messages['model_ibanner_categories']['title'];
			self::$iconPath = 'banner-cats-icon.png';
			self::$useOwnViewUrl = false;
			self::$displayFields = Array('categoryTitle', 'sex', 'ageMin', 'ageMax', 'since');
		}
		
		public static function getCategoriesForUser($user = false) {
			if ($user) {
				$sql = Array();
				if (!empty($user->birthDay->value)) {
					$userAge = Utils::getAgeByBirthDay($user->birthDay->value);
					$sql[] = " (`ageMin` > '".$userAge."' AND '".$userAge."' < `ageMax`) ";
				}
				if (trim($user->sex->value) != '') {
					$sql[] = " (`sex` = '".$user->sex->value."' OR `sex` = '2') ";
				}

				if (strlen(trim($user->interests->value)) > 2) {
					$interests = explode(",", $user->interests->value);
					$q = Array();
					foreach ($interests as $i) {
						if (!empty($i)) $q[] = " `interests` LIKE '%,".$i.",%' ";
					}
					$sql[] = " ( ". join(" OR ", $q) ." ) ";
				}
				if (count($sql)) $sql = " WHERE " . join(" OR ", $sql);
				else $sql = "";
				$out = self::find($sql);
				return $out;
				
			} else return Array();
		}
		
	}

?>