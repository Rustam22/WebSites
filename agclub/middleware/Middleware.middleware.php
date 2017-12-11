<?php

    class Middleware extends Controller {
		
		public static function initializeApp($request, $vars = Array()) {
			AuthController::checkCookie();
			AuthController::checkGuest();
			$loggedIn = AuthController::checkLoggedIn();
			self::$smarty->assign('logged_in', $loggedIn);
			
			$lang = self::getCurrentLang($vars);
			Application::$storage['lang'] = $lang;
			
			// get last news
			$lastNews = NewsModel::getLastNews(1, Application::$storage['lang']);
			self::$smarty->assign('lastNews', $lastNews);
			
			Application::$storage['messages'] = self::parseLangFile($lang, true);
		}
		
        /* for assigning vars for template */
        public static function forSmarty($request, $vars = Array()) {
            self::$smarty->assign('static_url', Application::$settings['static_url']);
			self::$smarty->assign('app_url', Application::$settings['url']);
			self::$smarty->assign('public_url', Application::$settings['public_url']);
			self::$smarty->assign('request_url', Application::$settings['url'] . '/' . Controller::$request);
			self::$smarty->assign('session_name', session_name());
			self::$smarty->assign('session_id', session_id());
        }
		
		public static function getSliderItems($request, $vars = Array()) {
			$lang = Application::$storage['lang'];
			self::$smarty->assign('hSliderItems', ObjectsModel::getNewObjects($lang));
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
			$menuTreeItems = MenuModel::getTreeItems();
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
		
		public static function getHoroscopeForMonth($request, $vars) {
			$month = date('m');
			HoroscopeController::getHoroscopeForMonth($month);
			self::$smarty->assign('zodiac', Application::$settings['zodiac'][Application::$storage['lang']]);
			self::$smarty->assign('sexOptions', Array(
				'1' => Application::$storage['messages']['common']['iman'],
				'2' => Application::$storage['messages']['common']['iwoman']
			));
		}
		
		public static function callTo($request, $vars) {
			$seconds = Array();
			$minutes = Array();
			for ($i = 1; $i < 61; $i++) {
				$seconds[$i] = $i;
			}
			for ($i = 1; $i < 13; $i++) {
				$minutes[$i] = $i;
			}
			self::$smarty->assign('seconds', $seconds);
			self::$smarty->assign('minutes', $minutes);
		}
		
		public static function getIbanners($request, $vars) {
			$ibannerItems = IBannerItemsModel::getBanners(AuthController::checkLoggedIn(), Application::$storage['lang']);
			self::$smarty->assign('ibanners', $ibannerItems);
		}
		
		private static function getCurrentLang($vars) {
			return (isset($vars['lang']) && in_array($vars['lang'], array_keys(Application::$settings['languages']))) ? $vars['lang'] : Application::$settings['default_language'];
		}
    }

?>