<?php
	
	class AdvertisementController extends Controller {
	
		public static function view($r, $v) {
			
			$lang = $v['lang'];
			$id = $v['r_id'];
			
			$page = $v['page'];
			
			$adv = AdvertisementsModel::getToView($lang, $id, $page);
			
			if ($adv === false) ApplicationController::pageNotFound($r, $v);
			
			self::renderTemplate('content' . ds . 'adv_view.tpl', Array(
				'_adv' => $adv
			));
			
		}
		
		public static function listAllFound($r, $v) {
			// type = 1
			$lang = 'az';
			$page = $v['page'];
			$limit = 10;
			$d = AdvertisementsModel::getLastFound($lang, $limit, $page);
			
			$c = AdvertisementsModel::count(" WHERE `type` = '1' ");
			
			$pages = ceil($c / $limit);
			
			self::renderTemplate('advertisement' . ds . 'list.tpl', Array(
				'data' => $d,
				'pages' => $pages,
				'to_left' => ($page - 1 >= 0) ? ($page - 1) : 0,
				'to_right' => ($page + 1 <= ($pages - 1)) ? ($page + 1) : ($pages - 1),
				'category' => 'found',
				'curPage' => $page
			));
		}
		
		public static function listAllLost($r, $v) {
			// type = 0
			$lang = 'az';
			$page = $v['page'];
			$limit = 10;
			$d = AdvertisementsModel::getLastLost($lang, $limit, $page);
			
			$c = AdvertisementsModel::count(" WHERE `type` = '0' ");
			
			$pages = ceil($c / $limit);
			
			self::renderTemplate('advertisement' . ds . 'list.tpl', Array(
				'data' => $d,
				'pages' => $pages,
				'to_left' => ($page - 1 >= 0) ? ($page - 1) : 0,
				'to_right' => ($page + 1 <= ($pages - 1)) ? ($page + 1) : ($pages - 1),
				'category' => 'lost',
				'curPage' => $page
			));
		}
	
	}

?>