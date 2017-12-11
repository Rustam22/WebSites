<?php

	class ProfileController extends Controller {
		
		public static function before($request, $vars) {
			$user = AuthController::checkLoggedIn();
			if (!$user) {
				ApplicationController::pageNotFound($request, $vars);
			}
			Application::$storage['user'] = $user;
		}
		
		public static function view($request, $vars, $context = Array()) {
			$user = SiteUsersModel::get(Application::$storage['user']['id']);
			$lang = Application::$storage['lang'];
			
			if (empty($user->avatar->value)) {
				switch ($user->sex->value) {
					case 0:
						$user->avatar->value = 'site_users/avatar/no-image-m.png';
						break;
					case 1:
						$user->avatar->value = 'site_users/avatar/no-image-w.png';
						break;
					default:
						$user->avatar->value = 'site_users/avatar/no-image-u.png';
						break;
				}
			}

			$sexOptions = Array(
				'0' => Application::$storage['messages']['common']['man'],
				'1' => Application::$storage['messages']['common']['woman'],
			);
			
			$user->interests->value = explode(",", $user->interests->value);
			$c = count($user->interests->value);
			for ($i = 0; $i < $c; $i++) {
				if (empty($user->interests->value[$i])) unset($user->interests->value[$i]);
			}
			
			$categories = CategoryModel::getAsKeyVal('r_id', 'categoryItemTitle', $lang);
			
			$context['categories'] = $categories;
			$context['user'] = $user;
			$context['sexOptions'] = $sexOptions;
			$context['randNum'] = rand(9999,99999);
			
			$context['csrf_key'] = Application::getCSRFKey();
			
			self::renderTemplate('profile' . ds . 'profile.tpl', $context);
		}
		
		public static function save($request, $vars) {
			
			$formData = UserProfileForm::getValues();
			
			if ($formData['success']) {
				$avatar = '';
				if (isset($_FILES['avatar']) && ($_FILES['avatar']['error'] == 0)) {
					if (!empty($_FILES['avatar']['name'])) {
						$fExtension = Utils::getFileExtension($_FILES['avatar']['name']);
						if (in_array($fExtension, Application::$settings['image_extensions'])) {
							//$randNum = rand(1,9999);
							$fName = $_FILES['avatar']['name'];
							$avatar = 'site_users' . ds . 'avatar' . ds . $fName;
							move_uploaded_file($_FILES['avatar']['tmp_name'], Application::$settings['public_folder'] . ds . $avatar);
						}
					}
				}
				$user = SiteUsersModel::get(Application::$storage['user']['id']);
				if (!empty($avatar)) $user->avatar->value = $avatar;
				
				$userData = $formData['data'];
				$user->name->value = $userData['name'];
				$user->surName->value = $userData['surName'];
				$user->phoneNumber->value = $userData['phone'];
				
				if (!empty($userData['password'])) $user->password->value = md5($userData['password']);
				$user->sex->value = $userData['sex'];
				$user->birthDay->value = $userData['birthDay'];
				
				$user->interests->value = $userData['interests'];
				
				$user->save();
			}
			
			self::view($request, $vars);
		}
		
	}

?>