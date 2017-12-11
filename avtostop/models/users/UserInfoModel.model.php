<?php

	class UserInfoModel extends CRUDModel {
	
		public static function getInfoForUser($userId) {
			
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `userId` = '{#1}' ";
			return self::fQuery($sql, Array($userId));
			
		}
		
		public static function saveData($userInfo) {
			
			$sql = " UPDATE `". self::getTableName() ."` SET 
				`name` = '{#1}', `birthday` = '{#2}', `cityId` = '{#3}', `countryId` = '{#4}', `sex` = '{#5}',
				`about` = '{#6}', `skills` = '{#7}', `courses` = '{#8}', `education` = '{#9}', `avatar` = '". $userInfo['avatar'] ."'
				WHERE `userId` = '{#0}' ";
			return self::query($sql, Array($userInfo['name'], $userInfo['birthday'], $userInfo['cityId'], $userInfo['countryId'], $userInfo['sex'], 
			$userInfo['about'], $userInfo['skills'], $userInfo['courses'], $userInfo['education'], $userInfo['userId']));
			
		}
		
		public static function setLocation($userId, $location) {
			
			$sql = " UPDATE `". self::getTableName() ."` SET `cityId` = '{#1}', `countryId` = '{#2}', `latitude` = '{#3}', `longitude` = '{#4}' WHERE `userId` = '{#5}' ";
			return self::query($sql, Array($location['city'], $location['country'], $location['latitude'], $location['longitude'], $userId));
			
		}
	
	}

?>