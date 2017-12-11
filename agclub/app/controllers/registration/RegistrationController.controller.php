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
					Utils::sendMail($email, 'Password', $password);
					
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