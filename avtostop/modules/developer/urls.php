<?php

    $__develperUrlPatterns = Array(
        'developer' => Array(
            Array('developer','DeveloperMainApp','main'),
			Array('developer\/syncdb','DeveloperMainApp','synchronizeDb'),
			Array('developer\/syncmodels','DeveloperMainApp','syncModels'),
			Array('developer\/system_info','DeveloperMainApp','systemInfo'),
        )
    );

    self::$urlPatterns = array_merge($__develperUrlPatterns, self::$urlPatterns);

?>