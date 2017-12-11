<?php

    class Middleware extends Controller {
	
		public static function initializeApp($request, $vars = Array()) {
			
			$lang = self::getCurrentLang($vars);
			Application::$storage['lang'] = $lang;


			$test = MenuModel::getDataByField("menuItemTitle", "Müsabiqə");
			$test1 = MenuModel::getDataByField("menuItemTitle", "Müsabiqə");
            //echo "<pre>"; print_r($test); echo "</pre>";
			if($test != '') {
				$test = $test[0];
			    $test = $test['content'];
                self::$smarty->assign('banner_text', $test);
			}

			// get messages
			$messages = self::parseLangFile(Application::$storage['lang'], true);
			Application::$storage['messages'] = $messages;
			Application::$m = $messages;
			
			self::$smarty->assign('found_adv', AdvertisementsModel::getLastFound($lang, 2));
			
			self::$smarty->assign('lost_adv', AdvertisementsModel::getLastLost($lang, 2));


            if(isset($_COOKIE['context'])){
                $_COOKIE['context'] = array(
                    "name" => $_COOKIE['name'],
                    "surname" => $_COOKIE['surname'],
                    "email" => $_COOKIE['email'],
                    "active" => $_COOKIE['active'],
                    "date" => $_COOKIE['date'],
                    "image" => $_COOKIE['image'],
                    "id" => $_COOKIE['id'],
                );
            }
            //echo "<pre>"; print_r($_COOKIE['context']); echo "</pre>";
            //echo "<pre>";  print_r(substr(CompetitionModel::getTrueOrFalse("12341", "id_1")[0]['true_var'], -1));  echo "</pre>";
            //echo "<pre>";  print_r(CompetitionQuestionsModel::excelImport());  echo "</pre>";
            //self::$smarty->assign('personCount', CompetitionModel::getCompetitionUserCountAfter());
            
			
			$startDay = 20150105;
			$crrentDay = date("Ymd");
			//echo $crrentDay;
			
			if(((int)$startDay - (int)$crrentDay) <= 0) {
                if($test1 != '') {
                    $test1 = $test1[0];
                    $test1 = $test1['pageType'];
                    if($test1 == "1") {
                        self::$smarty->assign('competitionTime', 'true');
                    }
                }
			}
			
            if(isset($_COOKIE['context'])) {
                if(CompetitionModel::getCurrentTrueFalseAnswerCount('competition_active', $_COOKIE['context']['id']) == "1") {
                    self::$smarty->assign('user', 'true');
                } else {
                    self::$smarty->assign('user', 'false');
                }
            }
            if(isset($_SESSION['context'])) {
                if(CompetitionModel::getCurrentTrueFalseAnswerCount('competition_active', $_SESSION['context']['id']) == "1") {
                    self::$smarty->assign('user', 'true');
                } else {
                    self::$smarty->assign('user', 'false');
                }
            }


            if(isset($_SESSION['context']))  {self::$smarty->assign('context_session', $_SESSION['context']);}
            if(isset($_SESSION['question'])) {self::$smarty->assign('question', $_SESSION['question']);}
            if(isset($_COOKIE['context']))   {self::$smarty->assign('context_cookie', $_COOKIE['context']);}

			self::isLiveActive();
			self::$smarty->assign('banners', BannersModel::all());
		}
		
		private static function isLiveActive() {
			
			$minute = date('i');
			$hour = date('H');
			$weekDay = date('w');

			$period = Application::$settings['live_active_days'][$weekDay];
			
			$active = false;
			
			if ( ( (($hour * 3600) + ($minute * 60)) >= (($period[0] * 3600) + ($period[1] * 60)) ) 
				&&
				(( ($hour * 3600) + ($minute * 60)) <= (  ($period[0] * 3600) + ($period[1] * 60) + $period[2] ) )
				) {
				$active = true;
				
			}

			self::$smarty->assign('live_active', $active);
			
		}
		
		private static function forLoggedOut() {
		
			// get reg secret questions
			self::$smarty->assign('reg_secret_questions', SecretQuestionsModel::getQuestions(Application::$storage['lang']));
			
			self::$smarty->assign('logged_in', false);
			Application::$storage['logged_in'] = false;
			
			// if reg form sended
			AuthController::checkRegistrationAttempt();
		}
		
		private static function forLoggedIn() {
			self::$smarty->assign('logged_in', true);
			self::$smarty->assign('userId', $_SESSION['user_id']);
			Application::$storage['logged_in'] = true;
			$uInfo = UserInfoModel::getInfoForUser($_SESSION['user_id']);
			self::$smarty->assign('uInfo', $uInfo[0]);
		}
		
        /* for assigning vars for template */
        public static function forSmarty($request, $vars = Array()) {
            self::$smarty->assign('static_url', Application::$settings['static_url']);
			self::$smarty->assign('app_url', Application::$settings['url']);
			self::$smarty->assign('public_url', Application::$settings['public_url']);
			self::$smarty->assign('languages', Application::$settings['languages']);
			self::$smarty->assign('request_url', Application::$settings['url'] . '/' . Controller::$request);
			self::$smarty->assign('lang', Application::$storage['lang']);
			self::$smarty->assign('currentLangTitle', Application::$settings['languages'][Application::$storage['lang']]);
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
		
		public static function buildMenu($r, $v) {
			$menuItems = MenuModel::getItems(Application::$storage['lang']);
			$treeItems = MenuModel::getTreeItems(Application::$storage['lang']);
			
			self::$smarty->assign('menuItems', $menuItems);
			self::$smarty->assign('treeItems', $treeItems);
		}
		
		private static function getCurrentLang($vars) {
			return (isset($vars['lang']) && in_array($vars['lang'], array_keys(Application::$settings['languages']))) ? $vars['lang'] : Application::$settings['default_language'];
		}
    }

?>