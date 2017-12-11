<?php

	class UserExperienceModel extends CRUDModel {
		
		public static function addExperience($userId, $experience) {
			
			$sql = " INSERT INTO `". self::getTableName() ."` (`company`, `profession`, `dateStart`, `dateEnd`, `description`, `userId`) VALUES ('{#1}', '{#2}', '{#3}', '{#4}', '{#5}', '{#6}') ";
			if (self::query($sql, Array($experience['company'], $experience['profession'], $experience['dateStart'], $experience['dateEnd'], $experience['description'], $userId))) {
				return Array(
					'id' => self::getLastId(self::getTableName())
				);
			} else return false;
		}
		
		public static function removeExperience($id) {
			$sql = " DELETE FROM `". self::getTableName() ."` WHERE `id` = '{#1}' ";
			return self::query($sql, Array($id));
		}
		
		public static function getExperienceForUser($userId) {
			
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `userId` = '{#1}' ";
			return self::fQuery($sql, Array($userId));
			
		}
		
	}

?>