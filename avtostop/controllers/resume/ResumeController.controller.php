<?php

	class ResumeController extends Controller {
		
		public static function add($r, $v) {
		
			if (!AuthController::isLoggedIn()) ApplicationController::pageNotFound($r, $v);
		
			$userId = $_SESSION['user_id'];
			
			if (ResumeModel::resumeExists($userId)) ApplicationController::pageNotFound($r, $v);
		
			if (isset($_POST['add_resume'])) {
				
				if (!AuthController::isLoggedIn()) ApplicationController::pageNotFound($r, $v);
				
				$info = ResumeInfoForm::getValues();
				
				$mainForm = ResumeMainForm::getValues();
				
				$contactForm = ResumeContactForm::getValues();
				
				$files = self::uploadFiles();
				
				$lastWorks = self::getLastWork();
				
				if ($info['success'] && $mainForm['success'] && $contactForm['success']) {
					
					BaseModel::startTransaction();
					
					$title = $mainForm['data']['profession'] . ' - ' . $mainForm['data']['salary'] . ' ' . Application::$settings['currency'][$mainForm['data']['salaryCurrency']];
					$context = Array();
					$context['fields'] = Array();
					$context['fields'][] = Array(
						'title' => Application::$m['resume_main']['educationMore'],
						'value' => $mainForm['data']['educationMore']
					);
					$context['fields'][] = Array(
						'title' => Application::$m['resume_main']['workTimeMore'],
						'value' => $mainForm['data']['workTimeMore']
					);
					$context['fields'][] = Array(
						'title' => Application::$m['resume_main']['computerKnowledges'],
						'value' => $mainForm['data']['computerKnowledges']
					);
					$description = self::renderTemplate('resume' . ds . 'description.tpl', $context, true);
					
					$d = Array(
						'title' => $title,
						'description' => $description,
						'userId' => $userId,
						'cityId' => $_SESSION['cityId'],
						'countryId' => $_SESSION['countryId'],
						'categoryId' => $mainForm['data']['profArea'],
						'date' => date('Y-m-d'),
						'date_microtime' => time(),
						'active' => 1
					);
					
					ResumeModel::addResume($d);
					
					ResumeInfoModel::addInfo($userId, $info);
					ResumeMainModel::addMainResume($userId, $mainForm);
					ResumeContactModel::addContactResume($userId, $contactForm);
					
					if (count($lastWorks)) ResumeLastWorkModel::addWorks($userId, $lastWorks);
					
					if (count($files)) ResumeFilesModel::addFiles($userId, $files);
					
					if (BaseModel::commitTransaction()) {
						// all is ok
						Utils::redirect(Application::$settings['url'] . '/user' . $userId . '#resume');
					}
				} else {
					// echo error messages
					print_r($contactForm);
					print_r($mainForm);
					print_r($info);
				}
				
			}
		
			self::renderTemplate('resume' . ds . 'add.tpl', Array(
				'infoForm' => ResumeInfoForm::getFormView(self::$smarty),
				'contactForm' => ResumeContactForm::getFormView(self::$smarty),
				'mainForm' => ResumeMainForm::getFormView(self::$smarty),
				'csrf_token' => Application::getCSRFKey()
			));
		}
		
		public static function edit($r, $v) {
			
			if (!AuthController::isLoggedIn()) ApplicationController::pageNotFound($r, $v);
			
			$userId = $_SESSION['user_id'];
			
			if (!ResumeModel::resumeExists($userId)) {
				ApplicationController::pageNotFound($r, $v);
			}
			
			if (isset($_POST['save_resume'])) {
				
				$info = ResumeInfoForm::getValues();
				
				$mainForm = ResumeMainForm::getValues();
				
				$contactForm = ResumeContactForm::getValues();
				
				$files = self::uploadFiles();
				
				$lastWorks = self::getLastWork();
				
				if ($info['success'] && $mainForm['success'] && $contactForm['success']) {
					
					BaseModel::startTransaction();
					
					ResumeInfoModel::editInfo($userId, $info);
					ResumeMainModel::editMain($userId, $mainForm);
					ResumeContactModel::editContact($userId, $contactForm);
					
					if (count($lastWorks)) ResumeLastWorkModel::addWorks($userId, $lastWorks);
					
					if (count($files)) ResumeFilesModel::addFiles($userId, $files);
					
					$title = $mainForm['data']['profession'] . ' - ' . $mainForm['data']['salary'] . ' ' . Application::$settings['currency'][$mainForm['data']['salaryCurrency']];
					$context = Array();
					$context['fields'] = Array();
					$context['fields'][] = Array(
						'title' => Application::$m['resume_main']['educationMore'],
						'value' => $mainForm['data']['educationMore']
					);
					$context['fields'][] = Array(
						'title' => Application::$m['resume_main']['workTimeMore'],
						'value' => $mainForm['data']['workTimeMore']
					);
					$context['fields'][] = Array(
						'title' => Application::$m['resume_main']['computerKnowledges'],
						'value' => $mainForm['data']['computerKnowledges']
					);
					$description = self::renderTemplate('resume' . ds . 'description.tpl', $context, true);
					
					$d = Array(
						'title' => $title,
						'description' => $description,
						'userId' => $userId,
						'cityId' => $_SESSION['cityId'],
						'countryId' => $_SESSION['countryId'],
						'categoryId' => $mainForm['data']['profArea'],
						'date' => date('Y-m-d'),
						'date_microtime' => time()
					);
					
					ResumeModel::editResume($d);
					
					if (BaseModel::commitTransaction()) {
						// all is ok
						echo 'all is ok';
					}
				} else {
					// echo error messages
					print_r($contactForm);
					print_r($mainForm);
					print_r($info);
				}
				
			}
			
			$userId = $_SESSION['user_id'];
			
			$infoForm = ResumeInfoForm::getFormView(self::$smarty, ResumeInfoModel::getResumeInfo($userId));
			$mainForm = ResumeMainForm::getFormView(self::$smarty, ResumeMainModel::getResumeMain($userId));
			$contactForm = ResumeContactForm::getFormView(self::$smarty, ResumeContactModel::getResumeContact($userId));
			
			$files = ResumeFilesModel::getFiles($userId);
			
			$lastWorks = ResumeLastWorkModel::getLastWorks($userId);
			
			self::renderTemplate('resume' . ds . 'edit.tpl', Array(
				'infoForm' => $infoForm,
				'contactForm' => $contactForm,
				'mainForm' => $mainForm,
				'csrf_token' => Application::getCSRFKey(),
				'files' => $files,
				'lastWorks' => $lastWorks
			));
			
		}
		
		public static function viewResume($r, $v) {
			
			if (!AuthController::isLoggedIn()) ApplicationController::pageNotFound($r, $v);
			
			$userId = $_SESSION['user_id'];
			
			$info = ResumeInfoModel::getResumeInfo($userId);
			$mainInfo = ResumeMainModel::getResumeMain($userId);
			$contactInfo = ResumeContactModel::getResumeContact($userId);
			
		}
		
		public static function removeLastWork($r, $v) {
			$id = $v['id'];
			$csrfKey = $_POST['csrf_key'];
			if ($csrfKey == $_SESSION['csrf_key']) {
				if (ResumeLastWorkModel::removeWork($id)) {
					echo json_encode(Array(
						'success' => true,
						'csrfKey' => Application::getCSRFKey()
					));
				} else self::jsonFalse();
			} else self::jsonFalse();
		}
		
		private static function jsonFalse() {
			echo json_encode(Array(
				'success' => false,
				'csrfKey' => Application::getCSRFKey()
			));
			die();
		}
		
		private static function checkLw($title, $i) {
			if ((isset($_POST[$title][$i])) && !empty($_POST[$title][$i])) {
				return $_POST[$title][$i];
			} else {
				throw new Exception();
			}
		}
		
		private static function getLastWork() {
			$result = Array();
			
			if (isset($_POST['lwCompany']) && (is_array($_POST['lwCompany'])) && count($_POST['lwCompany'])) {
				for ($i = 0, $c = count($_POST['lwCompany']); $i < $c; $i++) {
					try {
						
						$d = Array(
							'lwCompany' => self::checkLw('lwCompany', $i),
							'lwCountry' => self::checkLw('lwCountry', $i),
							'lwCity' => self::checkLw('lwCity', $i),
							'lwAddress' => self::checkLw('lwAddress', $i),
							'lwPhone' => self::checkLw('lwPhone', $i),
							'lwOrgSphere' => self::checkLw('lwOrgSphere', $i),
							'lwOrgProfession' => self::checkLw('lwOrgProfession', $i),
							'lwWorkStart' => self::checkLw('lwWorkStart', $i),
							'lwWorkEnd' => self::checkLw('lwWorkEnd', $i),
							'lwDismissal' => self::checkLw('lwDismissal', $i),
							'lwLastProf' => self::checkLw('lwLastProf', $i),
							'lwWorkResult' => self::checkLw('lwWorkResult', $i),
							'lwWorkResultMain' => self::checkLw('lwWorkResultMain', $i),
						);
						if (isset($_POST['lwId']) && isset($_POST['lwId'][$i])) {
							$d['id'] = intval($_POST['lwId'][$i]);
						}
						$result[] = $d;
						
					} catch (Exception $e) {
						continue;
					}
					
				}
			}
			return $result;
		}
		
		private static function uploadFiles() {
			$files = Array();
			
			if (isset($_FILES['files']) && is_array($_FILES['files']['name'])) {
				$c = count($_FILES['files']['name']);
				for ($i = 0; $i < $c; $i++) {
					if (($_FILES['files']['error'][$i] == 0) && ($_FILES['files']['size'][$i] <= 2000600)) {
						$ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
						if (in_array($ext, Application::$settings['resume_extensions'])) {
							if ($_FILES['files']['size'][$i] < 2000600) {
								$fileName = md5(microtime()) . '_' . $_FILES['files']['name'][$i];
								
								$filePath = Application::$settings['public_folder'] . ds . 'advertisement' . ds . 'resume';
								$additionalPath = '';
								for ($j = 0; $j < 5; $j++) {
									$folder = substr($fileName, $j, 1);
									$filePath .= ds . $folder;
									$additionalPath .= '/' . $folder;
									
									if (!file_exists($filePath)) {
										mkdir($filePath);
									}
								}
								$moveTo = $filePath . ds . $fileName;
								// can resize
								if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $moveTo)) {
									$files[] = $additionalPath . '/' . $fileName;
								}
							}
						}
					}
				}
			}
			return $files;
		}
		
	}

?>