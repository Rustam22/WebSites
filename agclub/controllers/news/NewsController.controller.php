<?php

	class NewsController extends Controller {
	
		public static function archive($request, $vars) {
			$page = $vars['page_id'];
			$lang = Application::$storage['lang'];
			$limit = 10;
			
			$newsCount = NewsModel::count(" WHERE `lang_id` = '{#1}' AND `type` = '0'", Array($lang));
			$pagesCount = ceil($newsCount / $limit);
			$paginator = Array();
			
			$paginator = Utils::generatePaginator($newsCount, $limit, $page);
			
			// exception situation
			$childPages = MenuModel::getChildsFor(1, $lang);
			
			self::renderTemplate('news' . ds . 'news-list.tpl', Array(
				'newsArchive' => NewsModel::getNewsWithCommentsCount($lang, $page, $limit),
				'paginator' => $paginator,
				'currentPage' => $page,
				'childPages' => $childPages,
				'csrf_key' => Application::getCSRFKey()
			));
		}
		
		public static function viewNews($request, $vars) {
			$newsId = $vars['news_id'];
			$lang = Application::$storage['lang'];
			$news = NewsModel::getNews($newsId, $lang);
			
			if ($news['news']) {
			
				$c = count($news['comments']);
				for ($i = 0; $i <  $c; $i++) {
					if (empty($news['comments'][$i]['avatar'])) {
						if ($news['comments'][$i]['sex'] == '0') {
							$news['comments'][$i]['avatar'] = 'site_users/avatar/no-image-m.png';
							continue;
						}
						if ($news['comments'][$i]['sex'] == '1') {
							$news['comments'][$i]['avatar'] = 'site_users/avatar/no-image-w.png';
							continue;
						}
						$news['comments'][$i]['avatar'] = 'site_users/avatar/no-image-u.png';
					}
				}
				
				self::renderTemplate('news' . ds . 'view-news.tpl', Array(
					'news' => $news['news'],
					'comments' => $news['comments'],
					'csrf_key' => Application::getCSRFKey(),
				));
			} else ApplicationController::pageNotFound();
		}
		
		public static function addComment($request, $vars) {
			if ($request->isAjax()) {
				$json = Array();
				$newsId = $vars['news_id'];
				$lang = Application::$storage['lang'];
				$success = false;
				$user = AuthController::checkLoggedIn();
				if ($user) {
					if (NewsModel::get($newsId, $lang)) {
						$formData = NewsCommentsForm::getValues();
						if ($formData['success']) {
							$commentText = $formData['data']['commentText'];
							$comment = new NewsCommentsModel();
							$comment->newsId->value = $newsId;
							$comment->commentText->value = $commentText;
							$comment->userId->value = $user['id'];
							$comment->date->value = date('Y-m-d');
							$comment->save();
							$success = true;
						}
					}
				}
				
				
				$json['success'] = $success;
				$json['csrfKey'] = Application::getCSRFKey();
				
				echo json_encode($json);
			} else ApplicationController::pageNotFound($request, $vars);
		}
	
	}

?>