<?php

	class ResumeLastWorkModel extends CRUDModel {
		
		public static function addWorks($userId, $works) {
			
			for ($i = 0, $c = count($works); $i < $c; $i++) {
				
				$data = $works[$i];
				
				$keys = array_keys($data);
				$values = array_values($data);
				$query = Array();
				
				for ($j = 0, $jC = count($keys); $j < $jC; $j++) {
					if ($keys[$j] == 'id') continue;
					$keys[$j] = '`' . $keys[$j] . '`';
					$values[$j] = "'" . self::filterValue($values[$j]) . "'";
					$query[] = $keys[$j] . " = " . $values[$j];
				}
				
				if (!isset($data['id'])) {
					$sql = " INSERT INTO `".self::getTableName()."` (". join(',', $keys) .", `userId`) VALUES (". join(',', $values) .", '{#1}') ";
					self::query($sql, Array($userId));
				}
				else {
					$sql = " UPDATE `".self::getTableName()."` SET ". join(',', $query) ." WHERE `id` = '{#1}' ";
					self::query($sql, Array($data['id']));
				}
				
			}
			
		}
		
		public static function getLastWorks($userId) {
			
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `userId` = '{#1}' ";
			$r = self::fQuery($sql, Array($userId));
			return $r;
			
		}
		
		public static function removeWork($id) {
			$sql = " DELETE FROM `". self::getTableName() ."` WHERE `id` = '{#1}' ";
			return self::query($sql, Array($id));
		}
		
	}

?>