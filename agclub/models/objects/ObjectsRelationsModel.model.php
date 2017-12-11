<?php
	class ObjectsRelationsModel extends TreeViewModel {
		public $parentId;
		public $itemTitle;
		public $order;
		
		public static $tplViewFile;
		public static $multiLang = false;
		
		public function __construct() {
			$this->parentId = new ModelIntegerField("parentId", Application::$messages['model_category']['field_parentId'], true, false);
			$this->itemTitle = new ModelTextField("itemTitle", Application::$messages['model_tree_relation']['field_item_title'], true, false);
			$this->order = new ModelIntegerField("order", Application::$messages['model_category']['field_order'], true, false);
		}
		
		public static function initialize() {
		Global $_adminName;
			self::$title = Application::$messages['model_objects']['title'];
			self::$iconPath = 'objects-icon.png';
			self::$relatedModel = 'ObjectsModel';
			self::$useOwnViewUrl = true;
			self::$ownViewUrl = Application::$settings['url'] . '/' . $_adminName . '/structure/view/2';
			self::$viewUrl = 'category';
		}
	}
?>