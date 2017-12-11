<?php

	class UserContactsModel extends CRUDModel {
	
	
		public static function getContacts($userId) {
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `userId` = '{#1}' ";
			$r = self::fQuery($sql, Array($userId));
			
			$out = Array();
			if (count($r) > 0) {
				$c = count($r);
				for ($i = 0; $i < $c; $i++) {
					$out[$r[$i]['contactId']] = $r[$i];
				}
			}
			
			return $out;
		}
		
		public static function addContact($userId, $contactId, $value) {
			$sql = " INSERT INTO `". self::getTableName() ."` (`userId`, `contactId`, `contactValue`) VALUES ('{#1}', '{#2}', '{#3}') ";
			return self::query($sql, Array($userId, $contactId, $value));
		}
		
		public static function updateContact($userId, $type, $value) {
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `contactId` = '{#1}' AND `userId` = '{#2}' ";
			$r = self::fQuery($sql, Array($type, $userId));
			if (count($r) == 1) {
				$sql = " UPDATE `". self::getTableName() ."` SET `contactValue` = '{#1}' WHERE `userId` = '{#2}' AND `contactId` = '{#3}' ";
				return self::query($sql, Array($value, $userId, $type));
			} else if (count($r) > 1) {
				// send mail to developer
			} else {
				$sql = " INSERT INTO `". self::getTableName() ."` (`userId`, `contactId`, `contactValue`) VALUES ('{#1}', '{#2}', '{#3}') ";
				return self::query($sql, Array($userId, $type, $value));
			}
		}
	
	}

?>