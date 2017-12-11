<?php

	require_once Application::$fileRoot->classes->VacancyItem_class_php;

	class VacancyModel extends CRUDModel {
		
		public static function addVacancy($userId, $data) {
			
			$data['date'] = time();
			
			$keys = array_keys($data);
			$values = array_values($data);
			
			for ($i = 0, $c = count($keys); $i < $c; $i++) {
				$keys[$i] = '`' . $keys[$i] . '`';
				$values[$i] = "'" . self::filterValue($values[$i]) . "'";
			}
			
			$sql = " INSERT INTO `".self::getTableName()."` (". join(',', $keys) .", `userId`) VALUES (". join(',', $values) .", '{#1}') ";
			return self::query($sql, Array($userId));
		}
		
		public static function saveVacancy($id, $data) {
			
			$data['date'] = time();
			
			$keys = array_keys($data);
			$values = array_values($data);
			
			$query = Array();
			
			for ($i = 0, $c = count($keys); $i < $c; $i++) {
				$query[] = "`" . $keys[$i] . "` = '" . self::filterValue($values[$i]) . "'";
			}
			
			$sql = " UPDATE `".self::getTableName()."` SET ". join(',', $query) ." WHERE `id` = '{#1}' ";
			return self::query($sql, Array($id));
		}
		
		public static function getVacancyForUser($userId) {
			
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `userId` = '{#1}' ";
			$r = self::fQuery($sql, Array($userId));
			
			
			$result = Array();
			for ($i = 0, $c = count($r); $i < $c; $i++) {
				$tmp = new VacancyItem();
				$tmp->id = $r[$i]['id'];
				$tmp->title = $r[$i]['title'];
				$tmp->description = $r[$i]['description'];
				$tmp->date = $r[$i]['date'];
				$tmp->salaryFrom = $r[$i]['salaryFrom'];
				$tmp->salaryTo = $r[$i]['salaryTo'];
				$tmp->currency = Application::$settings['currency'][$r[$i]['salaryCurrency']];
				$tmp->city = CountriesModel::getCityTitle($r[$i]['cityId'], $_SESSION['lang']);
				$tmp->country = CountriesModel::getCountryTitle($r[$i]['countryId'], $_SESSION['lang']);
				$result[] = $tmp;
			}
			
			return $result;
		}
		
		public static function getUsersVacancy($userId, $vId) {
			
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `userId` = '{#1}' AND `id` = '{#2}' ";
			$r = self::fQuery($sql, Array($userId, $vId));
			if (count($r) == 1) {
				return $r[0];
			} else if (count($r) == 0) {
				return false;
			} else {
				// send mail to developer
				return false;
			}
		}
		
		public static function removeVacancy($id) {
			$sql = " DELETE FROM `". self::getTableName() ."` WHERE `id` = '{#1}' ";
			return self::query($sql, Array($id));
		}
		
		public static function getActiveVacancy($id) {
			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `id` = '{#1}' AND `active` = '1' ";
			$r = self::fQuery($sql, Array($id));
			if (count($r) == 1) {
				return $r[0];
			} else if (count($r) == 0) {
				return false;
			} else {
				// send mail to developer
				return false;
			}
		}
		
	}

?>