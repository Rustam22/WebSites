<?php

	class SettingsController extends Controller {
		
		public static function setLang($r, $v) {
			
			if (isset($_POST['csrf_key']) && isset($_SESSION['csrf_key']) && ($_POST['csrf_key'] == $_SESSION['csrf_key'])) {
			
				$lang = $v['lang'];
				if (in_array($lang, array_keys(Application::$settings['languages']))) {
					
					Location::setLang($lang);
					
					self::jsonSuccess();
					
				} else {
					self::jsonFalse(2);
				}
			
			} else {
				self::jsonFalse(1);
			}
			
		}
		
		public static function jsonFalse($c) {
			echo json_encode(Array(
				'success' => false,
				'code' => $c,
				'csrfKey' => Application::getCSRFKey()
			));
			die();
		}
		
		public static function jsonSuccess() {
			echo json_encode(Array(
				'success' => true,
				'csrfKey' => Application::getCSRFKey()
			));
			die();
		}
		
	}

?>