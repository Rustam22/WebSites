<?php

	class ProfileController extends Controller {
	
		public static function activate($r, $v) {
			
			$token = $v['token'];
			
			$u = UsersModel::getIncativeUserByToken($token);
			if ($u['success']) {
				
				$user = $u['user'];
				
				UsersModel::activateAccountByIdAndToken($user['id'], $token);
				
				self::renderTemplate( 'profile' . ds . 'activated.tpl' );
				
			} else {
				ApplicationController::pageNotFound($r, $v);
			}
			
		}
		
		public static function enableReview($r, $v) {
			if (self::checkCSRF()) {
				
				if (UserReviewModel::enableReview($v['id'])) {
					echo json_encode(Array(
						'success' => true,
						'csrfKey' => Application::getCSRFKey()
					));
				} else self::jsonFalse();
				
			} else self::jsonFalse();
		}
		
		public static function removeReview($r, $v) {
			if (self::checkCSRF()) {
				
				if (UserReviewModel::removeReview($v['id'])) {
					echo json_encode(Array(
						'success' => true,
						'csrfKey' => Application::getCSRFKey()
					));
				} else self::jsonFalse();
				
			} else self::jsonFalse();
		}
		
		public static function viewProfile($r, $v) {
		
			$userId = $v['user_id'];
		
			if (AuthController::isLoggedIn() && ($userId == $_SESSION['user_id'])) {
				if ($_SESSION['user_type'] == 0) self::showMyProfile($r, $v);
				else self::showMyCompanyProfile($r, $v);
			} else {
				$userId = $v['user_id'];
				$user = UsersModel::getUserById($userId);
				if ($user['success']) {
					
					$userType = $user['user']['userType'];
					
					if ($userType == 0) {
						self::showUserProfile($r, $v);
					} else self::showCompanyProfile($r, $v);
					
				} else ApplicationController::pageNotFound($r, $v);
			}

		}
		
		private static function showMyCompanyProfile($r, $v) {
			
			$userId = $v['user_id'];
			
			$lang = Application::$storage['lang'];
			
			$context = Array();
			
			// get contactTypes
			$cTypes = UserContactTypesModel::getTypes($lang);
			
			// get user contacts
			$cValues = UserContactsModel::getContacts($userId);
			
			// get user info
			$userInfo = UserInfoModel::getInfoForUser($userId);
			if (count($userInfo) > 0) {
				$userInfo = $userInfo[0];
			} else $userInfo = null;
			
			// get user wishes
			$userWishes = UserWishesModel::getWishesForUser($userId);
			
			// get user experience
			$experience = UserExperienceModel::getExperienceForUser($userId);
			
			$userWishes['city'] = CountriesModel::getCityTitle($userWishes['cityId'], Application::$storage['lang']);
			
			// get reviews to user
			$reviews = UserReviewModel::getAllReviewsForUser($userId, $lang);
			
			// get vacancies
			$vacancies = VacancyModel::getVacancyForUser($userId);
			
			self::renderTemplate( 'profile' . ds . 'mycompany.tpl', Array(
				'cTypes' => $cTypes,
				'cValues' => $cValues,
				'userInfo' => $userInfo,
				'userWishes' => $userWishes,
				'userExperience' => $experience,
				'csrf_token' => Security::genereateCSRFKey(),
				'myAdvertisements' => self::getAdvForMe(),
				'reviews' => $reviews,
				'vacancies' => $vacancies
			) );
			
		}
		
		private static function showCompanyProfile($r, $v) {
			
			$lang = Application::$storage['lang'];
			$userId = $v['user_id'];
			
			// get contactTypes
			$cTypes = UserContactTypesModel::getTypes($lang);
			
			// get user contacts
			$cValues = UserContactsModel::getContacts($userId);
			
			// get user info
			$userInfo = UserInfoModel::getInfoForUser($userId);
			if (count($userInfo) > 0) {
				$userInfo = $userInfo[0];
			} else $userInfo = null;
			
			// get user wishes
			$userWishes = UserWishesModel::getWishesForUser($userId);
			
			// get user experience
			$experience = UserExperienceModel::getExperienceForUser($userId);
			
			$userWishes['city'] = CountriesModel::getCityTitle($userWishes['cityId'], Application::$storage['lang']);
			
			// get reviews to user
			$reviews = UserReviewModel::getReviewsForUser($userId, $lang);
			
			// get vacancies
			$vacancies = VacancyModel::getVacancyForUser($userId);
			
			self::renderTemplate( 'profile' . ds . 'company.tpl', Array(
				'cTypes' => $cTypes,
				'cValues' => $cValues,
				'userInfo' => $userInfo,
				'userWishes' => $userWishes,
				'userExperience' => $experience,
				'csrf_token' => Security::genereateCSRFKey(),
				'myAdvertisements' => self::getAdvForUser($userId),
				'reviews' => $reviews,
				'vacancies' => $vacancies
			) );
			
		}
		
		public static function showUserProfile($r, $v) {
			
			$lang = Application::$storage['lang'];
			$userId = $v['user_id'];
			
			// get contactTypes
			$cTypes = UserContactTypesModel::getTypes($lang);
			
			// get user contacts
			$cValues = UserContactsModel::getContacts($userId);
			
			// get user info
			$userInfo = UserInfoModel::getInfoForUser($userId);
			if (count($userInfo) > 0) {
				$userInfo = $userInfo[0];
			} else $userInfo = null;
			
			// get user wishes
			$userWishes = UserWishesModel::getWishesForUser($userId);
			
			// get user experience
			$experience = UserExperienceModel::getExperienceForUser($userId);
			
			$userWishes['city'] = CountriesModel::getCityTitle($userWishes['cityId'], Application::$storage['lang']);
			
			// get reviews to user
			$reviews = UserReviewModel::getReviewsForUser($userId, $lang);
			
			// resume
			$resumeExists = ResumeModel::resumeExists($userId);
			$resume = null;
			if ($resumeExists) {
				$resume = ResumeModel::getResume($userId, self::$smarty);
			}
			
			self::renderTemplate( 'profile' . ds . 'user.tpl', Array(
				'cTypes' => $cTypes,
				'cValues' => $cValues,
				'userInfo' => $userInfo,
				'userWishes' => $userWishes,
				'userExperience' => $experience,
				'csrf_token' => Security::genereateCSRFKey(),
				'myAdvertisements' => self::getAdvForUser($userId),
				'reviews' => $reviews,
				'resume' => $resume,
				'resumeExists' => $resumeExists,
				'sex' => Array(
					1 => 'Man',
					2 => 'Woman'
				)
			) );
			
		}
		
		public static function saveProfile($r, $v) {
			
			self::isLoggedIn($r, $v);
			
			$userId = $_SESSION['user_id'];
			
			SaveInfoTools::saveUserInfo($userId, $r, $v);
		}
		
		public static function showMyProfile($r, $v) {
			
			$lang = Application::$storage['lang'];
			$userId = $_SESSION['user_id'];
			
			// get contactTypes
			$cTypes = UserContactTypesModel::getTypes($lang);
			
			// get user contacts
			$cValues = UserContactsModel::getContacts($userId);
			
			// get user info
			$userInfo = UserInfoModel::getInfoForUser($userId);
			if (count($userInfo) > 0) {
				$userInfo = $userInfo[0];
			} else $userInfo = null;
			
			// get user wishes
			$userWishes = UserWishesModel::getWishesForUser($userId);
			
			// get user experience
			$experience = UserExperienceModel::getExperienceForUser($userId);
			
			$userWishes['city'] = CountriesModel::getCityTitle($userWishes['cityId'], Application::$storage['lang']);
			
			// get reviews to user
			$reviews = UserReviewModel::getAllReviewsForUser($userId, $lang);
			
			// resume
			$resumeExists = ResumeModel::resumeExists($userId);
			$resume = null;
			if ($resumeExists) {
				$resume = ResumeModel::getResume($userId, self::$smarty);
			}
			
			self::renderTemplate( 'profile' . ds . 'myuser.tpl', Array(
				'cTypes' => $cTypes,
				'cValues' => $cValues,
				'userInfo' => $userInfo,
				'userWishes' => $userWishes,
				'userExperience' => $experience,
				'csrf_token' => Security::genereateCSRFKey(),
				'myAdvertisements' => self::getAdvForMe(),
				'reviews' => $reviews,
				'resume' => $resume,
				'resumeExists' => $resumeExists
			) );
		}
		
		public static function setLocation($r, $v) {
		
			$d = LocationForm::getValues();
			
			if ($d['success']) {
				
				$location = Location::getLocation();
				
				$location['city'] = $d['data']['city'];
				$location['country'] = $d['data']['country'];
				
				Location::setLocation($location);
				
				$location = Location::getLocation();
				
				if (AuthController::isLoggedIn()) {
					
					UserInfoModel::setLocation($_SESSION['user_id'], $location);
					
				}
				
			}
			
			echo json_encode(Array(
				'csrfKey' => Security::genereateCSRFKey()
			));
		}
		
		public static function getAvatar($r, $v) {
			$filePath = Application::$settings['public_folder'] . ds . 'user_avatar';
			Utils::getImage($v['image'], $v['width'], $v['height'], $filePath);
		}
		
		public static function addReview($r, $v) {
			if (!AuthController::isLoggedIn()) {
				self::jsonFalse();
			}
			
			$d = UserReviewForm::getValues();
			
			if ($d['success']) {
				
				$out = Array();
				
				$out['success'] = false;
				
				$userId = $_SESSION['user_id'];
				
				if (UserReviewModel::addReview($userId, $d['data']['review'], $d['data']['user'])) {
					$out['success'] = true;
				}
				
				$out['csrfKey'] = Security::genereateCSRFKey();
				
				echo json_encode($out);
				
			} else {
				self::jsonFalse();
			}
		}
		
		public static function addExperience($r, $v) {
			
			if (!AuthController::isLoggedIn()) {
				self::jsonFalse();
			}
			
			$data = ProfileExperienceForm::getValues();
			
			$out = Array();
			
			if ($data['success']) {
				$r = UserExperienceModel::addExperience($_SESSION['user_id'], $data['data']);
				if ($r) {
					$out['success'] = true;
					$out['id'] = $r['id'];
				} else self::jsonFalse();
				
			}
			
			$out['csrfKey'] = Security::genereateCSRFKey();
			
			echo json_encode($out);
			
		}
		
		public static function removeExperience($r, $v) {
			if (self::checkCSRF()) {
				UserExperienceModel::removeExperience($v['id']);
				echo json_encode(Array(
					'success' => true,
					'csrfKey' => Security::genereateCSRFKey()
				));
			} else jsonFalse();
		}
		
		private static function checkCSRF() {
			if (isset($_POST['csrf_key']) && (isset($_SESSION['csrf_key'])) && ($_POST['csrf_key'] == $_SESSION['csrf_key'])) {
				return true;
			} return false;
		}
		
		private static function jsonFalse() {
			echo json_encode(Array(
				'success' => false,
				'csrfKey' => Security::genereateCSRFKey()
			));
			die();
		}
		
		private static function getAdvForMe() {
			
			$adv = AdvertisementsModel::getAdvertisementsForUser($_SESSION['user_id']);
			return $adv;
		}
		
		private static function getAdvForUser($userId) {
			
			$adv = AdvertisementsModel::getAdvertisementsForUser($userId);
			
			return $adv;
		}
		
		private static function isLoggedIn($r, $v) {
			if (!Application::$storage['logged_in']) {
				AuthController::login($r, $v);
				die();
			}
		}
	
	}
	
	class SaveInfoTools {
		
		public static function saveUserInfo($userId, $r, $v) {
		
			$userExistInfo = UserInfoModel::getInfoForUser($userId);
			$userWishes = UserWishesModel::getWishesForUser($userId);
			
			if (count($userExistInfo) == 1) {
				$userExistInfo = $userExistInfo[0];
				if (isset($_POST['save_profile'])) {
					$userInfo = UserProfileForm::getValues();
					
					if ($userInfo['success']) {
						
						$name = $userInfo['data']['name'];
						$sex = $userInfo['data']['sex'];
						$birthDay = $userInfo['data']['birthDay'];
						$city = $userInfo['data']['cityId'];
						$country = $userInfo['data']['countryId'];
						
						$about = $userInfo['data']['about'];
						$skills = $userInfo['data']['skills'];
						$education = $userInfo['data']['education'];
						$courses = $userInfo['data']['courses'];
						
						if ($name != '') $userExistInfo['name'] = $name;
						if ($sex != '') $userExistInfo['sex'] = $sex;
						if ($birthDay != '') $userExistInfo['birthday'] = $birthDay;
						if ($city != '') $userExistInfo['cityId'] = $city;
						if ($country != '') $userExistInfo['countryId'] = $country;
						if ($about != '') $userExistInfo['about'] = $about;
						if ($skills != '') $userExistInfo['skills'] = $skills;
						if ($education != '') $userExistInfo['education'] = $education;
						if ($courses != '') $userExistInfo['courses'] = $courses;
						
						if (isset($_FILES['avatar']) && ($_FILES['avatar']['error'] == 0) && ($_FILES['avatar']['size'] <= 2000600)) {
							$r = self::uploadAvatar($_FILES['avatar']);
							if ($r !== false) {
								$userExistInfo['avatar'] = $r;
							}
						}
						
						Location::setLocation(Array(
							'city' => $city,
							'country' => $country,
							'latitude' => Application::$storage['location']['latitude'],
							'longitude' => Application::$storage['location']['longitude']
						));
						
						UserInfoModel::saveData($userExistInfo);
						
						self::saveUserContacts($userId);
						
						self::saveUserWishes($userId);
						
					} else {
						print_r($userInfo['errors']);
					}
				}
				
				Utils::redirect(Application::$settings['url'] . '/user' . $userId);
				//ProfileController::showMyProfile($r, $v);
			} else {
				ApplicationController::pageNotFound($r, $v);
				die();
			}
		
		}
		
		private static function uploadAvatar($file) {
			$image = false;
			$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
			if (in_array($ext, Application::$settings['image_extensions'])) {
				$fileName = md5(microtime()) . '_' . $file['name'];
				$filePath = Application::$settings['public_folder'] . ds . 'user_avatar';
				$additionalPath = '';
				for ($j = 0; $j < 5; $j++) {
					$folder = substr($fileName, $j, 1);
					$filePath .= ds . $folder;
					$additionalPath .= '/' . $folder;
					
					if (!file_exists($filePath)) {
						mkdir($filePath);
					}
				}
				$moveTo = $filePath . ds . $fileName;
				// can resize
				if (move_uploaded_file($file['tmp_name'], $moveTo)) {
					$image = $additionalPath . '/' . $fileName;
				}
			}
			return $image;
		}
		
		private static function saveUserContacts($userId) {
			
			if (!(isset($_POST['contact']) && isset($_POST['contact_type_id']) && is_array($_POST['contact']) && is_array($_POST['contact_type_id']) 
			&& (count($_POST['contact']) == count($_POST['contact_type_id'])))) {
				return;
			}
			
			$c = count($_POST['contact']);
			
			for ($i = 0; $i < $c; $i++) {
				if (!empty($_POST['contact_type_id']) && !empty($_POST['contact'])) {
					UserContactsModel::updateContact($userId, intval($_POST['contact_type_id'][$i]), $_POST['contact'][$i]);
				}
			}
			
		}
		
		private static function saveUserWishes($userId) {
			
			$d = UserWishesForm::getValues();
			
			if ($d['success']) {
				$salary = $d['data']['salary'];
				$city = $d['data']['cityId'];
				$country = $d['data']['countryId'];
				$profession = $d['data']['profession'];
				
				$wishes = UserWishesModel::getWishesForUser($userId);
				
				if (!empty($salary)) $wishes['salary'] = $salary;
				if (!empty($city)) $wishes['cityId'] = $city;
				if (!empty($country)) $wishes['countryId'] = $country;
				if (!empty($profession)) $wishes['profession'] = $profession;
				
				UserWishesModel::updateUserWishes($wishes);
				
			}
			
		}
		
		private static function saveUserExperience() {
			
		}
		
	}

?>