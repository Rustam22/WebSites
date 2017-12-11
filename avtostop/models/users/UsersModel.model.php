<?php

	class UsersModel extends CRUDModel {
	
		public static function registerUser($mail, $password, $secretQuestion, $secretQuestionAnswer, $userType, $name, $token, $location, $lang) {

			$sql = " START TRANSACTION; ";
			self::query($sql);
		
			$sql = " INSERT INTO `". self::getTableName() ."` 
				(`mail`, `password`, `secretQuestionId`, `secretQuestionAnswer`, `usertype`, `activated`, `activationToken`, `lang`)
				VALUES ( '{#1}', '{#2}', '{#3}', '{#4}', '{#5}', '{#5}', '{#6}', '{#7}' )";

			self::query($sql, Array($mail, md5($password), $secretQuestion, $secretQuestionAnswer, $userType, 0, $token, $lang));
			$id = self::getLastId(self::getTableName());
			
			
			$sql = " INSERT INTO `".UserInfoModel::getTableName()."` (`userId`, `name`, `cityId`, `countryId`, `latitude`, `longitude`) VALUES ('{#1}', '{#2}', '{#3}', '{#4}', '{#5}', '{#6}') ";
			self::query($sql, Array($id, $name, $location['city'], $location['country'], $location['latitude'], $location['longitude']));
			
			$sql = " INSERT INTO `vl1_UsersWishesModel` (`userId`, `profession`, `salary`, `cityId`) VALUES ('{#1}', '{#2}', '{#3}', '{#4}') ";
			self::query($sql, Array($id, '', '', ''));
			
			$sql = " COMMIT; ";
			$b = self::query($sql);
			
			return $b;
		}
	
		public static function activateAccountByIdAndToken($id, $token) {
			$sql = " UPDATE `". self::getTableName() ."` SET `activated` = '1' WHERE `id` = '{#2}' AND `activationToken` = '{#3}' ";
			return self::query($sql, Array($id, $token));
		}
	
		public static function getIncativeUserByToken($token) {
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `activated` = '0' AND `activationToken` = '{#1}' ";
			return self::returnOneUser(self::fQuery($sql, Array($token)));
		}
	
		public static function getUserByMailAndPsw($mail, $psw) {
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `mail` = '{#1}' AND `password` = '{#2}' AND `activated` = '1' ";
			$r = self::fQuery($sql, Array($mail, md5($psw)));
			return self::returnOneUser($r);
		}
		
		public static function getUserByMail($mail) {
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `mail` = '{#1}' ";
			$r = self::fQuery($sql, Array($mail));
			return self::returnOneUser($r);
		}
		
		public static function getUserByIdentity($identity, $mail) {
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `identity` = '{#1}' OR `mail` = '{#2}' ";
			$r = self::fQuery($sql, Array($identity, $mail));
			return self::returnOneUser($r);
		}
		
		public static function getUserById($id) {
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `id` = '{#1}' AND `activated` = '1' ";
			$r = self::fQuery($sql, Array($id));
			return self::returnOneUser($r);
		}
		
		public static function getUserByToken($token) {
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `cookieToken` = '{#1}' AND `activated` = '1' ";
			$r = self::fQuery($sql, Array($token));
			return self::returnOneUser($r);
		}
		
		public static function changeCookieToken($userId, $token) {
			$sql = " UPDATE `". self::getTableName() ."` SET `cookieToken` = '{#1}' WHERE `id` = '{#2}' AND `activated` = '1' ";
			self::query($sql, Array($token, $userId));
		}
		
		public static function userExists($mail) {
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `mail` = '{#1}' ";
			$r = self::fQuery($sql, Array($mail));
			if (count($r) > 0) return true;
			return false;
		}
		
		public static function registerFromSocial($mail, $name, $identity, $avatar) {
			$sql = " INSERT INTO `". self::getTableName() ."` (`name`, `mail`, `identity`) VALUES ('{#1}', '{#2}', '{#3}') ";
			if (self::query($sql, Array($name, $mail, $identity))) {
				return self::getLastId('vl1_UsersModel');
			}
			return false;
		}
		
		public static function lostPassword($mail, $token, $time) {
			$sql = " UPDATE `". self::getTableName() ."` SET `lostPasswordToken` = '{#1}', `lostPasswordTime` = '{#2}' WHERE `mail` = '{#3}' AND `activated` = '1' ";
			self::query($sql, Array($token, $time, $mail));
			
			return true;
		}
		
		public static function lpwTokenExists($token) {
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `lostPasswordToken` = '{#1}' AND `activated` = '1' ";
			$r = self::fQuery($sql, Array($token));
			if (count($r) > 0) return true;
			return false;
		}
		
		public static function changeUserPassword($hash, $password) {
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `lostPasswordToken` = '{#1}' AND `activated` = '1' ";
			$r = self::fQuery($sql, Array($hash));
			if (count($r) > 0) {
				$sql = " UPDATE `". self::getTableName() ."` SET `password` = '{#1}', `lostPasswordToken` = '' WHERE `lostPasswordToken` = '{#2}' ";
				self::query($sql, Array($password, $hash));
				return $r[0]['id'];
			}
			return false;
		}
		
		public static function setLanguage($userId, $lang) {
			$sql = " UPDATE `". self::getTableName() ."` SET `lang` = '{#1}' WHERE `id` = '{#2}' ";
			return self::query($sql, Array($lang, $userId));
		}
		
		private static function returnOneUser($r) {
			if (count($r) > 0) {
				return Array(
					'success' => true,
					'user' => $r[0]
				);
			} else return Array(
				'success' => false
			);
		} 
	
	}

?>