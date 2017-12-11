<?php
	
    class ApplicationController extends Controller {
		
		public static function before($request, $vars = Array()) {
        }
		
		public static function main($request, $vars = Array()) {
			
			$user = AuthController::checkLoggedIn();
			
			$rIds = Array();
			
			if ($user) {
				$user = SiteUsersModel::getById($user['id']);
				$interests = explode(",", $user->interests->value);
				if (count($interests)) {
					foreach ($interests as $i) {
						if (trim($i) != '') {
							$rIds[] = $i;
						}
					}
				}
			}
			
			$fObj = new stdClass();
			$fObj->categoryItemTitle = new stdClass();
			$fObj->categoryItemTitle->value = Application::$storage['messages']['common']['choose_category'];
			
			$categories = CategoryModel::getOnlyLastCategories(0, 'itemTitle', Application::$storage['lang'], false, false, false, $rIds);
			foreach ($categories as $k => $v) {
				$categories[$k]->objCount = ObjectsModel::count(" WHERE `type` <> '2' AND `category` = '" . $categories[$k]->id->value . "' AND `lang_id` = '".Application::$storage['lang']."'");
			}
			
			$calculatorCategories = CategoryModel::getOnlyLastCategories(0, 'itemTitle', Application::$storage['lang'], false);
			
			$calculatorCategories = array_merge(Array(0 => $fObj), $calculatorCategories);
			
			$c = (count($categories) > 3) ? 3 : count($categories);
			
			$categoryKeys = array_rand($categories, $c);
			
			self::renderTemplate('main' . ds . 'main.tpl',Array(
				'categories' => $categories,
				'categoryKeys' => $categoryKeys,
				'calculatorCategories' => $calculatorCategories,
				'csrf_key' => Application::getCSRFKey()
			));
        }
		
		public static function siteMap($request, $vars) {
			self::renderTemplate('sitemap' . ds . 'sitemap.tpl', Array(
				'csrf_key' => Application::getCSRFKey()
			));
		}
		
		public static function getMap($request, $vars) {
			$objectId = $vars['object_id'];
			$object = ObjectsModel::getById($objectId);
			if ($object) echo $object->map->value;
			else echo 'Map not found! Please try later.';
		}
		
		public static function incRating($request, $vars) {
			$json = Array();
			$json['rating'] = 0;
			
			$formData = RatingForm::getValues();
			if ($formData['success']) {
				$object = ObjectsModel::getById($formData['data']['objectId']);
				if ($object) {
					$rate = $formData['data']['rate'];
					$object->ratesCount->value++;
					$object->rating->value += $rate + 1;
					$object->save(" ,`rating` = '".$object->rating->value."', `ratesCount` = '".$object->ratesCount->value."' WHERE `id` = '".$object->id->value."'");
					$json['rating'] = intval($object->rating->value / $object->ratesCount->value);
				}
			}
			
			$json['csrfKey'] = Application::getCSRFKey();
			
			echo json_encode($json);
		}

        public static function pageNotFound() {
            self::renderTemplate('404' . ds . '404.tpl', Array(
				//'csrf_key' => Application::getCSRFKey()
			));
			die();
        }
		
		public static function getCaptcha($request, $vars) {
        	require app_root . ds . 'libs' . ds . 'kcaptcha' . ds . 'kcaptcha.php';
			
			$captcha = new KCAPTCHA();
			$_SESSION['captcha_keystring'] = $captcha->getKeyString();
        }
    }
?>