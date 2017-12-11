<?php

	class AdminAuthController extends Controller {

		public static function logIn($request, $vars = Array()) {
			$context = Array();
			$loginData = AdminLoginForm::getValues();
			if ($loginData['success']) {
				$email = $loginData['data']['email'];
				$password = $loginData['data']['password'];
				$user = AdminUsersModel::getUserByEmailAndPassword($email, $password);
				if ($user['exists']) {
					$userId = $user['record'][0]->id->value;
					// get user group
					$userGroup = AdminUsersGroupModel::get($user['record'][0]->groupId->value);
					$allowedModels = explode(",", $userGroup->allowedModels->value);
					$data = Array(
						'user_id' => $userId,
						'allowed_models' => $allowedModels,
					);
					
					SessionStorage::add('admin', $data);
					
					if (intval($loginData['data']['savePassword']) == 1) {
						$token = md5(time().$user['record'][0]->email->value);
						$user['record'][0]->save("", " ,`cookieToken` = '".$token."'");
						// save to cookie
						setcookie('admin_auth_token', $token, time() + 60*60*24*14);
					}
					
					AdminMainApp::main($request, $vars = Array());
					Application::stop();
				} else {
					$context['errors'] = json_encode(Array(
						'wrong_info'
					));
				}
			}

			$context['csrf_key'] = Application::getCSRFKey();

			self::renderTemplate('login_form'. ds .'login.tpl', $context);
		}
		
		public static function logout($request, $vars = Array()) {
			if (isset($_SESSION['admin'])) {
			Global $_adminName;
				$data = SessionStorage::get('admin');
				//$user = AdminUsersModel::get($data['user_id']);
				//$user->save(" ,`cookieToken` = ''");
				SessionStorage::remove('admin');
				setcookie('admin_auth_token', '0');
				header('Location: ' . Application::$settings['url'] . '/' . $_adminName);
			}
		}

		public static function checkLoggedIn($request, $vars = Array()) {
			if (isset($_COOKIE['admin_auth_token']) && ($_COOKIE['admin_auth_token'] != '0')) {
				$user = AdminUsersModel::getUserByToken(Security::filterSql($_COOKIE['admin_auth_token'], BaseModel::$mysqli));
				if ($user['exists']) {
					$userId = $user['record'][0]->id->value;
					// get user group
					$userGroup = AdminUsersGroupModel::get($user['record'][0]->groupId->value);
					$allowedModels = explode(",", $userGroup->allowedModels->value);
					$data = Array(
						'user_id' => $userId,
						'allowed_models' => $allowedModels,
					);
					SessionStorage::add('admin', $data);
				} else {
					$context['errors'] = json_encode(Array(
						'wrong_info'
					));
				}
			}
			try {
				$data = SessionStorage::get('admin');
				if (!(isset($data['user_id']) && is_numeric($data['user_id']) && isset($data['allowed_models']) && count($data['allowed_models']))) {
					self::logIn($request, $vars);
					Application::stop();
				}
			} catch(Exception $e) {
				self::logIn($request, $vars);
				Application::stop();
			}
		}
		
		public static function getUserInfo() {
			if (isset($_SESSION['admin'])) {
				$info = SessionStorage::get('admin');
				return AdminUsersModel::get($info['user_id']);
			}
			return null;
		}
		
	}

?>