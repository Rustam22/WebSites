<?php
	
    class ApplicationController extends Controller {
		
		public static function before($request, $vars = Array()) {
        }
		
		public static function main($request, $vars = Array()) {
			$lang = Application::$storage['lang'];
			$context = Array();
			
			$context['csrf_token'] = Application::getCSRFKey();
			
			$data = AvtoAdvicesModel::getListToView(0, 10);
			$context['advices'] = $data['d'];
			$data1 = AvtoAdvicesModel1::getListToView(0, 10);
			$context['advices1'] = $data1['d'];
			
			$context['faq_tree'] = FaqModel::getTreeItems(Application::$storage['lang']);
			$context['faq_items'] = FaqModel::getItems(Application::$storage['lang']);
			
			self::renderTemplate('main' . ds . 'main.tpl', $context);
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