<?php

	require_once Application::$fileRoot->classes->UserReview_class_php;
	
	class UserReviewModel extends CRUDModel {
		
		public static function getReviewsForUser($userId, $lang) {
			$reviewTable = self::getTableName();
			$infoTable = UserInfoModel::getTableName();
			$sql = " SELECT `". $infoTable ."`.`avatar`, `". $infoTable ."`.`userId`, `". $infoTable ."`.`name`, `". $infoTable ."`.`countryId`, `". $infoTable ."`.`cityId`, `". $reviewTable ."`.`review`, `". $reviewTable ."`.`date`, `". $reviewTable ."`.`enabled`, `". $reviewTable ."`.`id`
			FROM `". $reviewTable ."` INNER JOIN `". $infoTable ."`
					ON
					`". $reviewTable ."`.`fromUser` = `". $infoTable ."`.`userId`
					WHERE `". $reviewTable ."`.`toUser` = '{#1}' AND `". $reviewTable ."`.`enabled` = '1' ORDER BY `". $reviewTable ."`.`date` DESC ";
			
			$r = self::fQuery($sql, Array($userId));
			
			$result = Array();
			for ($i = 0, $c = count($r); $i < $c; $i++) {
				$_tmp = new UserReview();
				$_tmp->name = $r[$i]['name'];
				$_tmp->country = CountriesModel::getCountryTitle($r[$i]['countryId'], $lang);
				$_tmp->city = CountriesModel::getCityTitle($r[$i]['cityId'], $lang);
				$_tmp->review = $r[$i]['review'];
				$_tmp->avatar = $r[$i]['avatar'];
				$_tmp->published = $r[$i]['date'];
				$_tmp->enabled = $r[$i]['enabled'];
				$_tmp->id = $r[$i]['id'];
				$_tmp->userId = $r[$i]['userId'];
				
				$_tmp->init();
				
				$result[] = $_tmp;
			}
			
			return $result;
		}
		
		public static function enableReview($id) {
			
			$sql = " UPDATE `". self::getTableName() ."` SET `enabled` = '1' WHERE `id` = '{#1}' ";
			return self::query($sql, Array($id));
			
		}
		
		public static function removeReview($id) {
			
			$sql = " DELETE FROM `". self::getTableName() ."` WHERE `id` = '{#1}' ";
			return self::query($sql, Array($id));
			
		}
		
		public static function getAllReviewsForUser($userId, $lang) {
			$reviewTable = self::getTableName();
			$infoTable = UserInfoModel::getTableName();
			$sql = " SELECT `". $infoTable ."`.`avatar`, `". $infoTable ."`.`userId`, `". $infoTable ."`.`name`, `". $infoTable ."`.`countryId`, `". $infoTable ."`.`cityId`, `". $reviewTable ."`.`review`, `". $reviewTable ."`.`date`, `". $reviewTable ."`.`enabled`, `". $reviewTable ."`.`id`
			FROM `". $reviewTable ."` INNER JOIN `". $infoTable ."`
					ON
					`". $reviewTable ."`.`fromUser` = `". $infoTable ."`.`userId`
					WHERE `". $reviewTable ."`.`toUser` = '{#1}' ORDER BY `". $reviewTable ."`.`enabled` ASC, `". $reviewTable ."`.`date` DESC ";
			
			$r = self::fQuery($sql, Array($userId));
			
			$result = Array();
			for ($i = 0, $c = count($r); $i < $c; $i++) {
				$_tmp = new UserReview();
				$_tmp->name = $r[$i]['name'];
				$_tmp->country = CountriesModel::getCountryTitle($r[$i]['countryId'], $lang);
				$_tmp->city = CountriesModel::getCityTitle($r[$i]['cityId'], $lang);
				$_tmp->review = $r[$i]['review'];
				$_tmp->avatar = $r[$i]['avatar'];
				$_tmp->published = $r[$i]['date'];
				$_tmp->enabled = $r[$i]['enabled'];
				$_tmp->id = $r[$i]['id'];
				$_tmp->userId = $r[$i]['userId'];
				
				$_tmp->init();
				
				$result[] = $_tmp;
			}
			
			return $result;
		}
		
		public static function addReview($fromUser, $review, $toUser) {
			
			$date = time();
			
			$sql = " INSERT INTO `". self::getTableName() ."` (`fromUser`, `toUser`, `review`, `date`) VALUES ('{#1}', '{#2}', '{#3}', '{#4}') ";
			return self::query($sql, Array($fromUser, $toUser, $review, $date));
			
		}
		
	}

?>