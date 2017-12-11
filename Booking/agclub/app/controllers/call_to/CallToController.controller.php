<?php

	class CallToController extends Controller {
	
		public static function addOrder($request, $vars) {
			$formData = CallToForm::getValues();
			$success = false;
			if ($formData['success']) {
				$time = $formData['data']['time'];
				$number = $formData['data']['number'];
				$name = $formData['data']['name'];
				$subject = $formData['data']['subject'];
				
				$order = new CallToModel();
				$order->number->value = $number;
				$order->time->value = $time;
				$order->name->value = $name;
				$order->subject->value = $subject;
				$order->save();
				$success = true;
			}
			$json = Array('success' => $success);
			$json['csrfKey'] = Application::getCSRFKey();
			echo json_encode($json);
		}
	
	}

?>