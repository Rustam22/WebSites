<?php
	
	require_once Application::$fileRoot->classes->VacancyView_class_php;

	class VacancyController extends Controller {
		
		public static function before($r, $v) {
			
		}
		
		public static function add($r, $v) {
			
			if (!AuthController::isLoggedIn()) ApplicationController::pageNotFound($r, $v);
			
			if ($_SESSION['user_type'] != 1) ApplicationController::pageNotFound($r, $v);
			
			if (isset($_POST['add_vac'])) {
				
				$data = VacancyForm::getValues();
				
				if ($data['success']) {
					$userId = $_SESSION['user_id'];
					$data['data']['categoryId'] = $data['data']['profArea'];
					if (VacancyModel::addVacancy($userId, $data['data'])) {
						
						$vacancyId = VacancyModel::getLastId(VacancyModel::getTableName());
						
						Utils::redirect(Application::$settings['url'] . '/vacancy/choose/package/' . $vacancyId);
						
						die();
					}
				}
				
			}
			
			$context = Array();
			
			$context['workTimes'] = Application::$m['resume_work_time'];
			$context['experiences'] = Application::$m['vacancy_experience'];
			$context['busyTimes'] = Application::$m['resume_busy'];
			$context['profArea'] = CategoryModel::getProfArea($_SESSION['lang']);
			$context['csrf_token'] = Application::getCSRFKey();
			
			self::renderTemplate('vacancy' . ds . 'add.tpl', $context);
			
		}
		
		public static function choosePackage($r, $v) {
		
			if (!AuthController::isLoggedIn()) ApplicationController::pageNotFound($r, $v);
			
			if ($_SESSION['user_type'] != 1) ApplicationController::pageNotFound($r, $v);
			
			$id = $v['id'];
			$userId = $_SESSION['user_id'];
			
			$vacancy = VacancyModel::getUsersVacancy($userId, $id);
			if ($vacancy === false) ApplicationController::pageNotFound($r, $v);
			
			$table = Array();
			$table['id'] = '37';
			$table['table_name'] = VacancyModel::getTableName();
			
			$record = $vacancy;
			
			$description = $vacancy['description'];
			
			$package = AdvertisementPackageModel::packageExistsFor($table['id'], $id);
			if ($package !== false) {
				
				$package['formId'] = $package['table_id'];
				$package['recordId'] = $package['record_id'];
				
				
				
				$price = AdvertisementController::getPackagePrice($package, $record);
				
				if ($price != 0) {
					echo 'pay ' . $price['p'] . ' ' . $price['c'];
				} else {
					AdvertisementsModel::activateAdv($table, $recordId);
					// go to package choosed
					echo 'choosed';
				}
				
				die();
			}
			
			if (isset($_POST['choose_package'])) {
			
				$package = VacancyPackageForm::getValues();
				
				if ($package['success']) {
					$package['data']['showOnMap'] = '0';
				
					$packageType = $package['data']['packageType'];
					$showOnMain = $package['data']['showOnMain'];
					$packagePremiumInterval = $package['data']['packagePremiumInterval'];
					$packagePaperInterval = $package['data']['packagePaperInterval'];
					$advertisementColor = $package['data']['advertisementColor'];
					$showOnMap = $package['data']['showOnMap'];
					$isQuickly = $package['data']['isQuickly'];
					$currency = $package['data']['currency'];
					
					$date = time();
					
					$package = Array(
						'type' => $packageType,
						'to_main' => $showOnMain,
						'show_on_map' => $showOnMap,
						'to_newspaper_interval' => $packagePaperInterval,
						'to_site_interval' => $packagePremiumInterval,
						'is_quickly' => $isQuickly,
						'color_index' => $advertisementColor,
						'currency' => $currency,
						'recordId' => $package['data']['recordId'],
						'table_id' => '37',
						'record_id' => $package['data']['recordId'],
						'date' => $date
					);
					
					if ($record === false) ApplicationController::pageNotFound($r, $v);
					
					$price = AdvertisementController::getPackagePrice($package, $record);
					
					if (AdvertisementPackageModel::addPackage($package, $table)) {
						$price = AdvertisementController::getPackagePrice($package, $record);
						if ($price['p'] == 0) {
							// activate advertisement
							AdvertisementsModel::activateAdv($table, $package['recordId']);
							echo 'choosed';
							die();
						} else {
							echo 'pay ' . $price['p'] . ' ' . $price['c'];
							die();
						}
					}
				}
				
				//AdvertisementsModel::activateAdv($table, $id);
				
			}
			
			$context = Array();
			$context['currency'] = Application::$settings['currency'];
			$context['csrf_token'] = Application::getCSRFKey();
			$context['recordId'] = $id;
			$context['symCount'] = strlen($description) - Application::$settings['max_desc_length'];
			
			self::renderTemplate('vacancy' . ds . 'choose_package.tpl', $context);
		}
		
		public static function view($r, $v) {
			$vacancyId = $v['vacancy_id'];
			
			$vacancy = VacancyModel::getActiveVacancy($vacancyId);
			
			if ($vacancy === false) ApplicationController::pageNotFound($r, $v);
			
			$v = new VacancyView($vacancy);
			
			self::renderTemplate('vacancy' . ds . 'view.tpl', Array(
				'csrf_token' => Application::getCSRFKey(),
				'vacancy' => $v
			));
		}
		
		public static function addResume($r, $v) {
			
			if (!AuthController::isLoggedIn()) self::jsonFalse(1);
			
			if (isset($_POST['csrf_key']) && ($_POST['csrf_key'] == $_SESSION['csrf_key'])) {
				
				$vacancyId = $v['vacancy_id'];
				$userId = $_SESSION['user_id'];
				
				if (VacancyResumeModel::exists($userId, $vacancyId)) {
					self::jsonFalse(3);
				} else {
					VacancyResumeModel::addPair($userId, $vacancyId);
					echo json_encode(Array(
						'success' => true,
						'csrfKey' => Application::getCSRFKey()
					));
				}
				
			} else self::jsonFalse(2);
			
		}
		
		private static function jsonFalse($code) {
			echo json_encode(Array(
				'success' => false,
				'code' => $code,
				'csrfKey' => Application::getCSRFKey()
			));
			die();
		}
		
		public static function getPrice($r, $v) {
		
			if (!AuthController::isLoggedIn()) ApplicationController::pageNotFound($r, $v);
			
			if ($_SESSION['user_type'] != 1) ApplicationController::pageNotFound($r, $v);
			
			$userId = $_SESSION['user_id'];
			
			$package = VacancyPackageForm::getValues();
			
			if ($package['success']) {
				$package['data']['showOnMap'] = '0';
			
				$packageType = $package['data']['packageType'];
				$showOnMain = $package['data']['showOnMain'];
				$packagePremiumInterval = $package['data']['packagePremiumInterval'];
				$packagePaperInterval = $package['data']['packagePaperInterval'];
				$advertisementColor = $package['data']['advertisementColor'];
				$showOnMap = $package['data']['showOnMap'];
				$isQuickly = $package['data']['isQuickly'];
				$currency = $package['data']['currency'];
				
				$package = Array(
					'type' => $packageType,
					'to_main' => $showOnMain,
					'show_on_map' => $showOnMap,
					'to_newspaper_interval' => $packagePaperInterval,
					'to_site_interval' => $packagePremiumInterval,
					'is_quickly' => $isQuickly,
					'color_index' => $advertisementColor,
					'currency' => $currency,
					'recordId' => $package['data']['recordId']
				);
			
				$record = VacancyModel::getUsersVacancy($userId, $package['recordId']);
				
				if ($record === false) {
					echo json_encode(Array(
						'success' => false,
						'csrfKey' => Application::getCSRFKey()
					));
					die();
				}
				
				$price = AdvertisementController::getPackagePrice($package, $record);
				
				echo json_encode(Array(
					'success' => true,
					'price' => $price['p'],
					'currency' => $price['c'],
					'csrfKey' => Application::getCSRFKey()
				));
			} else {
				echo json_encode(Array(
					'success' => false,
					'csrfKey' => Application::getCSRFKey()
				));
				die();
			}
			
			
			
		}
		
		public static function edit($r, $v) {
		
			if (!AuthController::isLoggedIn()) ApplicationController::pageNotFound($r, $v);
			
			if ($_SESSION['user_type'] != 1) ApplicationController::pageNotFound($r, $v);
			
			$id = $v['id'];
			$userId = $_SESSION['user_id'];
			
			$vacancy = VacancyModel::getUsersVacancy($userId, $id);
			
			if ($vacancy === false) ApplicationController::pageNotFound($r, $v);
			
			if (isset($_POST['save_vac'])) {
				// save ops
				$data = VacancyForm::getValues();
				$data['data']['categoryId'] = $data['data']['profArea'];
				if ($data['success']) {
					if (VacancyModel::saveVacancy($id, $data['data'])) {
						// go to choose package
					}
				}
			}
			
			$vacancy = VacancyModel::getUsersVacancy($userId, $id);
			
			$context = Array();
			
			$vacancy['cityTitle'] = CountriesModel::getCityTitle($vacancy['cityId'], $_SESSION['lang']);
			
			$context['workTimes'] = Application::$m['resume_work_time'];
			$context['experiences'] = Application::$m['vacancy_experience'];
			$context['busyTimes'] = Application::$m['resume_busy'];
			$context['csrf_token'] = Application::getCSRFKey();
			$context['profArea'] = CategoryModel::getProfArea($_SESSION['lang']);
			$context['vacancy'] = $vacancy;
			
			self::renderTemplate('vacancy' . ds . 'edit.tpl', $context);
			
		}
		
		public static function remove($r, $v) {
			
			if (!AuthController::isLoggedIn()) ApplicationController::pageNotFound($r, $v);
			
			if ($_SESSION['user_type'] != 1) ApplicationController::pageNotFound($r, $v);
		
			$id = $v['id'];
			$userId = $_SESSION['user_id'];
			
			$vacancy = VacancyModel::getUsersVacancy($userId, $id);
			
			if ($vacancy === false) ApplicationController::pageNotFound($r, $v);
			
			if (isset($_POST['remove_vac'])) {
				if (VacancyModel::removeVacancy($id)) {
					
					Utils::redirect(Application::$settings['url'] . '/company' . $userId . '#vacancy');
					
					die();
				}
			}
			
			self::renderTemplate('vacancy' . ds . 'remove.tpl', Array(
				'referer' => Application::$settings['url'] . '/company' . $userId . '#vacancy'
			));
		}
		
	}

?>