<?php

	class BusinessOffersController extends Controller {
	
		public static function archive($request, $vars) {
			$page = $vars['page_id'];
			$lang = Application::$storage['lang'];
			$limit = 10;
			
			$newsCount = BusinessOffersModel::count(" WHERE `lang_id` = '{#1}'", Array($lang));
			$pagesCount = ceil($newsCount / $limit);
			$paginator = Array();
			
			$paginator = Utils::generatePaginator($newsCount, $limit, $page);
			
			// exception situation
			$childPages = MenuModel::getChildsFor(1, $lang);
			
			self::renderTemplate('b-offers' . ds . 'b-offers-list.tpl', Array(
				'newsArchive' => BusinessOffersModel::getBOList($lang, $page, $limit),
				'paginator' => $paginator,
				'currentPage' => $page,
				'childPages' => $childPages,
				'csrf_key' => Application::getCSRFKey()
			));
		}
		
		public static function viewNews($request, $vars) {
			$newsId = $vars['news_id'];
			$lang = Application::$storage['lang'];
			$news = BusinessOffersModel::get($newsId, $lang);
			
			if ($news) {
				if ($news->itemTitle->value != urldecode($vars['bo_title'])) ApplicationController::pageNotFound($request);
				if (($news->forLoggedIn->value == 1) && !(Application::$storage['logged_in'])) ApplicationController::pageNotFound($request);
				$b = (Application::$storage['lang'] == 'az') ? true : false;
				$news->itemTitle->value = Utils::toUpper($news->itemTitle->value, $b);
				self::renderTemplate('b-offers' . ds . 'view-b-offers.tpl', Array(
					'news' => $news,
					'csrf_key' => Application::getCSRFKey(),
				));
			} else ApplicationController::pageNotFound();
		}
	
	}

?>