<?php
	class CategoryRelationsModel extends TreeViewModel {
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
			self::$title = Application::$messages['model_category']['title'];
			self::$iconPath = 'category-icons.png';
			//self::$tplViewFile = 'model' . ds . 'category.tpl';
			self::$relatedModel = 'CategoryModel';
			self::$useOwnViewUrl = true;
			self::$ownViewUrl = Application::$settings['url'] . '/' . $_adminName . '/structure/view/0';
			self::$viewUrl = '';
		}
		
		public static function getItemsAsKV() {
			
			$sql = " SELECT * FROM `". self::getTableName() ."` ORDER BY `order` ";
			$r = self::fQuery($sql);
			
			$byId = Array();
			$byPId = Array();
			for ($i = 0, $c = count($r); $i < $c; $i++) {
				$byId[$r[$i]['id']] = $r[$i];
				$byPId[$r[$i]['parentId']][] = $r[$i];
			}
			
			return Array(
				'byId' => $byId,
				'byPId' => $byPId
			);
			
		}
	}
?>