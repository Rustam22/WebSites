<?php

	class ResumeFilesModel extends CRUDModel {
		
		public static function addFiles($userId, $files) {
			
			for ($i = 0, $c = count($files); $i < $c; $i++) {
				
				$sql = " INSERT INTO `". self::getTableName() ."` (`userId`, `file`) VALUES ('{#1}', '{#2}') ";
				self::query($sql, Array($userId, $files[$i]));
			}
			
		}
		
		public static function getFiles($userId) {
			return self::fQuery(" SELECT * FROM `". self::getTableName() ."` WHERE `userId` = '{#1}' ", Array($userId));
		}
		
	}

?>