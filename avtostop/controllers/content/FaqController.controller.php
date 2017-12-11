<?php

	class FaqController extends Controller {
		
		public static function view($r, $v) {
			
			$lang = $v['lang'];
			$id = $v['r_id'];
			
			$faq = FaqModel::getToView($lang, $id);
			
			if ($faq === false) ApplicationController::pageNotFound($r, $v);
			
			self::renderTemplate('content' . ds . 'faq-view.tpl', Array(
				'faq' => $faq
			));
			
		}
		
		public static function addQuestion($r, $v) {
			
			$question = $_POST['question'];
			$email = $_POST['email'];

			$rId = BaseModel::getLastId(QuestionsModel::getTableName());
			
			/*$sql = " INSERT INTO `". QuestionsModel::getTableName() ."` (`lang_id`, `r_id`, `itemTitle`) VALUES ('{#1}', '{#2}', '{#3}') ";
			
			foreach (Application::$settings['languages'] as $k => $v) {
				BaseModel::query($sql, Array($k, $rId, $question));
			}*/

			$result = QuestionsModel::addQuestion('az', $rId, $question, $email);
		}
		
	}

?>