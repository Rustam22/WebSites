<?php

	class UserWishesModel extends CRUDModel {
		
		public static function getWishesForUser($userId) {
			
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `userId` = '{#1}' ";
			$r = self::fQuery($sql, Array($userId));
			
			if (count($r) == 1) {
				return $r[0];
			} else if (count($r) > 1) {
				// send mail to developer
			} else {
				$sql = " INSERT INTO `". self::getTableName() ."` (`userId`) VALUES ('{#1}') ";
				self::query($sql, Array($userId));
				
				return self::getWishesForUser($userId);
			}
			
		}
		
		public static function updateUserWishes($wishes) {
			
			$sql = " UPDATE `". self::getTableName() ."` SET `profession` = '{#1}', `salary` = '{#2}', `cityId` = '{#3}', `countryId` = '{#4}' WHERE `id` = '{#5}' ";
			return self::query($sql, Array($wishes['profession'], $wishes['salary'], $wishes['cityId'], $wishes['countryId'], $wishes['id']));
			
		}
		
	}

?>