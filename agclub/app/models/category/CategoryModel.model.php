<?php
	class CategoryModel extends CRUDModel {
		public $r_id;
		public $lang_id;
		public $treeItemId;
		public $categoryItemTitle;
		public $categoryItemImage;
		
		public static $tplViewFile;
		public static $nestingLevel = 4;
		public static $multiLang = true;
		
		public function __construct() {
		
			$this->r_id = new stdClass();
			$this->r_id->value = null;
			$this->lang_id = new stdClass();
			$this->lang_id->value = null;
		
			$this->treeItemId = new ModelIntegerField("treeItemId", Application::$messages['model_category']['field_parentId'], true, true);
			$this->treeItemId->hidden = true;
			$this->categoryItemTitle = new ModelTextField("categoryItemTitle", Application::$messages['model_category']['field_categoryItemTitle'], true, true);
			$this->categoryItemTitle->required = false;
			$this->categoryItemImage = new ModelFMImageField("categoryItemImage", Application::$messages['model_category']['field_categoryItemImage'], true, true);
			$this->categoryItemImage->required = false;
		}
		
		public static function initialize() {
			self::$title = Application::$messages['model_category']['title'];
			self::$iconPath = 'category-icons.png';
			self::$multiLang = true;
			//self::$tplViewFile = 'model' . ds . 'category.tpl';
			
		}
		
		public static function view($request, &$smarty, $vars = Array()) {
			return false;
		}
		
		public static function getOnlyLastCategories($nestingLevel, $field, $lang = false, $onlyTitle = true, $start = false, $limit = false, $rIds = Array()) {
			$categoryRelations = CategoryRelationsModel::getOnlyLastChilds($nestingLevel, $field);
			$ids = join(",", array_keys($categoryRelations));
			$out = Array();
			if (strlen($ids) > 0) {
				$sql = " WHERE `treeItemId` IN (".$ids.")";
				if (CategoryModel::$multiLang && $lang) {
					$sql .= " AND `lang_id` = '".$lang."'";
				}
				if (count($rIds) >= 3) {
					$sql .= " AND `r_id` IN (".join(",", $rIds).")";
				}
				
				$sql .= " ORDER BY `categoryItemTitle`";

				if (($start !== false) && ($limit !== false)) {
					$sql .= "LIMIT " . $start . "," . $limit;
				}
				$categoryItems = CategoryModel::find($sql);
				$c = count($categoryItems);
				for ($i = 0; $i < $c; $i++) {
					if ($onlyTitle) $out[$categoryItems[$i]->id->value] = $categoryItems[$i]->categoryItemTitle->value;
					else $out[$categoryItems[$i]->id->value] = $categoryItems[$i];
				}
			}
			return $out;
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
			if ($parentId == 0) {
				$sql = " WHERE `parentId` = '".intval($parentId)."' ";
			} else {
				$cModel = CategoryModel::get($parentId);
				$sql = " WHERE `parentId` = '".intval($cModel->treeItemId->value)."' ";
			}
			
			$idTitle = (self::$multiLang === true) ? 'r_id' : 'id' ;
			$sql .= (self::$multiLang === true) ? " AND `lang_id` = '{#1}'" : "" ;
			$sql .= " ORDER BY `order` ASC";
			$relations = CategoryRelationsModel::find($sql, $values);
			
			$ids = Array();
			$out = Array();
			foreach ($relations as $rel) {
				$ids[] = "'" . $rel->id->value . "'";
				$t = self::find(" WHERE `treeItemId` = '{#1}'", Array($rel->id->value));
				if (isset($t[0])) $out[] = $t[0];
			}
			//if (count($ids) > 0) return self::find(" WHERE `treeItemId` IN (".join(",", $ids).")");
			//else return Array();
			if (count($out) > 0) return $out;
		}
	}
?>