<?php

	class InsuranceController extends Controller {
		
		public static function view($r, $v) {
			
			$lang = $v['lang'];
			$pageId = 8;
			
			$page = MenuModel::get($pageId, $lang);
			
			$path = MenuModel::getPath($pageId, $lang);
			$pathItems = MenuModel::getItemsRId($lang);
			
			
			$id = $v['r_id'];
			
			$advice = AdvicesModel::getToView($lang, $id);
			
			if ($advice === false) ApplicationController::pageNotFound($r, $v);
			
			self::renderTemplate('content' . ds . 'advice-view.tpl', Array(
				'advice' => $advice,
				'page' => $page,
				'path' => $path,
				'pathItems' => $pathItems,
			));
			
		}
		
		public static function listAll($r, $v) {
			
			$page = $v['page'];
			
			$limit = 10;
			
			$advices = AdvicesModel::getListToView($page, $limit);
			
			$pages = ceil($advices['c'] / $limit);
			
			$lang = $v['lang'];
			$pageId = 8;
			
			$pageM = MenuModel::get($pageId, $lang);
			
			$path = MenuModel::getPath($pageId, $lang);
			$pathItems = MenuModel::getItemsRId($lang);
			
			self::renderTemplate('content' . ds . 'magazines.tpl', Array(
				'advices' => $advices['d'],
				'pages' => $pages,
				'page' => $page,
				'to_left' => ($page - 1) >= 0 ? ($page - 1) : 0,
				'to_right' => ($page + 1) <= ($pages - 1) ? $page + 1 : ($pages - 1),
				'page' => $pageM,
				'path' => $path,
				'pathItems' => $pathItems,
			));
			
		}
		
		public static function listAllAvto($r, $v) {
			
			$page = $v['page'];
			
			$limit = 10;
			
			$lang = $v['lang'];
			
			$advices = AvtoAdvicesModel1::getListToView($page, $limit);
			//echo '<pre>';
			//print_r($advices);
			//echo '</pre>';
			$pages = ceil($advices['c'] / $limit);
			
			$pageId = 57;
			
			$pageM = MenuModel::get($pageId, $lang);
			
			$path = MenuModel::getPath($pageId, $lang);
			$pathItems = MenuModel::getItemsRId($lang);
			
			self::renderTemplate('content' . ds . 'avto-insurance.tpl', Array(
				'advices' => $advices['d'],
				'pages' => $pages,
				'page' => $page,
				'to_left' => ($page - 1) >= 0 ? ($page - 1) : 0,
				'to_right' => ($page + 1) <= ($pages - 1) ? $page + 1 : ($pages - 1),
				'page' => $pageM,
				'path' => $path,
				'pathItems' => $pathItems,
			));
			
		}
		
		public static function viewInsurance($r, $v) {
			
			$lang = $v['lang'];
			$id = $v['r_id'];
			
			$advice = AvtoAdvicesModel1::getToView($lang, $id);
			
			$pageId = 57;
			
			$pageM = MenuModel::get($pageId, $lang);
			
			$path = MenuModel::getPath($pageId, $lang);
			$pathItems = MenuModel::getItemsRId($lang);
			
			if ($advice === false) ApplicationController::pageNotFound($r, $v);
			
			self::renderTemplate('content' . ds . 'insurance-view.tpl', Array(
				'insurance' => $advice,
				'page' => $pageM,
				'path' => $path,
				'pathItems' => $pathItems,
			));
			
		}
		
	}

?>