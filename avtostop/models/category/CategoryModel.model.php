<?php
	class CategoryModel extends CRUDModel {
		public $r_id;
		public $lang_id;
		public $treeItemId;
		public $categoryItemTitle;
		public $categoryItemImage;
		public $categoryItemBigImage;
		public $formId;
		public $hasVacancy;
		
		public static $tplViewFile;
		public static $nestingLevel = 4;
		public static $multiLang = true;
		public static $forms = Array();
		
		private static $initialized = false;
		
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
			
			$this->categoryItemBigImage = new ModelFMImageField("categoryItemBigImage", Application::$messages['model_category']['field_categoryItemImage'] . '-big', true, true);
			$this->categoryItemBigImage->required = false;
			
			$this->formId = new ModelSelectField("formId", Application::$messages['model_category']['field_form'], self::$forms, true, true);
			$this->formId->required = false;
			$this->formId->common = true;
			
			$this->hasVacancy = new ModelSelectField("hasVacancy", Application::$messages['model_category']['has_vacancy'], Array(
				1 => 'No',
				2 => 'Yes'
			), true, true);
			$this->hasVacancy->required = false;
			$this->hasVacancy->common = true;
		}
		
		public static function initialize() {
		
			if (self::$initialized) return;
		
			self::$title = Application::$messages['model_category']['title'];
			self::$iconPath = 'category-icons.png';
			self::$multiLang = true;
			//self::$tplViewFile = 'model' . ds . 'category.tpl';
			
			self::$forms = AdvertisementStructureModel::getForms();
			
			self::$initialized = true;
			
		}
		
		public static function getSearchCategories($lang) {
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `lang_id` = '{#1}' AND `formId` <> '0' ";
			$r = self::fQuery($sql, Array($lang));
			return $r;
		}
		
		public static function getProfArea($lang) {
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `hasVacancy` = '1' AND `lang_id` = '{#1}' ";
			$r = self::fQuery($sql, Array($lang));
			$result = Array();
			for ($i = 0, $c = count($r); $i < $c; $i++) {
				$result[$r[$i]['r_id']] = $r[$i]['categoryItemTitle'];
			}
			return $result;
		}
		
		public static function getAdvCategories($lang) {
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `formId` <> '0' AND `lang_id` = '{#1}' ";
			$r = self::fQuery($sql, Array($lang));
			$result = Array();
			for ($i = 0, $c = count($r); $i < $c; $i++) {
				$result[$r[$i]['r_id']] = $r[$i]['categoryItemTitle'];
			}
			return $result;
		}
		
		
		public static function view($request, &$smarty, $vars = Array()) {
			return false;
		}
		
		public static function getItems($lang) {
			$sql = " SELECT * FROM `" . self::getTableName() . "` WHERE `lang_id` = '{#1}' ";
			$r = self::fQuery($sql, Array($lang));
			$out = Array();
			$c = count($r);
			for ($i = 0; $i < $c; $i++) {
				$out[$r[$i]['treeItemId']] = $r[$i];
			}
			return $out;
		}
		
		public static function getTreeItems() {
			$items = CategoryRelationsModel::find(" ORDER BY `order`, `parentId`");
			$items = self::buildTree($items);
			return $items;
		}
		
		public static function getTableId($tableId) {
			$sql = " SELECT * FROM `" . self::getTableName() . "` WHERE `r_id` = '{#1}' ";
			$r = self::fQuery($sql, Array($tableId));
			if (count($r) > 0) {
				return $r[0]['formId'];
			} else return false;
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
		
		public static function getItemChilds($id, $relations) {
		
			$byId = $relations['byId'];
			$byPId = $relations['byPId'];
			$result = Array();
			
			if (!isset($byPId[$id])) return Array();
			
			for ($i = 0, $c = count($byPId[$id]); $i < $c; $i++) {
				$result[$i] = $byPId[$id][$i];
				
				$r = self::getItemChilds($byPId[$id][$i]['id'], $relations);
				if (count($r)) $result[$i]['items'] = $r;
			}
			
			return $result;
			
		}
		
		public static function getPath($rId, $lang) {
		
			$getCategoryItemsSQL = " SELECT * FROM `". self::getTableName() ."` WHERE `lang_id` = '{#1}'";
			$categoryItems = self::fQuery($getCategoryItemsSQL, Array($lang));
			
			$c = count($categoryItems);
			$id = 0;
			$categoryItemsFiltered = Array();
			for ($i = 0; $i < $c; $i++) {
				
				$categoryItemsFiltered[$categoryItems[$i]['treeItemId']] = $categoryItems[$i];
				if ($categoryItems[$i]['r_id'] == $rId) {
					$id = $categoryItems[$i]['treeItemId'];
				}
			}
			
			
			if ($id == 0) {
				// send mail to developer
				throw new Exception(" Server error ");
			}
		
			$sql = " SELECT * FROM `". CategoryRelationsModel::getTableName() ."` ORDER BY `order`";
			$r = self::fQuery($sql, Array($lang));
			
			$filteredData = Array();
			$c = count($r);
			for ($i = 0; $i < $c; $i++) {
				$filteredData[$r[$i]['id']] = $r[$i];
			}
			
			$path = Array();
			//$path[] = $id;
			
			$itemsId = self::getParent($id, $path, $filteredData);
			
			$outPath = Array();
			$l = count($itemsId) - 1;
			
			for ($i = $l; $i >= 0; $i--) {
			
				$outPath[] = Array(
					'title' => $categoryItemsFiltered[$itemsId[$i]]['categoryItemTitle'],
					'r_id' => $categoryItemsFiltered[$itemsId[$i]]['r_id']
				);
			}
			
			return $outPath;
			
			
		}
		
		private static function getParent($id, $path, $data) {
			
			if (isset($data[$id])) {
				$parent = $data[$id]['parentId'];
				$path[] = $data[$id]['id'];
				
				$id = $parent;
				$path = self::getParent($id, $path, $data);
			}
			
			return $path;
			
		}
	}
?>