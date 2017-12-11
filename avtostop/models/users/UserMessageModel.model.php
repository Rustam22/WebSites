<?php

	class UserMessageModel extends CRUDModel {
		
		public static function addMessage($message, $toUser, $fromUser) {
			
			$sql = " INSERT INTO `". self::getTableName() ."` (`toUser`, `fromUser`, `message`) VALUES ('{#1}', '{#2}', '{#3}') ";
			return self::query($sql, Array($toUser, $fromUser, $message));
			
		}
		
	}

?>