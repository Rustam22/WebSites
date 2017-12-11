<?php	class FileManagerController extends Controller {				public static $startDir;		public static $currentDir;		public static $sessionKey = 'fm_current_dir';				public static function main($request, $vars = Array()) {						// get current dir			try {				self::$currentDir = self::cleanDir(SessionStorage::get(self::$sessionKey));			} catch (Exception $e) {				self::$currentDir = self::cleanDir(self::$startDir);			}									/*			self::renderTemplate('fm' . ds . 'main.tpl', Array(				'entries' => self::renderTemplate('fm' . ds . 'fm-content.tpl', Array(					'entries' => self::readDirData(self::$currentDir),					'currentDir' => self::$currentDir,					'startDir' => self::$startDir,				), true),			));			*/					}				public static function toPath($request, $vars = Array()) {			if (isset($_POST['path'])) {				// check if not in wrong path				if (strpos($_POST['path'], self::$startDir) === false) return;								try {					self::$currentDir = self::cleanDir(SessionStorage::get(self::$sessionKey));				} catch (Exception $e) {					self::$currentDir = self::cleanDir(self::$startDir);				}								$path = is_dir($_POST['path']) ? self::cleanDir($_POST['path']) : self::$currentDir;				$allowActions = isset($_POST['allowActions']) ? $_POST['allowActions'] : 0;				echo self::renderTemplate('fm' . ds . 'fm-content.tpl', Array(					'entries' => self::readDirData($path),					'currentDir' => self::getCurrentDir(),					'startDir' => self::$startDir,					'allowActions' => $allowActions,				), true);			}		}				private static function getCurrentDir() {			$currentDir = str_replace(self::$startDir, '', self::$currentDir);			$currentDir = explode("/", $currentDir);						$dirs = Array(				Array(					'title' => Application::$messages['file_manager']['start_directory'],					'path' => self::$startDir				)			);			$directory = Array(				self::$startDir			);			$c = count($currentDir);			for ($i = 1; $i < $c; $i++) {				$directory[] = $currentDir[$i];				$dir = join("/", $directory);				$dirs[] = Array(					'title' => $currentDir[$i],					'path' => $dir				);			}			return $dirs;		}				private static function getLastDiretory($path) {			return substr(strrchr($string, "/"), 1);		}				public static function reload($request, $vars = Array()) {			try {				self::$currentDir = self::cleanDir(SessionStorage::get(self::$sessionKey));			} catch (Exception $e) {				self::$currentDir = self::cleanDir(self::$startDir);			}			$allowActions = isset($_POST['allowActions']) ? $_POST['allowActions'] : 0;			echo self::renderTemplate('fm' . ds . 'fm-content.tpl', Array(				'entries' => self::readDirData(self::$currentDir),				'currentDir' => self::getCurrentDir(),				'startDir' => self::$startDir,				'allowActions' => $allowActions,			), true);		}				public static function createFolder($request, $vars = Array()) {			$folderName = $_POST['folder_name'];			if ($folderName) {				try {					self::$currentDir = self::cleanDir(SessionStorage::get(self::$sessionKey));				} catch (Exception $e) {					self::$currentDir = self::cleanDir(self::$startDir);				}				mkdir(self::$currentDir . ds . $folderName, 0777);			}		}				public static function removeItem($request, $vars = Array()) {						$folderPath = $_POST['folder_path'];			if ($folderPath) {				try {					self::$currentDir = self::cleanDir(SessionStorage::get(self::$sessionKey));				} catch (Exception $e) {					self::$currentDir = self::cleanDir(self::$startDir);				}				if (is_file($folderPath)) unlink($folderPath);				else Utils::rmdir($folderPath);			}					}				private static function getFileName($path) {					}				public static function uploadFile($request, $vars = Array()) {			$fileName = Utils::getFileNameFromWindowsPath($vars['file_name']);			try {				self::$currentDir = self::cleanDir(SessionStorage::get(self::$sessionKey));			} catch (Exception $e) {				self::$currentDir = self::cleanDir(self::$startDir);			}			$file = Utils::fileupload(self::$currentDir, $fileName);            if($fileName == "competitionQuestions.csv") {                CompetitionQuestionsModel::excelImport();            }		}				private static function cleanDir($dir) {			$lastDir = substr(strrchr($dir, '/'), 1);			if ($lastDir == '..') {				$dirs = explode('/', $dir);				unset($dirs[count($dirs) - 1]);				unset($dirs[count($dirs) - 1]);				return join('/', $dirs);			} else return $dir;		}				private static function readDirData($dir) {			$index = 0;			$entries = Array();						if ($handle = opendir($dir)) {							self::$currentDir = $dir;							try {					SessionStorage::edit(self::$sessionKey, $dir);				} catch (Exception $e) {					SessionStorage::add(self::$sessionKey, self::$currentDir);				}								$classes = Array(					0 => 'fm-image',					1 => 'fm-file',				);				                while (false !== ($entry = readdir($handle))) { 					if ((($dir == self::$startDir) && ($entry == '..')) || ($entry == '.')) continue;					$entries[$index]['path'] = $dir . ds . $entry;					$entries[$index]['title'] = $entry;					if (!is_file($dir . ds . $entry)) {						$entries[$index]['type'] = 0;						$entries[$index]['is_image'] = 0;					}					else {						$entries[$index]['type'] = 1;						$entries[$index]['url'] = str_replace(self::$startDir, "", $dir);						if (in_array(Utils::getFileExtension($entry), Application::$settings['image_extensions'])) {							$entries[$index]['is_image'] = 1;							$entries[$index]['class'] = $classes[0];						}						else {							$entries[$index]['is_image'] = 0;							$entries[$index]['class'] = $classes[1];						}					}					$index++;                }            }			asort($entries);			return $entries;		}				public static function before($request, $vars = Array()) {			self::$startDir = Application::$settings['public_folder'];		}			}?>