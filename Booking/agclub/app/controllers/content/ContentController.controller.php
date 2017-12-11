<?php

	class ContentController extends Controller {
		
		public static function viewPage($request, $vars) {
			$pageId = $vars['page_id'];
			$lang = Application::$storage['lang'];
			$page = MenuModel::get($pageId, $lang);
			if ($page) {
				if ($page->menuItemTitle->value != urldecode($vars['page_title'])) ApplicationController::pageNotFound($request);
				$path = MenuModel::getPath($pageId, $lang);
				if (($page->forLoggedIn->value == 1) && !(Application::$storage['logged_in'])) ApplicationController::pageNotFound($request);
				$childPages = MenuModel::getChildsFor($pageId, $lang);
				$haveChildPages = true;
				if (!count($childPages)) {
					$childPages = MenuModel::getSiblingsFor($pageId, $lang);
					$haveChildPages = false;
				}
				if ($request->isAjax()) {
					echo self::renderTemplate('content' . ds . 'view-page-ajax.tpl', Array(
						'page' => $page,
						'childPages' => $childPages,
						'csrf_key' => Application::getCSRFKey()
					), true);
				} else {
					$b = (Application::$storage['lang'] == 'az') ? true : false;
					$page->content->value = trim($page->content->value);
					if (empty($page->content->value) && (count($childPages)) && $haveChildPages) {
						$c = count($childPages);
						for ($i = 0; $i < $c; $i++) {
							if (!empty($childPages[$i]->content->value)) {
								$page = $childPages[$i];
								break;
							}
						}
					}
					
					$page->menuItemTitle->value = Utils::toUpper($page->menuItemTitle->value, $b);
					self::renderTemplate('content' . ds . 'view-page.tpl', Array(
						'page' => $page,
						'childPages' => $childPages,
						'csrf_key' => Application::getCSRFKey(),
						'path' => $path,
						'files' => FilesModel::getFilesForPage($page->r_id->value, $lang),
					));
				}
			} else ApplicationController::pageNotFound($request);
		}
		
	}

?>