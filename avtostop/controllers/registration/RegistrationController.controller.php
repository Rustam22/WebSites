<?php

	class RegistrationController extends Controller {
		
		public static function registerUser($request, $vars = Array()) {
			$regData = RegistrationForm::getValues();
			if ($regData['success']) {
				$email = $regData['data']['email'];
				
				$existUsers = SiteUsersModel::getBy('email', $email);
				if (count($existUsers)) {
					$csrfKey = Application::getCSRFKey();
					echo json_encode(Array(
						'success' => false,
						'csrf_key' => $csrfKey,
						'error' => 'user_exists',
					));
				} else {
					$password = Utils::generatePassword(6);
					$user = new SiteUsersModel();
					$user->email->value = $email;
					$user->password->value = md5($password);
					$user->save();
					
					$success = false;
					
					$mails = Array(
						Array($email, ''),
					);
					$subject = Application::$storage['messages']['registration']['mail_title'];
					$body = Application::$storage['messages']['registration']['mail_body'] . $password;
					$from = Application::$settings['lpw']['from'];
					$fromName = Application::$settings['lpw']['fromName'];
					Utils::sendMail($mails, $subject, $body, $from, $fromName);
					
					$csrfKey = Application::getCSRFKey();
					
					echo json_encode(Array(
						'success' => true,
						'csrf_key' => $csrfKey
					));
				}
				
			} else {
				$csrfKey = Application::getCSRFKey();
				echo json_encode(Array(
					'success' => false,
					'csrf_key' => $csrfKey,
					'error' => 'wrong_data',
				));
			}
		}
		
	}

?>