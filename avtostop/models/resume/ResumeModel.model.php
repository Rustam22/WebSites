<?php

	class ResumeModel extends CRUDModel {
		
		public static function resumeExists($userId) {
			
			$sql = " SELECT * FROM `". ResumeModel::getTableName() ."` WHERE `userId` = '{#1}' ";
			$r = self::fQuery($sql, Array($userId));
			if (count($r) == 1) {
				return true;
			} else {
				// send mail to developer
				//self::clearResume($userId);
				return false;
			}
			
		}
		
		public static function getResume($userId, $smarty) {
			
			if (self::resumeExists($userId)) {
				$info = ResumeInfoModel::getResumeInfo($userId);
				$main = ResumeMainModel::getResumeMain($userId);
				$lastWorks = ResumeLastWorkModel::getLastWorks($userId);
				$files = ResumeFilesModel::getFiles($userId);
				$contact = ResumeContactModel::getResumeContact($userId);
				
				return Array(
					'info' => ResumeInfoForm::getReadOnlyView($smarty, $info),
					'main' => ResumeMainForm::getReadOnlyView($smarty, $main),
					'lastWorks' => $lastWorks,
					'files' => $files,
					'contact' => ResumeContactForm::getReadOnlyView($smarty, $contact),
				);
				
			} else {
				return false;
			}
			
		}
		
		public static function editResume($data) {
			
			$keys = array_keys($data);
			$values = array_values($data);
			
			for ($i = 0, $c = count($keys); $i < $c; $i++) {
				$keys[$i] = "`" . $keys[$i] . "` = '" . $values[$i] . "'";
			}
			
			$sql = " UPDATE `". self::getTableName() ."` SET ". join(',', $keys) ." WHERE `userId` = '{#1}'";
			return self::query($sql, Array($data['userId']));
			
		}
		
		public static function addResume($data) {
			self::clearResume($data['userId']);
			
			$keys = array_keys($data);
			$values = array_values($data);
			
			for ($i = 0, $c = count($keys); $i < $c; $i++) {
				$keys[$i] = "`" . $keys[$i] . "`";
				$values[$i] = "'" . $values[$i] . "'";
			}
			
			$sql = " INSERT INTO `". self::getTableName() ."` (". join(',', $keys) .") VALUES (". join(',', $values) .") ";
			return self::query($sql);
			
		}
		
		public static function clearResume($userId) {
			$sql = " DELETE FROM `". ResumeModel::getTableName() ."` WHERE `userId` = '{#1}' ";
			self::query($sql, Array($userId));
			
			$sql = " DELETE FROM `". ResumeInfoModel::getTableName() ."` WHERE `userId` = '{#1}' ";
			self::query($sql, Array($userId));
			
			$sql = " DELETE FROM `". ResumeContactModel::getTableName() ."` WHERE `userId` = '{#1}' ";
			self::query($sql, Array($userId));
			
			$sql = " DELETE FROM `". ResumeMainModel::getTableName() ."` WHERE `userId` = '{#1}' ";
			self::query($sql, Array($userId));
			
			$sql = " DELETE FROM `". ResumeLastWorkModel::getTableName() ."` WHERE `userId` = '{#1}' ";
			self::query($sql, Array($userId));
			
			$sql = " DELETE FROM `". ResumeFilesModel::getTableName() ."` WHERE `userId` = '{#1}' ";
			self::query($sql, Array($userId));
		}
		
	}

?>