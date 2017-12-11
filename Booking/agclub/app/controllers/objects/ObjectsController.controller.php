<?php

	class ObjectsController extends Controller {
		
		public static function listObjects($request, $vars) {
			if ($request->isAjax()) {
				$categoryId = $vars['category_id'];
				$lang = Application::$storage['lang'];
				$r = ObjectsModel::getObjectsForCategory($categoryId, $lang);
				echo json_encode($r);
			} else ApplicationController::pageNotFound($request);
		}

		public static function searchObjects($request, $vars) {
			$searchText = $vars['search_text'];
			$page = $vars['page_number'];
			$limit = 12;
			$objCount = ObjectsModel::searchObjsCount($searchText, 'az');

			$objects = ObjectsModel::searchObject($searchText, 'az', $page * $limit, $limit);

			$enableMore = ($page >= ceil($objCount / $limit)) ? false : true;

			$context = Array(
				'simpleObj' => $objects,
				'enable_more' => $enableMore,
				'search_text' => $searchText,
			);
			if (isset($_POST['first'])) $context['first'] = 1;

			$content = self::renderTemplate('category' . ds . 'category-search-ajax.tpl', $context, true);

			$data = Array();
			$data['data'] = $content;
			$data['count'] = count($objects);
			$data['enableMore'] = $enableMore;

			echo json_encode($data);

		}
		
		public static function getDiscount($request, $vars) {
			if ($request->isAjax()) {
				$objectId = $vars['object_id'];
				$lang = Application::$storage['lang'];
				$d = ObjectsModel::getDiscount($objectId, $lang);
				if ($d) {
					echo json_encode($d->discount->value);
				} else echo json_encode('-');
			} else ApplicationController::pageNotFound($request);
		}
		
		public static function viewObject($request, $vars) {
			$objectId = $vars['object_id'];
			$object = ObjectsModel::get($objectId, 'az');
			$childs = ObjectsModel::getDataFor($object->treeItemId->value, 'az');
			
			if ($object) {
				$context = Array(
					'object' => $object,
					'childs' => $childs,
				);

				echo json_encode(Array(
					'data' => self::renderTemplate('objects' . ds . 'object-view.tpl', $context, true),
				));
			} else echo 'Error';
		}

		public static function viewObjectMap($request, $vars) {
			$objectId = $vars['object_id'];
			$object = ObjectsModel::get($objectId, 'az');

			$context = Array(
				'map' => $object->map->value,
			);

			echo json_encode(Array(
				'data' => self::renderTemplate('objects' . ds . 'object-map.tpl', $context, true),
			));
		}
		
	}

?>