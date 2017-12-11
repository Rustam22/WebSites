<?php

	class AuthController extends Controller {
		
		public static function checkLoggedIn() {
			try {
				$data = SessionStorage::get('site_user');
				return $data;
			} catch (Exception $e) {
				return false;
			}
		}
		
		public static function logIn($request, $vars) {
			$formData = LoginForm::getValues();
			$outData = Array();
			if ($formData['success']) {
				$email = $formData['data']['email'];
				$password = $formData['data']['password'];
				$user = SiteUsersModel::getUser($email, $password);
				if (count($user)) {
					$user = $user[0];
					$data = Array(
						'id' => $user->id->value,
					);
					SessionStorage::add('site_user', $data);
					$outData['success'] = true;
				} else {
					$outData['success'] = false;
					$outData['error'] = 'wrong_login';
				}
			} else {
				$outData['success'] = false;
				$outData['error'] = 'wrong_login';
			}
			$outData['csrfKey'] = Application::getCSRFKey();
			echo json_encode($outData);
		}
		
		public static function logOut($request, $vars = Array()) {
			SessionStorage::remove('site_user');
			header("Location: " . Application::$settings['url'] . '/' . Application::$storage['lang']);
			//ApplicationController::before($request, $vars);
			//ApplicationController::main($request, $vars);
		} 
		
		public static function lostPassword($request, $vars, $context = Array()) {
			$token = $vars['token'];
			if (isset($_POST['save_psw'])) {
				$fData = RestorePswForm::getValues();
				if ($fData['success']) {
					$psw1 = $fData['data']['password1'];
					$psw2 = $fData['data']['password2'];
					if ($psw1 == $psw2) {
						$user = SiteUsersModel::getByLPWToken($token);
						if ($user) {
							$user = $user[0];
							$user->password->value = $psw1;
							$user->save();
							$context['message'] = Application::$storage['messages']['auth']['lpw_success'];
						}
					}
				}
			}
			$context['lpw_form'] = RestorePswForm::getFormView(self::$smarty);
			$context['csrf_key'] = Application::getCSRFKey();
			self::renderTemplate('lpw' . ds . 'lpw.tpl', $context);
		}
		
		public static function lostPswAjax($request, $vars) {
			if ($request->isAjax()) {
				$fData = LostPswForm::getValues();
				if ($fData['success']) {
					$uMail = $fData['data']['email'];
					$user = SiteUsersModel::userExists($uMail);
					if ($user) {
						// send mail
						$mails = Array(
							$uMail
						);
						$token = md5(rand(1,9999));
						$user->save(" ,`lpwToken` = '".$token."' WHERE `id` = '".$user->id->value."'");
						$link = Application::$settings['url'] . '/' . Application::$storage['lang'] . '/lostpsw/' . $token;
						$subject = Application::$storage['messages']['auth']['lpw_subject'];
						$body = Application::$storage['messages']['auth']['lpw_body'] . '<br/> Link: ' . $link;
						$from = Application::$settings['lpw']['from'];
						$fromName = Application::$settings['lpw']['fromName'];
						Utils::sendMail($mails, $subject, $body, $from, $fromName);
						
						$outData = Array();
						$outData['message'] = Application::$storage['messages']['auth']['lpw_generated'];
						$outData['csrfKey'] = Application::getCSRFKey();
						echo json_encode($outData);
					}
				}
			} else ApplicationController::pageNotFound();
		}
		
	}

?>