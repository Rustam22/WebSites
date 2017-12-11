<?php

	class AnnouncementsController extends Controller {
	
		public static function archive($request, $vars) {
			$page = $vars['page_id'];
			
			$lang = Application::$storage['lang'];
			$limit = 10;
			
			$newsCount = AnnouncementsModel::count(" WHERE `lang_id` = '{#1}'", Array($lang));
			$pagesCount = ceil($newsCount / $limit);
			$paginator = Array();
			
			$paginator = Utils::generatePaginator($newsCount, $limit, $page);
			
			// exception situation
			//$childPages = MenuModel::getChildsFor(1, $lang);
			
			self::renderTemplate('announcements' . ds . 'announcements-list.tpl', Array(
				'newsArchive' => AnnouncementsModel::getAnnList($lang, $page, $limit),
				'paginator' => $paginator,
				'currentPage' => $page,
				//'childPages' => $childPages,
				'csrf_key' => Application::getCSRFKey()
			));
		}
		
		public static function viewNews($request, $vars) {
			$newsId = $vars['news_id'];
			$lang = Application::$storage['lang'];
			$news = AnnouncementsModel::get($newsId, $lang);
			
			if ($news) {
				if ($news->itemTitle->value != urldecode($vars['ann_title'])) ApplicationController::pageNotFound($request);
				if (($news->forLoggedIn->value == 1) && !(Application::$storage['logged_in'])) ApplicationController::pageNotFound($request);
				$b = (Application::$storage['lang'] == 'az') ? true : false;
				$news->itemTitle->value = Utils::toUpper($news->itemTitle->value, $b);
				self::renderTemplate('announcements' . ds . 'view-announcements.tpl', Array(
					'news' => $news,
					'csrf_key' => Application::getCSRFKey(),
				));
			} else ApplicationController::pageNotFound();
		}
	
	}

?>