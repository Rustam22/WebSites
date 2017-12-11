<?php
	class FilesModel extends CRUDModel {
		public $r_id;
		public $lang_id;
		public $iTitle;
		public $date;
		public $file;
		public $image;
		public $pageId;
		
		public static $tplViewFile;
		public static $multiLang = true;
		private static $pages;
		
		public function __construct() {
		
			$messages = Application::$messages['model_files'];
			$this->iTitle = new ModelTextField("iTitle", $messages['field_itemTitle'], true, true);
			$this->iTitle->required = false;
			$this->date = new ModelDateField("date", $messages['field_date'], true, true);
			$this->date->common = true;
			$this->file = new ModelFMFileField("file", $messages['field_file'], true, true);

			$this->image = new ModelFMImageField("image", $messages['field_image'], true, true);
			$this->image->required = false;
			$this->image->common = true;

			$this->pageId = new ModelSelectField("pageId", $messages['field_pageId'], self::$pages, true, true);
			$this->pageId->common = true;
		}
		
		public static function initialize() {
			self::$displayFields = Array('iTitle', 'date');
			self::$title = Application::$messages['model_files']['title'];
			self::$iconPath = 'category-icons.png';
			self::$multiLang = true;
			self::$searchable = false;
			self::$useOwnViewUrl = false;

			$pagesData = self::fQuery("SELECT * FROM `".MenuModel::getTableName()."` WHERE `lang_id` = '{#1}'", Array(Application::$settings['default_language']));
			$pages = Array();
			$c = count($pagesData);
			for ($i = 0; $i < $c; $i++) {
				$pages[$pagesData[$i]['r_id']] = $pagesData[$i]['menuItemTitle'];
			}
			self::$pages = $pages;
		}
		
		public static function getFilesForPage($pageId, $lang) {
			$files = self::find(" WHERE `pageId` = '{#1}' AND `lang_id` = '{#2}' ORDER BY `date` DESC", Array($pageId, $lang));
			$c = count($files);
			for ($i = 0; $i < $c; $i++) {
				$fSize = filesize(Application::$settings['public_folder'] . ds . $files[$i]->file->value);
				$fSize = intval(($fSize / 1000) / 1000) . '.' . intval($fSize / 1000);
				$files[$i]->size = $fSize;
				$fExtension = Utils::getFileExtension($files[$i]->file->value);
				switch ($fExtension) {
					case 'doc': case 'docx':
						$files[$i]->fType = 'doc';
						break;
					case 'xls': case 'xlsx':
						$files[$i]->fType = 'xls';
						break;
					case 'pdf':
						$files[$i]->fType = 'pdf';
						break;
				}
			}
			return $files;
		}

	}
?>