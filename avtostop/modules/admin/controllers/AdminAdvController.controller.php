<?php

	class AdminAdvController extends Controller {
		
		public static function listOfTables($r, $v) {
			$tables = AdvertisementStructureModel::getTables();
			self::renderTemplate('advertisement'. ds .'adv-table-list.tpl', Array(
				'tables' => $tables,
			));
		}
		
		public static function add($r, $v) {
			self::renderTemplate('advertisement'. ds .'adv-add-table.tpl', Array(
				'fields' => AdvertisementStructureModel::getFields()
			));
		}
		
		public static function removeTable($r, $v) {
			
			$tableId = $v['table_id'];
			
			if (AdvertisementStructureModel::removeTable($tableId)) echo json_encode(Array('success' => true));
			
		}
		
		public static function save($r, $v) {
			$tableId = $v['table_id'];
			
			$table = AdvertisementStructureModel::getTable($v['table_id']);
			
			// edit table name
			$tableTitle = $_POST['tableName'];
			AdvertisementStructureModel::setTableTitle($tableId, $tableTitle);
			
			$table['has_price'] = $_POST['tableHasPrice'];
			$table['has_map'] = $_POST['tableHasMap'];
			$table['has_image'] = $_POST['tableHasImage'];
			$table['has_add_info'] = $_POST['tableHasAddInfo'];
			$table['has_newspaper'] = $_POST['tableNewspaper'];
			$table['has_video'] = $_POST['tableHasVideo'];
			
			AdvertisementStructureModel::saveTable($table);
			
			// edit exist fields
			$lastIndex = -1;
			if (isset($_POST['fieldId']) && count($_POST['fieldId']) > 0) {
				foreach ($_POST['fieldId'] as $i => $fId) {
					$fieldType = explode("|", $_POST['fieldType'][$i]);
					$order = $_POST['fieldOrder'][$i];
					AdvertisementStructureModel::changeField($fId, $fieldType[0], $_POST['fieldIsSearchable'][$i], $_POST['fieldIsAddInfo'][$i], $_POST['fieldIsRequired'][$i], $order);
					BaseModel::query(self::getSqlForFieldModify($fieldType[1], $_POST['fieldTitle'][$i], $table['table_name']));
					
					foreach (Application::$settings['languages'] as $langIso => $lang) {
						AdvertisementStructureModel::changeFieldMessage($_POST['fieldMessageId'][$langIso][$i], $_POST['fieldMessage'][$langIso][$i]);
					}
					$lastIndex = $i;
				}
			}
			
			// if new fields exists
			if (isset($_POST['newField']) && count($_POST['newField']) > 0) {
				$c = count($_POST['newField']) + intval($lastIndex);
				
				if ($lastIndex !== -1) $k = intval($lastIndex) + 1;
				else {
					$k = 0;
					$c--;
				}
				
				while ($k <= $c) {
					// add field to table
					$t = explode('|', $_POST['fieldType'][$k]);
					$fieldType = $t[1];
					$fieldTitle = $_POST['fieldTitle'][$k];
					$order = $_POST['fieldOrder'][$k];
					$fieldSearchable = $_POST['fieldIsSearchable'][$k];
					$fId = $t[0];
					$isAddInfo = $_POST['fieldIsAddInfo'][$k];
					$isRequired = $_POST['fieldIsRequired'][$k];
					
					$fieldId = AdvertisementStructureModel::addField(Array($fId, $fieldTitle, $fieldSearchable, $isAddInfo, $isRequired, $order), $tableId);
					
					// add field messages
					$messages = Array();
					foreach (Application::$settings['languages'] as $l => $langTitle) {
						$messages[$l] = $_POST['fieldMessage'][$l][$k];
					}
					AdvertisementStructureModel::addFieldMessages($messages, $fieldId);
					
					// alter table
					BaseModel::query(self::getSqlForFieldModifyAdd($t[1], $fieldTitle, $table['table_name']));
					$k++;
				}
			}
			
			// edit field messages
		}
		
		public static function edit($r, $v) {
			
			// get table for display
			$table = AdvertisementStructureModel::getTable($v['table_id']);
			
			// get all fields
			$fields = AdvertisementStructureModel::getFieldsForTable($v['table_id']);
			
			$fieldMessages = Array();
			
			// get field message for every field
			foreach ($fields as $f) {
				$fieldMessages[$f['id']] = AdvertisementStructureModel::getMesagesForField($f['id']);
			}
			
			self::renderTemplate('advertisement'. ds .'adv-edit-table.tpl', Array(
				'table' => $table,
				'fields' => $fields,
				'fieldMessages' => $fieldMessages,
				'fieldTypes' => AdvertisementStructureModel::getFields()
			));
			
		}
		
		public static function addSubmitted($r, $v) {
			$success = true;
			
			$sql = "";
			$sqlField = Array();
			
			// get table name and title
			$tableTitle = Security::filterSql(Security::filterString($_POST['tableName']), BaseModel::$mysqli);
			$tableName = self::getTableName($tableTitle);
			
			
			// for all fields
			if (count($_POST['fieldTitle']) < 1) {
				echo "error";
				die();
			}
			
			$fields = Array();
			$fieldMessages = Array();
			
			// get sql for table and field
			foreach ($_POST['fieldTitle'] as $k => $v) {
				$t = explode('|', $_POST['fieldType'][$k]);
				$fieldType = $t[1];
				$fieldTitle = $_POST['fieldTitle'][$k];
				$order = $_POST['fieldOrder'][$k];
				$fieldSearchable = $_POST['fieldIsSearchable'][$k];
				$fieldIsAddInfo = $_POST['fieldIsAddInfo'][$k];
				$fieldId = $t[0];
				$required = $_POST['fieldIsRequired'][$k];
				
				// get sql code for field by type
				$sqlField[] = self::getSqlForFieldAdd($fieldType, $fieldTitle);
				
				$fields[] = Array($fieldId, $fieldTitle, $fieldSearchable, $fieldIsAddInfo, $required, $order);
				foreach (Application::$settings['languages'] as $l => $L) {
					$fieldMessages[$fieldId][$l] = $_POST['fieldMessage'][$l][$k];
				}
				
			}
			
			$hasMap = $_POST['tableHasMap'];
			$hasImage = $_POST['tableHasImage'];
			$hasAddInfo = $_POST['tableHasAddInfo'];
			$hasNewspaper = $_POST['tableNewspaper'];
			$hasPrice = intval($_POST['tableHasPrice']);
			$hasVideo = intval($_POST['tableHasVideo']);
			
			// run sql commands
			AdvertisementStructureModel::createTable($tableName, $sqlField, $hasPrice);
			
			$tableId = AdvertisementStructureModel::addTable($tableTitle, $tableName, $hasMap, $hasImage, $hasNewspaper, $hasAddInfo, $hasPrice, $hasVideo);
			foreach ($fields as $k => $v) {
				$fieldId = AdvertisementStructureModel::addField($v, $tableId);
				AdvertisementStructureModel::addFieldMessages($fieldMessages[$v[0]], $fieldId);
			}
			
			echo "success";
			
			return;
			
		}
		
		private static function getSqlForFieldAdd($fieldType, $fieldName) {
			$sql = "";
			switch ($fieldType) {
				// field text
				case 0: case 2: case 3: case 4:
					$sql = "`" . $fieldName . "` VARCHAR(250) default NULL";
					break;
				case 1:
					$sql = "`" . $fieldName . "` LONGTEXT default NULL";
					break;
				case 5:
					$sql = "`" . $fieldName . "` DATETIME default NULL";
					break;
			}
			return $sql;
		}
		
		private static function getSqlForFieldModify($fieldType, $fieldName, $tableName) {
			$sql = "ALTER TABLE `". $tableName ."` MODIFY " . self::getSqlForFieldAdd($fieldType, $fieldName);
			return $sql;
		}
		
		private static function getSqlForFieldModifyAdd($fieldType, $fieldName, $tableName) {
			$sql = "ALTER TABLE `". $tableName ."` ADD " . self::getSqlForFieldAdd($fieldType, $fieldName);
			return $sql;
		}
		
		private static function getTableName($s) {
			return 'brj_adv_table_' . md5($s);
		}
		
		private static function getFieldName($f) {
			return $f;
		}
		
		public static function removeField($r, $v) {
			$fieldId = $v['field_id'];
			
			if (AdvertisementStructureModel::removeTableField($fieldId)) echo json_encode(Array('success' => true));
			
		}
		
	}

?>