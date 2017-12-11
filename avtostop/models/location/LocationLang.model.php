<?php

	class LocationLang extends CRUDModel {
		
		public static function getLangForCountry($countryId) {
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `countryId` = '{#1}' ";
			$r = self::fQuery($sql, Array($countryId));
			if (count($r) == 1) {
				return $r[0]['lang'];
			} else {
				if (count($r) > 1) {
					// send mail to developer - error
				} else {
					return false;
				}
			}
		}
		
	}

?>