<?php
	class CategoryModel extends CRUDModel {
		public $parentId;
		public $categoryItemTitle;
		public $categoryItemImage;
		public $categoryItemImageInactive;
		public $hasImage;
		public $order;
		
		public static $tplViewFile;
		public static $nestingLevel = 4;
		public static $multiLang = false;
		
		public function __construct() {
			$this->parentId = new ModelIntegerField("parentId", Application::$messages['model_category']['field_parentId'], true, false);
			$this->categoryItemTitle = new ModelTextField("categoryItemTitle", Application::$messages['model_category']['field_categoryItemTitle'], true, false);
			$this->categoryItemImage = new ModelFMImageField("categoryItemImage", Application::$messages['model_category']['field_categoryItemImage'], true, false);
			$this->categoryItemImageInactive = new ModelFMImageField("categoryItemImageInactive", Application::$messages['model_category']['field_categoryItemImageInactive'], true, false);
			$this->hasImage = new ModelSelectField("hasImage", Application::$messages['model_category']['field_hasImage'], Array("1" => "No", "2" => "Yes"), true, false);
			$this->order = new ModelIntegerField("order", Application::$messages['model_category']['field_order'], true, false);
		}
		
		public static function initialize() {
			self::$title = Application::$messages['model_category']['title'];
			self::$iconPath = 'category-icons.png';
			self::$tplViewFile = 'model' . ds . 'category.tpl';
		}
		
		public static function view($request, &$smarty, $vars = Array()) {
			return false;
		}
		
		public static function getItemsAsKeyValue($values = Array()) {
			$sql = "";
			if (count($values)) $sql = (self::$multiLang === true) ? " WHERE `lang_id` = '{#1}'" : "";
			$items = self::find($sql, $values);
			$idField = (self::$multiLang) ? 'r_id' : 'id';
			$out = Array();
			$c = count($items);
			for ($i = 0; $i < $c; $i++) $out[$items[$i]->$idField->value] = $items[$i]->categoryItemTitle->value;
			return $out;
		}
		
		public static function getChildsFor($parentId, $values = Array()) {
			$idTitle = (self::$multiLang === true) ? 'r_id' : 'id' ;
			$sql = " WHERE `parentId` = '".$parentId."' ";
			$sql .= (self::$multiLang === true) ? " AND `lang_id` = '{#1}'" : "" ;
			$sql .= " ORDER BY `order`";
			return self::find($sql, $values);
		}
	}
?>