<?php	class FeedbackController extends Controller {				public static function view($request, $vars, $context = Array()) {			$context['csrf_key'] = Application::getCSRFKey();			self::renderTemplate('feedback' . ds . 'feedback.tpl', $context);		}				public static function add($request, $vars) {			$context = Array();			$formData = FeedbackForm::getValues();						if ($formData['success']) {				$context['added'] = 'feedback_success';				$feedback = new FeedbackModel();				$feedback->name->value = $formData['data']['name'];				$feedback->text->value = $formData['data']['text'];				//$feedback->address->value = $formData['data']['address'];				$feedback->email->value = $formData['data']['email'];				$feedback->date->value = date('Y-m-d');				$feedback->answered->value = 0;				$feedback->save();								// agclub@agbank.az				$mails = Array(					Array('info@atib.az', 'AGClub'),				);				$message = $feedback->name->value . ' <br/> ' . $feedback->email->value . ' <br/> ' . $feedback->text->value;				$from = 'notreply@meqa.az';				$fromName = 'From site';				$subject = 'Feedback from site';				Utils::sendMail($mails, $subject, $message, $from, $fromName);											} else {				$context['errors'] = $formData['errors'];			}						self::view($request, $vars, $context);		}			}?>