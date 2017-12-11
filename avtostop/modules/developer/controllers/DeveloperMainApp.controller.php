<?php

class DeveloperMainApp extends Controller {
    
	public static function main($request, $vars = Array()) {
		self::renderTemplate('main.tpl');
	}
	
	public static function synchronizeDb($request, $vars = Array()) {
		$modelsToSynchronize = Application::$settings['classes_to_synchronize'];
		echo self::renderTemplate('tools/syncdb.tpl',Array(
			'modelsToSynchronize' => $modelsToSynchronize,
		), true);
	}

	public static function systemInfo($request, $vars = Array()) {
		
	}
	
	public static function syncModels($request, $vars = Array()) {
		if (isset($_POST['sql_command']) && count($_POST['sql_command'])) {
			foreach ($_POST['sql_command'] as $sql) BaseModel::query($sql);
		}
		if ($request->isAjax()) {
			if (isset($_POST['models_to_synchronize']) && count($_POST['models_to_synchronize'])) {
				$modelsToSynchronize = $_POST['models_to_synchronize'];
				$sql = Array();
				$counter = 0;
				foreach ($modelsToSynchronize as $i) {
					if (isset(Application::$settings['classes_to_synchronize'][$i])) {
						$model = Application::$settings['classes_to_synchronize'][$i];
						$tmp = $model::synchronize(true);
						if (is_array($tmp)) {
							foreach ($tmp as $s) {
								$sql[$counter]['value'] = $s;
								$sql[$counter]['highlighted'] = HighLightSQL::highlight($s);
								$counter++;
							}
						}
						else {
							$sql[$counter]['value'] = $tmp;
							$sql[$counter]['highlighted'] = HighLightSQL::highlight($tmp);
						}
						$counter++;
					}
				}
				echo self::renderTemplate('tools/syncmodels.tpl',Array(
					'sql' => $sql,
				), true);
			}
		}
	}
	
}

?>
