<?php

    class Middleware extends Controller {
		public static function initializeApp($request, $vars = Array()) {
			
			Application::$storage['messages'] = self::parseLangFile('az', true);
		}
		
        /* for assigning vars for template */
        public static function forSmarty($request, $vars = Array()) {
            self::$smarty->assign('static_url', Application::$settings['static_url']);
			self::$smarty->assign('app_url', Application::$settings['url']);
			self::$smarty->assign('public_url', Application::$settings['public_url']);
			self::$smarty->assign('request_url', Application::$settings['url'] . '/' . Controller::$request);
        }
		
		
		public static function getLangsUrl($request, $vars = Array()) {
			$currentLang = Application::$storage['lang'];
			$langUrls = Array();
			$languages = Application::$settings['languages'];
			$url = Controller::$request;
			$urlData = explode("/", $url);
			unset($urlData[0]);
			
			self::$smarty->assign('langUrl', join('/', $urlData));
			self::$smarty->assign('languages', $languages);
			self::$smarty->assign('currentLang', $currentLang);
			return;
		}
		
		public static function getMenu($request, $vars = Array()) {
			$curLang = Application::$storage['lang'];
			$menuTreeItems = MenuModel::getTreeItems($curLang);
			$menuModelItems = MenuModel::getAllRecords($curLang, 'treeItemId', true);
			$c = count($menuModelItems);
			foreach ($menuModelItems as $k => $mItem) {
				switch ($mItem->type->value) {
					case 1:
						$menuModelItems[$k]->url = Application::$settings['url'] . '/' . Application::$storage['lang'] . '/' . 'view-page/' . $mItem->r_id->value . '/' . urlencode($mItem->menuItemTitle->value);
						break;
					case 2:
						$model = Application::$modules[Application::$adminName]['models'][$mItem->modelId->value];
						$model::initialize();
						$menuModelItems[$k]->url = Application::$settings['url'] . '/' . Application::$storage['lang'] . '/' . $model::$viewUrl;
						break;
					case 3:
						$menuModelItems[$k]->url = $mItem->link->value;
						break;
					case 4:
						$menuModelItems[$k]->url = Application::$settings['url'] . '/' . Application::$storage['lang'] . '/' . 'view-page/' . $mItem->pageId->value;
						break;
				}
			}
			self::$smarty->assign('menuTreeItems', $menuTreeItems);
			self::$smarty->assign('menuModelItems', $menuModelItems);
		}
		
		public static function getNewsList($request, $vars) {
			$lang = Application::$storage['lang'];
			$news = NewsModel::getNewsList($lang, 0, 6);
			self::$smarty->assign('main_news_list', $news);
			
			if ($lang != 'az') {
				//ApplicationController::pageNotFound($request, $vars);
				die('404');
			}
		}
		
		private static function getCurrentLang($vars) {
			return (isset($vars['lang']) && in_array($vars['lang'], array_keys(Application::$settings['languages']))) ? $vars['lang'] : Application::$settings['default_language'];
		}
    }

?>