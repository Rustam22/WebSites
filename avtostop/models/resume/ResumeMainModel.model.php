<?php

	class ResumeMainModel extends CRUDModel {
		
		public static function addMainResume($userId, $info) {
			
			$data = $info['data'];
			
			$keys = array_keys($data);
			$values = array_values($data);
			
			for ($i = 0, $c = count($keys); $i < $c; $i++) {
				$keys[$i] = '`' . $keys[$i] . '`';
				$values[$i] = "'" . self::filterValue($values[$i]) . "'";
			}
			
			$sql = " INSERT INTO `".self::getTableName()."` (". join(',', $keys) .", `userId`) VALUES (". join(',', $values) .", '{#1}') ";
			return self::query($sql, Array($userId));
			
		}
		
		public static function editMain($userId, $info) {
			
			$data = $info['data'];
			
			$keys = array_keys($data);
			$values = array_values($data);
			
			$query = Array();
			
			for ($i = 0, $c = count($keys); $i < $c; $i++) {
				$query[] = "`" . $keys[$i] . "` = '" . self::filterValue($values[$i]) . "'";
			}
			
			$sql = " UPDATE `".self::getTableName()."` SET ". join(',', $query) ." WHERE `userId` = '{#1}' ";
			return self::query($sql, Array($userId));
			
		}
		
		public static function getResumeMain($userId) {
			
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `userId` = '{#1}' ";
			$r = self::fQuery($sql, Array($userId));
			if (count($r) == 1) {
				return $r[0];
			} else {
				// send mail to developer
				return false;
			}
		}
		
	}

?>