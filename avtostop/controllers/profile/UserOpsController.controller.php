<?php

	class UserOpsController extends Controller {
		
		public static function sendMessage($r, $v) {
			
			$formData = UserMessageForm::getValues();
			
			$out = Array();
			
			if ($formData['success']) {
				$message = $formData['data']['message'];
				$toUser = $formData['data']['userId'];
				$fromUser = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 0;
				
				$r = UserMessageModel::addMessage($message, $toUser, $fromUser);
				if ($r) $out['success'] = true;
				else $out['success'] = false;
				
			} else $out['success'] = false;
			
			$csrfKey = Application::getCSRFKey();
			$out['csrfToken'] = $csrfKey;
			
			echo json_encode($out);
			
		}
		
	}

?>