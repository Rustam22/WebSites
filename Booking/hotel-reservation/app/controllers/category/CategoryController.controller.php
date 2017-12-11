<?php

	class CategoryController extends Controller {
	
		public static function getList($request, $vars) {

			$page = $vars['page_number'];
			$limit = 12;
			$start = $page * $limit;
			
			$categories = CategoryModel::getOnlyLastCategories(0, 'itemTitle', Application::$storage['lang'], false, $start, $limit);
			
			$count = count(CategoryModel::getOnlyLastCategories(0, 'itemTitle', Application::$storage['lang'], true));
			
			self::renderTemplate('category' . ds . 'category-list.tpl', Array(
				'categories' => $categories,
				'currentPage' => $page
			));
			
		}

		private static function getListAjax($vars) {

		}
		
		public static function view($request, $vars) {
			$categoryId = $vars['category_id'];
			$lang = 'az';
			
			$category = CategoryModel::find(" WHERE `id` = '{#1}'", Array($categoryId));
			
			if ($category) {

				$page = isset($vars['page_number']) ? $vars['page_number'] : 0;
				$limit = 12;
				$start = $page * $limit;
				$objCount = ObjectsModel::getObjectsCount($categoryId, $lang);
				$pagesCount = ceil($objCount / $limit);
				
				$enableMore = (($page + 1) >= $pagesCount) ? false : true;
				
				$objects = ObjectsModel::getObjectsForCategory($categoryId, $lang, $start, $limit);
				
				$c = count($objects);
				$newObjects = Array();
				for ($i = 0; $i < $c; $i++) {
					$newObjects[$i]['parent'] = $objects[$i];
					if ($objects[$i]['type'] == '1') {
						$childs = ObjectsModel::getDataFor($objects[$i]['elId'], $lang);
						$cCount = count($childs);
						for ($j = 0; $j < $cCount; $j++) {
							$childs[$j]['phone'] = join("<br/>", explode(",", $childs[$j]['phone']));
						}
						$newObjects[$i]['childs'][] = $childs;
					}
				}

				if ($request->isAjax()) {
					if ($page == 0) {
						$data = self::renderTemplate('category' . ds . 'category-view-ajax-first.tpl', Array(
							'category' => $category[0],
							'objects' => $newObjects,
							'simpleObj' => $objects,
							'enable_more' => $enableMore
						), true);
					} else {
						$data = self::renderTemplate('category' . ds . 'category-view-ajax.tpl', Array(
							'category' => $category,
							'objects' => $newObjects,
							'simpleObj' => $objects,
						), true);
					}
					echo json_encode(Array(
						'data' => $data,
						'enableMore' => $enableMore,
					));
				} else {
					self::renderTemplate('category' . ds . 'category-view.tpl', Array(
						'category' => $category[0],
						'objects' => $newObjects,
						'simpleObj' => $objects,
						'enable_more' => $enableMore
					));
				}



			} else ApplicationController::pageNotFound();
		}
	
	}

?>