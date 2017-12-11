<?php

	class ApplicationFormController extends Controller {
	
		public static function view($request, $vars, $context = Array()) {
			$context['app_form'] = ApplicationForm::getFormView(self::$smarty);
			$context['csrf_key'] = Application::getCSRFKey();
			self::renderTemplate('application-form' . ds . 'application-form.tpl', $context);
		}
		
		public static function save($request, $vars) {
			$formData = ApplicationForm::getValues();
			$context = Array();
			$context['success'] = false;
			if ($formData['success'] && isset($_POST['agree_with_terms'])) {
				$context['success'] = true;
				$record = new ApplicationFormModel(
					$formData['data']['status'],
					$formData['data']['companyName'],
					$formData['data']['legalAddress'],
					$formData['data']['currentAddress'],
					$formData['data']['regCertificate'],
					$formData['data']['voen'],
					$formData['data']['cityNumber'],
					$formData['data']['mobileNumber'],
					$formData['data']['fax'],
					$formData['data']['email'],
					$formData['data']['site'],
					$formData['data']['description'],
					$formData['data']['logo'],
					$formData['data']['chiefName'],
					$formData['data']['chiefPosition'],
					$formData['data']['chiefPassport'],
					$formData['data']['chiefMobilePhone'],
					$formData['data']['chiefMail'],
					$formData['data']['chiefPhoto'],
					$formData['data']['atibPartnerName'],
					$formData['data']['atibPartnerPosition'],
					$formData['data']['atibPartnerMob'],
					$formData['data']['atibPartnerMail'],
					$formData['data']['atibDate'],
					0
				);
				$record->save();
			} else $context['errors'] = $formData['errors'];
			self::view($request, $vars, $context);
		}
	
	}

?>