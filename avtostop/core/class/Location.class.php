<?php

	class Location {
		
		public static function getLocation($ip) {
			
			if (isset($_SESSION['cityId']) && isset($_SESSION['countryId'])) {
				return Array(
					'country' => $_SESSION['countryId'],
					'city' => $_SESSION['cityId'],
					'latitude' => $_SESSION['latitude'],
					'longitude' => $_SESSION['longitude']
				);
			}
			
			if (isset($_COOKIE['cityId']) && isset($_COOKIE['countryId'])) { 
				return Array(
					'country' => intval($_COOKIE['countryId']),
					'city' => intval($_COOKIE['cityId']),
					'latitude' => $_COOKIE['latitude'],
					'longitude' => $_COOKIE['longitude']
				);
			}
			
			
			if (AuthController::isLoggedIn()) {
				$uInfo = UserInfoModel::getInfoForUser($_SESSION['user_id']);
				$uInfo = $uInfo[0];
				
				return Array(
					'country' => $uInfo['countryId'],
					'city' => $uInfo['cityId'],
					'latitude' => $uInfo['latitude'],
					'longitude' => $uInfo['longitude']
				);
			}
			
			/*
			// if cookie does not exists
			$json = file_get_contents('http://api.ipaddresslabs.com/iplocation/v1.7/locateip?key=SAK6AAB3GC3C2Q299M3Z&ip='.$ip.'&format=json');
			$json = json_decode($json);
			
			$country = $json->geolocation_data->country_name;
			$city = $json->geolocation_data->city;
			
			$countryId = 0;
			$cityId = 0;
			$latitude = $json->geolocation_data->latitude;
			$longitude = $json->geolocation_data->longitude;
			
			$_country = CountriesModel::getCountry($country);
			if ($_country !== false) {
				$countryId = $_country['country'];
				$_city = CountriesModel::getCity($_country['country'], $city);
				if ($_city !== false) {
					$cityId = $_city['identity'];
				}
			}
			
			return Array(
				'country' => $countryId,
				'city' => $cityId,
				'latitude' => $latitude,
				'longitude' => $longitude
			);
			*/
			
			return Array ( 'country' => 5, 'city' => 1957236, 'latitude' => 40.3953, 'longitude' => 49.8822 );
		}
		
		public static function setLocation($location) {
			$cookieTime = 3600 * 24 * 30; 
			
			$_SESSION['cityId'] = $location['city'];
			$_SESSION['countryId'] = $location['country'];
			$_SESSION['latitude'] = $location['latitude'];
			$_SESSION['longitude'] = $location['longitude'];
			
			setCookie('countryId', $location['country'], time() + $cookieTime, '/');
			setCookie('cityId', $location['city'], time() + $cookieTime, '/');
			setCookie('latitude', $location['latitude'], time() + $cookieTime, '/');
			setCookie('longitude', $location['longitude'], time() + $cookieTime, '/');
			
			if (AuthController::isLoggedIn()) UserInfoModel::setLocation($_SESSION['user_id'], $location);
			
		}
		
		public static function getLang() {
			
			if (isset($_SESSION['lang'])) return $_SESSION['lang'];
			
			if (isset($_COOKIE['lang'])) {
				return $_COOKIE['lang'];
			}
			
			$ip = '217.64.23.22';
			$loc = self::getLocation($ip);
			
			$lang = LocationLang::getLangForCountry($loc['country']);
			
			return $lang;
		}
		
		public static function setLang($lang) {
			$cookieTime = 3600 * 24 * 30; 
			$_SESSION['lang'] = $lang;
			setCookie('lang', $lang, time() + $cookieTime, '/');
			
			if (AuthController::isLoggedIn()) UsersModel::setLanguage($_SESSION['user_id'], $lang);
			
		}
		
		
	}

?>