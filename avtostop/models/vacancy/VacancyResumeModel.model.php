<?php

	class VacancyResumeModel extends CRUDModel {
		
		public static function exists($userId, $vacancyId) {
			
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `userId` = '{#1}' AND `vacancyId` = '{#2}' ";
			$r = self::fQuery($sql, Array($userId, $vacancyId));
			
			if (count($r) == 1) {
				return true;
			} else if (count($r) == 0) {
				return false;
			} else {
				// send mail to developer
				return false;
			}
			
		}
		
		public static function addPair($userId, $vacancyId) {
			
			$sql = " INSERT INTO `". self::getTableName() ."` (`userId`, `vacancyId`) VALUES ('{#1}', '{#2}') ";
			return self::query($sql, Array($userId, $vacancyId));
			
		}
		
		public static function getUsersForVacancy($vacancyId) {
			
			$v = self::getTableName();
			$u = UserInfoModel::getTableName();
			
			$sql = " SELECT * FROM `". $v ."` INNER JOIN `". $u ."` ON `".$v."`.`userId` = `". $u ."`.`userId` WHERE `". $v ."`.`vacancyId` = '{#1}' ";
			return self::fQuery($sql, Array($vacancyId));
			
		}
		
	}

?>