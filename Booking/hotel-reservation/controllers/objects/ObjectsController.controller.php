<?php

	class ObjectsController extends Controller {
		
		public static function listObjects($request, $vars) {
			//if ($request->isAjax()) {
				$categoryId = $vars['category_id'];
				$lang = Application::$storage['lang'];
				$r = ObjectsModel::getObjectsForCategory($categoryId, $lang);
				echo json_encode($r);
			//} else ApplicationController::pageNotFound($request);
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
		
		public static function getObjectData($request, $vars) {
			$objectId = $vars['object_id'];
			$lang = Application::$storage['lang'];
			$object = ObjectsModel::getById($objectId);
			$childs = ObjectsModel::getDataFor($object->treeItemId->value, $lang);
			if ($object) {
				if ($request->isAjax()) {
					echo self::renderTemplate('objects' . ds . 'object-view-ajax.tpl', Array(
						'object' => $object,
						'childs' => $childs
					), true);
				} else {
					self::renderTemplate('objects' . ds . 'object-view.tpl', Array(
						'object' => $object,
						'childs' => $childs,
						'csrf_key' => Application::getCSRFKey()
					));
				}
			} else ApplicationController::pageNotFound($request);
		}
		
		public static function showObject($request, $vars) {
			$objectId = $vars['object_id'];
			$lang = Application::$storage['lang'];
			$object = ObjectsModel::getObjectForShow($object_id, $lang);
		}
	}

?>