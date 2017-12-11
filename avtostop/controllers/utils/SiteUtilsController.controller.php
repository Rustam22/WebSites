<?php

	class SiteUtilsController extends Controller {
	
		public static function getCities($r, $v) {
			$country = $v['country'];
			$d = CountriesModel::getCitiesKV(Application::$storage['lang'], $country);
			
			echo json_encode($d);
			die();
		}
	
	}

?>