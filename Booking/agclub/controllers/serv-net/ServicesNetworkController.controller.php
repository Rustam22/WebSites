<?php

	class ServicesNetworkController extends Controller {
	
		public static function getList($request, $vars) {
			
			$lang = Application::$storage['lang'];
			
			$servNet = ServicesNetworkModel::find(" WHERE `lang_id` = '{#1}' ORDER BY `order` DESC", Array($lang));
			
			self::renderTemplate('service-network' . ds . 'serv-net.tpl', Array(
				'servNet' => $servNet
			));
			
		}
		
		public static function getMap($request, $vars) {
			//if ($request->isAjax()) {
				$serviceId = $vars['service_id'];
				$data = ServicesNetworkModel::getById($serviceId);
				if ($data) {
					echo $data->map->value;
				} else ApplicationController::pageNotFound($request);
			//} else ApplicationController::pageNotFound($request);
		}
	
	}

?>