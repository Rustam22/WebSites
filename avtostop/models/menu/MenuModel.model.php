<?php
	class MenuModel extends CRUDModel {
		
		public $r_id;
		public $lang_id;
		public $treeItemId;
		public $type;
		public $menuItemTitle;
		public $link;
		public $modelId;
		public $content;
		public $pageId;
		public $visible;
		public $pageType;
		public $image;
		
		public static $tplViewFile;
		public static $multiLang = true;
		
		private static $pages;
		
		public function __construct() {
		
			$this->r_id = new stdClass();
			$this->r_id->value = null;
			$this->lang_id = new stdClass();
			$this->lang_id->value = null;
		
			$this->treeItemId = new ModelIntegerField("treeItemId", Application::$messages['model_category']['field_parentId'], true, true);
			$this->treeItemId->hidden = true;
			
			$this->type = new ModelSelectField("type", Application::$messages['model_menu']['field_type'], Array(
				"1" => Application::$messages['model_menu']['content'], 
				"2" => Application::$messages['model_menu']['module'], 
				"3" => Application::$messages['model_menu']['link'],
				"4" => Application::$messages['model_menu']['page'],
			), true, true);
			$this->type->tplFile = 'content-selectfield.tpl';
			$this->type->common = true;
			
			$this->menuItemTitle = new ModelTextField("menuItemTitle", Application::$messages['model_menu']['field_itemTitle'], true, true);
			$this->menuItemTitle->htmlCss = Array(
				'class' => 'menu-item-title'
			);
			
			$this->link = new ModelTextField("link", Application::$messages['model_menu']['field_link'], true, true);
			$this->link->htmlCss = Array(
				'class' => 'menu-item-link'
			);

			$modelTitles = Array();
			foreach (Application::$modules['admin']['models'] as $k => $v) {
				$v::initialize();
				$modelTitles[$k] = $v::$title;
			}
			$this->modelId = new ModelSelectField("modelId", Application::$messages['model_menu']['field_modelId'], $modelTitles, true, true);
			$this->modelId->common = true;
			$this->modelId->htmlCss = Array(
				'class' => 'menu-item-model-id'
			);
			
			$this->content = new ModelTinyMce("content", Application::$messages['model_menu']['field_content'], true, true);
			$this->content->htmlCss = Array(
				'class' => 'menu-item-content'
			);
			
			
			$this->pageId = new ModelSelectField("pageId", Application::$messages['model_menu']['field_pageId'], self::$pages, true, true);
			$this->pageId->common = true;
			$this->pageId->htmlCss = Array(
				'class' => 'menu-item-page-id'
			);
			
			$this->pageType = new ModelSelectField("pageType", "Növü", Array("Məqalə", "Avtofayda"), true, true);
			$this->pageType->common = true;
			$this->pageType->common = true;
			
			$this->visible = new ModelSelectField("visible", Application::$messages['model_menu']['field_visible'], Array(
				1 => Application::$messages['common_messages']['yyes'],
				0 => Application::$messages['common_messages']['nno'],
			), true, true);
			$this->visible->common = true;
			
			$this->image = new ModelFMImageField("image", "Şəkil (avtofayda üçün)", false, true);
			$this->image->required = false;
			$this->image->common = true;

		}

		public static function initialize() {
			self::$title = Application::$messages['model_menu']['title'];
			self::$iconPath = 'category-icons.png';
			self::$searchSettings = Array(
				'title_field' => 'menuItemTitle',
				'content_field' => 'content',
			);
			self::$searchable = true;
			
			$pagesData = self::fQuery("SELECT * FROM `".self::getTableName()."` WHERE `lang_id` = '{#1}'", Array(Application::$settings['default_language']));
			$pages = Array();
			$c = count($pagesData);
			for ($i = 0; $i < $c; $i++) {
				$pages[$pagesData[$i]['r_id']] = $pagesData[$i]['menuItemTitle'];
			}
			self::$pages = $pages;
			
		}
		
		public function getSearchUrl() {
			return 'page/' . $this->r_id->value;
		}
		
		public static function view($request, &$smarty, $vars = Array()) {
			return false;
		}
		
		public static function getUsefullInfo($lang) {
			
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `visible` = '1' AND `pageType` = '1' AND `lang_id` = '{#1}' ";
			$r = self::fQuery($sql, Array($lang));
			
			for ($i = 0, $c = count($r); $i < $c; $i++) {
				$r[$i]['description'] = Utils::parseWords($r[$i]['content'], 1);
			}
			return $r;
		}
		
		public static function getTreeItems($lang) {
				$sql = " INNER JOIN `".MenuModel::getTableName()."` AS `mm`
				ON `mm`.`treeItemId` = `".MenuRelationsModel::getTableName()."`.`id`
				WHERE `mm`.`visible` = '1' AND `mm`.`lang_id` = '".$lang."'";
				$sql .= "ORDER BY `order`, `parentId`";
			$items = MenuRelationsModel::find($sql);
			
			$items = self::buildTree($items);
			return $items;
		}
		
		public static function getItems($lang) {
			$sql = " SELECT * FROM `" . self::getTableName() . "` WHERE `lang_id` = '{#1}' ";
			$r = self::fQuery($sql, Array($lang));
			$out = Array();
			$c = count($r);
			for ($i = 0; $i < $c; $i++) {
				switch ($r[$i]['type']) {
					case '1':
						$r[$i]['url'] = 'page/' . $r[$i]['r_id'];
						break;
					case '3':
						$r[$i]['url'] = ''. $r[$i]['link'];
						break;
					default:
						$r[$i]['url'] = 'page/' . $r[$i]['r_id'];
						break;
				}
				$out[$r[$i]['treeItemId']] = $r[$i];
			}
			return $out;
		}
		
		public static function getItemsRId($lang) {
			$sql = " SELECT * FROM `" . self::getTableName() . "` WHERE `lang_id` = '{#1}' ";
			$r = self::fQuery($sql, Array($lang));
			$out = Array();
			$c = count($r);
			for ($i = 0; $i < $c; $i++) {
				$out[$r[$i]['r_id']] = $r[$i];
			}
			return $out;
		}
		
		public static function getChildsFor($pageId, $lang = false) {
			$currentPage = self::get($pageId, $lang);
			$menuRelationsTable = MenuRelationsModel::getTableName();
			$menuModelTable = MenuModel::getTableName();
			$sql = "SELECT `".$menuRelationsTable."`.`order`, 
							`".$menuModelTable."`.* 
					FROM `".$menuRelationsTable."` INNER JOIN `".$menuModelTable."` 
					ON `".$menuModelTable."`.`treeItemId` = `".$menuRelationsTable."`.`id`
					WHERE `".$menuModelTable."`.`visible` = '1' AND `".$menuRelationsTable."`.`parentId` = '{#1}' AND `".$menuModelTable."`.`lang_id` = '{#2}'";
			if (!Application::$storage['logged_in']) {
				$sql .= " AND `forLoggedIn` <> '1' ";
			}
			$sql .= "ORDER BY `".$menuRelationsTable."`.`order`";
			$pages = self::fQuery($sql, Array($currentPage->treeItemId->value, $lang));
			return self::getPagesUrl($pages);
		}
		
		public static function getSiblingsFor($pageId, $lang = false) {
			$currentPage = self::get($pageId, $lang);
			$menuRelationsTable = MenuRelationsModel::getTableName();
			$menuModelTable = MenuModel::getTableName();
			$sql = "SELECT `".$menuRelationsTable."`.`parentId` FROM `".$menuRelationsTable."`
					INNER JOIN `".$menuModelTable."` 
					ON `".$menuRelationsTable."`.`id` = `".$menuModelTable."`.`treeItemId`
					WHERE `".$menuModelTable."`.`visible` = '1' AND `".$menuModelTable."`.`treeItemId` = '{#1}' AND `".$menuModelTable."`.`lang_id` = '{#2}'";
			if (!Application::$storage['logged_in']) {
				$sql .= " AND `forLoggedIn` <> '1' ";
			}
			$parentId = self::fQuery($sql, Array($currentPage->treeItemId->value, $lang));
			
			if (count($parentId)) $parentId = $parentId[0]['parentId'];
			else $parentId = 0;
			
			if ($parentId == 0) {
				return Array();
			} else {
				$sql = "SELECT `".$menuRelationsTable."`.`order`, 
					`".$menuModelTable."`.* 
					FROM `".$menuRelationsTable."` INNER JOIN `".$menuModelTable."` 
					ON `".$menuModelTable."`.`treeItemId` = `".$menuRelationsTable."`.`id`
					WHERE `".$menuRelationsTable."`.`parentId` = '{#1}' AND `".$menuModelTable."`.`lang_id` = '{#2}' ";
					if (!Application::$storage['logged_in']) {
						$sql .= " AND `forLoggedIn` <> '1' ";
					}
					$sql .= "ORDER BY `".$menuRelationsTable."`.`order`";
					$pages = self::fQuery($sql, Array($parentId, $lang));
					return self::getPagesUrl($pages);
			}
		}
		
		public static function getPagesUrl($pages) {
			foreach ($pages as $k => $mItem) {
				switch ($mItem['type']) {
					case 1:
						$pages[$k]['url'] = Application::$settings['url'] . '/' . Application::$storage['lang'] . '/' . 'view-page/' . $mItem['r_id'];
						break;
					case 2:
						$model = Application::$modules[Application::$adminName]['models'][$mItem['modelId']];
						$model::initialize();
						$pages[$k]['url'] = Application::$settings['url'] . '/' . Application::$storage['lang'] . '/' . $model::$viewUrl;
						break;
					case 3:
						$pages[$k]['url'] = $mItem['link'];
						break;
					case 4:
						$pages[$k]['url'] = Application::$settings['url'] . '/' . Application::$storage['lang'] . '/' . 'view-page/' . $mItem['pageId'];
						break;
				}
			}
			return $pages;
		}
		
		public static function getFor($lang) {
			
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `lang_id` = '{#1}' ";
			return self::fQuery($sql, Array($lang));
			
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
		
			$sql = " SELECT * FROM `". MenuRelationsModel::getTableName() ."` ORDER BY `order`";
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
					'title' => $categoryItemsFiltered[$itemsId[$i]]['menuItemTitle'],
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
		
		public static function getDataByField($fieldName, $value) {
            $sql = "SELECT * FROM `".MenuModel::getTableName()."` WHERE `".$fieldName."` = '".$value."' AND `lang_id` = 'az'";
            $result = self::fQuery($sql);

            return $result;
        }
	}
?>