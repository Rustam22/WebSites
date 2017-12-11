<?php

	class ContentController extends Controller {
		
		public static function viewPage($request, $vars) {
			$pageId = $vars['r_id'];
			$lang = $vars['lang'];
			$page = MenuModel::get($pageId, $lang);
			
			$path = MenuModel::getPath($pageId, $lang);
			$pathItems = MenuModel::getItemsRId($lang);
			
			if ($page) {
				
				self::renderTemplate('content' . ds . 'view.tpl', Array(
					'page' => $page,
					'path' => $path,
					'pathItems' => $pathItems,
					'csrf_token' => Application::getCSRFKey()
				));
				
			} else ApplicationController::pageNotFound($request);
		}
		
	}

?>