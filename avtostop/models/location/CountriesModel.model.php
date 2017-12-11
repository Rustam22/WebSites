<?php

	class CountriesModel extends CRUDModel {
	
		public static function getCountry($title) {
			
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE LOWER(`title`) = '{#1}' AND `lang` = 'en' ";
			$r = self::fQuery($sql, Array(strtolower($title)));
			
			if (count($r) == 1) return $r[0];
			else {
				// send mail to developer country not found
				return false;
			}
			
		}
		
		public static function getCity($countryId, $title) {
			
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE LOWER(`title`) = '{#1}' AND `parent` = '{#2}' AND `lang` = 'en' ";
			$r = self::fQuery($sql, Array(strtolower($title), $countryId));
			
			if (count($r) == 1) return $r[0];
			else {
				// send mail to developer (city not found)
				return false;
			}
			
		}
		
		public static function getCountriesKV($lang) {
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `lang` = '{#1}' AND `parent` = '0' ";
			$r = self::fQuery($sql, Array($lang));
			
			$out = Array();
			$c = count($r);
			for ($i = 0; $i < $c; $i++) {
				$out[$r[$i]['country']] = $r[$i]['title'];
			}
			
			return $out;
		}
		
		public static function getCitiesKV($lang, $countryId) {
			
			$out = Array();
			
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `lang` = '{#1}' AND `parent` = '{#2}' ";
			$r = self::fQuery($sql, Array($lang, $countryId));
			
			$c = count($r);
			for ($i = 0; $i < $c; $i++) {
				$out[$r[$i]['identity']] = $r[$i]['title'];
			}
			
			return $out;
			
		}
		
		public static function getCityTitle($identity, $lang) {
			
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `lang` = '{#1}' AND `identity` = '{#2}' ";
			$r = self::fQuery($sql, Array($lang, $identity));
			if (count($r) == 1) {
				return $r[0]['title'];
			} else if (count($r) > 1) {
				// send report to developer
			} else {
				return '#empty';
			}
			
		}
		
		public static function getCountryTitle($identity, $lang) {
			
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `lang` = '{#1}' AND `country` = '{#2}' ";
			$r = self::fQuery($sql, Array($lang, $identity));
			if (count($r) == 1) {
				return $r[0]['title'];
			} else if (count($r) > 1) {
				// send report to developer
			} else {
				return '#empty';
			}
			
		}
	
	}

?>