<?php
	
    class ApplicationController extends Controller {

        private static $csrf_key;

		public static function before($request, $vars = Array()) {
        }
		
		public static function main($request, $vars = Array()) {
			$lang = Application::$storage['lang'];
			$context = Array();
			
			$context['csrf_token'] = Application::getCSRFKey();
			$context['csrf_key'] = Application::getCSRFKey();
            self::$csrf_key = $context['csrf_key'];

			$data = AvtoAdvicesModel::getListToView(0, 10);
			$context['advices'] = $data['d'];
			$data1 = AvtoAdvicesModel1::getListToView(0, 10);
			$context['advices1'] = $data1['d'];
			//echo "<pre>";
			//print_r($data1['d']);
			//echo "</pre>";
			$context['faq_tree'] = FaqModel::getTreeItems(Application::$storage['lang']);
			$context['faq_items'] = FaqModel::getItems(Application::$storage['lang']);
			$context['iframe'] = TvLiveModel::getLastiFrame();
			$context['iframe'] = $context['iframe'][0]['iframe'];
			
			self::renderTemplate('main' . ds . 'main.tpl', $context);
        }

        public static function sendQuestionWithFiles($request, $vars) {
            $links = '';
            $email = "";

            if(strlen($_COOKIE['context']['email']) == 0) {
                $email = $_SESSION['context']['email'];
                foreach($_FILES as $key => $value) {
                    $info = new SplFileInfo($_FILES[$key]['name']);
                    $fileName = $_FILES[$key]['name'] = time().'.'.$info->getExtension();
                    $upload_dir = Application::$settings['public_folder'] . "/sendQuestionFiles/" . $fileName;
                    move_uploaded_file($_FILES[$key]["tmp_name"], $upload_dir);
                    $links .= '<a target="_blank" href="'.Application::$settings['url'].'/public/sendQuestionFiles/'.$fileName.'" >'.$fileName.'</a><br>';
                }
            } elseif(strlen($_COOKIE['context']['email']) > 3) {
                $email = $_COOKIE['context']['email'];
                foreach($_FILES as $key => $value) {
                    $info = new SplFileInfo($_FILES[$key]['name']);
                    $fileName = $_FILES[$key]['name'] = time().'.'.$info->getExtension();
                    $upload_dir = Application::$settings['public_folder'] . "/sendQuestionFiles/" . $fileName;
                    move_uploaded_file($_FILES[$key]["tmp_name"], $upload_dir);
                    $links .= '<a target="_blank" href="'.Application::$settings['url'].'/public/sendQuestionFiles/'.$fileName.'" >'.$fileName.'</a><br>';
                }
            }

            //print_r(Application::$settings['url']);
            QuestionsModel::assignFilesLinks($email, $links);
        }

        public static function addComplaint($request, $vars) {
            $context = Array();
            $context['csrf_key'] = self::$csrf_key;

            //data
            $formData = ComplaintForm::getValues();
            $context = $formData;
			
            //echo "<pre>"; print_r($context); echo "</pre>";
			
            //file settings
            $uploadFolder = Application::$settings['public_folder']."/complaintImages/";
            $info = new SplFileInfo($_FILES['file']['name']);
            $fileName = $_FILES['file']['name'] = time().'.'.$info->getExtension();
            $uploadFolder = $uploadFolder . $fileName;


            if ($formData['success']) {
                if((int)$_FILES['file']['size'] <= 3000000) {
                    if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadFolder) == true) {
                        $context['upload'] = 1;
						
                    } else {
                        $context['upload'] = 0;
                        $context['errors'] = $formData['errors'];
                    }
                } else {
                     $context['upload'] = 0;
                     $context['errors'] = $formData['errors'];
                }
				//Send To Mail
                        $uploadingFileUrl = Application::$settings['url'].'/public/complaintImages/'.$fileName;

                        $message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
                                    <html>
                                        <head>
                                            <title>DYP-dən onlayn şikayət</title>
                                            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
                                        </head>
                                        <body>
                                            <table style="width: 100%;" border="0" cellpadding="0" cellspacing="0">
                                               <tr>
                                                  <td>Ad, Soyad</td>
                                                  <td>'.$formData['data']['full_name'].'</td>
                                               </tr>
                                               <tr>
                                                  <td>Email</td>
                                                  <td>'.$formData['data']['new_mail'].'</td>
                                               </tr>
                                               <tr>
                                                  <td>Mobil</td>
                                                  <td>'.$formData['data']['mobile'].'</td>
                                               </tr>
                                               <tr>
                                                  <td>Mövzu</td>
                                                  <td>'.$formData['data']['complaint_text'].'</td>
                                               </tr>
                                               <tr>
                                                  <td>Fayl</td>
                                                  <td><a href="'.$uploadingFileUrl.'" target="_blank">'.$fileName.'</a></td>
                                               </tr>
                                            </table>
                                        </body>
                                    </html>';										
						
                        $mails1 = 'rustam.atakisiev@gmail.com';
                        $mails2 = 'ilkin.zeynalov@meqa.az';
                        $mails3 = 'ilkin.zeynalov@gmail.com';
                        $from = "Avtostop";
                        $subject = 'DYP-dən onlayn şikayət';
                        $from_mail = "sender@site.com";          
						$headers = 'MIME-Version: 1.0\r\n'.
								   'From: '.$from_mail.'' . "\r\n" .
								   'Reply-To: '.$from_mail.'' . "\r\n" .
								   'Content-type: text/html; charset=utf-8' . "\r\n";
								   'X-Mailer: PHP/' . phpversion(); 
                        
						mail("rustam.atakisiev@gmail.com", $subject, $message, $headers);
						/*mail("info@dyp.gov.az", $subject, $message, $headers);
						mail("isadeystani@mail.ru", $subject, $message, $headers);
						mail("info@bakupolice.gov.az", $subject, $message, $headers);
						mail("ilkin.zeynalov@meqa.az", $subject, $message, $headers);*/
            } else {
                $context['errors'] = $formData['errors'];
            }

            //echo "<pre>"; print_r($context); echo "</pre>";
            self::renderTemplate('base.tpl', $context);
        }

		private static function getItemsForMap($lang, $country) {
			
			$packages = AdvertisementPackageModel::getAdvOnMapTR();
			
			$tables = Array();
			
			$__id = 0;
			for ($i = 0, $c = count($packages); $i < $c; $i++) {
				if ($__id != $packages[$i]['table_id']) {
					$__id = $packages[$i]['table_id'];
					$tables[$packages[$i]['table_id']][] = $packages[$i]['record_id'];
				} else {
					$tables[$__id][] = $packages[$i]['record_id'];
				}
			}
			
			$markers = Array();
			
			foreach ($tables as $k => $v) {
				$table = AdvertisementStructureModel::getTable($k);
				if ($table === false) continue;
				
				$adv = AdvertisementsModel::getAdvForMap($table['table_name'], $v, $country);
				
				for ($j = 0, $jC = count($adv); $j < $jC; $j++) {
					try {
						if (isset($adv[$j]['map'])) {
							$adv[$j]['map'] = substr($adv[$j]['map'], 1, strlen($adv[$j]['map']) - 2);
							$adv[$j]['map'] = explode(',', $adv[$j]['map']);
							$adv[$j]['map'] = $adv[$j]['map'];
							$markers[] = Array(
								'title' => $adv[$j]['title'],
								'description' => $adv[$j]['description'],
								'map' => $adv[$j]['map'],
								'table_id' => $table['id'],
								'record_id' => $adv[$j]['id']
							);
						} else continue;
					} catch (Exception $e) {
						continue;
					}
				}
				
			}
			
			return $markers;
			
		}
		
		private static function getData($country) {
			$fields_string = '';
			$url = 'http://vk.com/select_ajax.php';
			$fields = array(
									'act' => urlencode('a_get_country_info'),
									'country' => urlencode($country),
									'fields' => urlencode(1),
							);

			//url-ify the data for the POST
			foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
			rtrim($fields_string, '&');

			//open connection
			$ch = curl_init();

			
			
			//set the url, number of POST vars, POST data
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_HTTPHEADER,array(
				'Accept-Language: ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3',
				'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
				'Content-Type: application/x-www-form-urlencoded; charset=windows-1251',
				'Accept-Encoding: gzip, deflate'
			));
			curl_setopt($ch, CURLOPT_COOKIE, "remixdt=3600; remixmid=; remixsid6=; remixgid=; remixemail=; remixpass=; remixpermit=; remixsslsid=; remixlang=0; remixreg_sid=; remixapi_sid=; remixrec_sid=; remixsid=d1d5bed8e77ee9bed5a12fdee308fefaa049a443aa27c62c17898; remixflash=11.8.800; remixscreen_depth=32; remixlang=0; remixreg_sid=; remixapi_sid=; remixsid=a29597faa9c8c1dd8353aad0f17fb43bd3b3aab678227d74a2131; remixflash=11.8.800; remixscreen_depth=24; remixseenads=2");
			curl_setopt($ch, CURLOPT_POST, count($fields));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
			curl_setopt($ch, CURLOPT_ENCODING, 'windows-1251');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
			//execute post
			$result = curl_exec($ch);

			//close connection
			curl_close($ch);
			
			$j = iconv("Windows-1251","UTF-8",$result);
			
			return json_decode($j);
		}
		
		public static function fetch($r, $v) {
			self::renderTemplate('fetch.tpl', Array());
		}
		
		public static function add($r, $v) { //return;
			
			$country = $v['country_id'];
			$title = $_POST['title'];
			$lang = $_POST['lang'];
			
			self::addItem(0, $country, $title, $lang, 0);
			
			$d = self::getData($country);
			
			for ($i = 0; $i < count($d->cities); $i++) {
				self::addItem($country, 0, $d->cities[$i][1], $lang, $d->cities[$i][0]);
			}
			
		}
		
		private static function addItem($parent, $country, $title, $lang, $identity) {
			
			$title = str_replace('<b>', '', $title);
			$title = str_replace('</b>', '', $title);
			$title = html_entity_decode(html_entity_decode($title, ENT_QUOTES, 'utf-8'), ENT_QUOTES, 'utf-8');
			BaseModel::query(" INSERT INTO `vl1_CountriesModel` (`parent`, `country`, `title`, `lang`, `identity`) VALUES ('{#1}', '{#2}', '{#3}', '{#4}', '{#5}') ", Array($parent, $country, $title, $lang, $identity));
			
		}

        public static function pageNotFound($r, $v) {
            self::renderTemplate('404' . ds . '404.tpl', Array(
				//'csrf_token' => Application::getCSRFKey()
			));
			die('404');
        }
    }
?>