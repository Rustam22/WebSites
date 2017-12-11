<?php

	require_once Application::$fileRoot->classes->AdvUtils_class_php;

	class AdvOnLeft extends Controller {
		
		public static function getAdvOnLeft($r, $v) {
			
			$limit = Application::$settings['adv_on_main_limit'];
			
			$packages = AdvertisementPackageModel::getAdvOnMainTR();
			
			$tables = Array();
			
			$__id = 0;
			for ($i = 0, $c = count($packages); $i < $c; $i++) {
				if ($__id != $packages[$i]['table_id']) {
					$__id = $packages[$i]['table_id'];
					$tables[$packages[$i]['table_id']][] = $packages[$i]['record_id'];
				} else {
					$tables[$__id][] = $packages[$i]['record_id'];
				}
			}
			
			$advertisements = Array();
			
			// organize slice sort
			
			foreach ($tables as $k => $v) {
				
				$_tmpAdvContainer = Array();
			
				$table = AdvertisementStructureModel::getTable($k);
				if ($table === false) continue;
				
				$data = AdvertisementsModel::getAdvForMap($table['table_name'], $v, Application::$storage['location']['country']);
				
				for ($j = 0, $_c = count($data); $j < $_c; $j++) {
					
					$adv = AdvertisementsModel::getAdvItem($data[$j], $table);
					
					// init and add to list
					$adv->init();
					$_tmpAdvContainer[] = $adv;
				}
				
				$advertisements = AdvUtils::merge($advertisements, $_tmpAdvContainer);
				
			}
			
			Application::$storage['advertisements_on_main'] = $advertisements;
			
			self::$smarty->assign('advertisements_on_main', array_slice($advertisements, 0, $limit));
			self::$smarty->assign('advertisements_on_main_count', ceil(count($advertisements) / $limit));
			
		}
		
		public static function getLastViewed($r, $v) {
			$auth = false;
			$userId = null;
			if (AuthController::isLoggedIn()) {
				$auth = true;
				$userId = $_SESSION['user_id'];
			}
			
			self::$smarty->assign('adv_last_viewed', AdvertisementLastViewedModel::getLastHistory($auth, $userId));
			
		}
		
	}

?>