<?php

	class HoroscopeController extends Controller {
		
		public static function getHoroscope($request, $vars) {
			if ($request->isAjax()) {
				$sexId = $vars['sex_id'];
				$zodiacId = $vars['zodiac_id'];
				$lang = Application::$storage['lang'];
				$data = HoroscopeZodiacModel::getHoroscope($sexId, $zodiacId, $lang, date('m'));
				
				$out = Array();
				if ($data) {
					$out['success'] = true;
					$out['horoscope'] = $data->content->value;
					$out['title'] = $data->horoscopeTitle->value;
				} else {
					$out['success'] = false;
				}
				echo json_encode($out);
			} else {
				ApplicationController::pageNotFound($request);
			}
		}
		
		public static function getHoroscopeForMonth($month) {
			self::$smarty->assign('monthHoroscope', HoroscopeMonthModel::getHoroscopeForMonth($month, Application::$storage['lang']));
		}
	}

?>