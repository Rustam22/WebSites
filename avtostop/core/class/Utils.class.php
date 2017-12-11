<?php

	class Utils {
		
		public static function generatePassword($length, $symbols = Array()) {
			$symbols = count($symbols) ? $symbols : Array('a','b','c','d','e','f','g','h','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9','!','@','#','$','%','&','*');
			$max = count($symbols) - 1;
			$password = '';
			for ($i = 0; $i < $length; $i++) {
				$password .= $symbols[rand(0,$max)];
			}
			return $password;
		}
		
		public static function getImage($image, $width, $height, $filePath) {
			
			require_once Application::$fileRoot->libs->phpthumb->ThumbLib_inc_php;
			
			$fileName = Utils::getFileNameFromPath($image, '/');
			
			$fileExt = Utils::getFileExtension($fileName);
			if (!in_array($fileExt, Application::$settings['image_extensions'])) {
				return;
			}
			
			for ($j = 0; $j < 5; $j++) {
				$folder = substr($fileName, $j, 1);
				$filePath .= ds . $folder;
			}
			
			$image = $filePath . ds . $fileName;
			
			if (file_exists($image)) {
				
				$phpthumb = PhpThumbFactory::create($image);
				$phpthumb->resize($width, $height);
				$phpthumb->show();
				
			}
			
		}
		
		public static function qPost($url, $fields, $encoding = 'windows-1251', $headers = Array(), $cookies = "") {
			$fields_string = '';

			//url-ify the data for the POST
			foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
			rtrim($fields_string, '&');

			//open connection
			$ch = curl_init();

			//set the url, number of POST vars, POST data
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_COOKIE, $cookies);
			curl_setopt($ch, CURLOPT_POST, count($fields));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
			curl_setopt($ch, CURLOPT_ENCODING, 'windows-1251');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
			//execute post
			$result = curl_exec($ch);

			//close connection
			curl_close($ch);
			
			return $result;
		}
		
		public static function translitUrl($url) {
			$search  = array('ə', 'Ə', 'ö', 'Ö', 'ğ', 'Ğ', 'ü', 'Ü', 'ş', 'Ş', 'ç', 'Ç', 'ı', 'İ', '"', '”', '“', ' ');
			$replace = array('e', 'E', 'o', 'O', 'g', 'G', 'u', 'u', 'sh', 'SH', 'ch', 'CH', 'i', 'I', '-', '-', '-', '_');
			return str_replace($search, $replace, $url);
		}

		public static function toUpper($string, $b = false) {
			$string = strtoupper($string);
			if ($b) {
				$string = str_replace('I', 'İ', $string);
                                $string = str_replace('ə', 'Ə', $string);
			}
                        
			return $string;
		}
		
		public static function getFileExtension($string) {
			return strtolower(substr(strrchr($string, "."), 1));
		}
		
		public static function getAgeByBirthDay($birthDay) {
			return intval(date('Y-m-d') - $birthDay);
		}
		
		public static function pasteToTag($text, $value, $tagName) {
			$tagName = 'name';
			$pattern = '/\['.$tagName.'\]([a-zA-Zəöğçşüiı;&]+)\[\/'.$tagName.'\]/i';
			if (empty($value)) $value = '${1}';
			return preg_replace($pattern, $value, $text);
		}
		
		public static function getFileNameFromWindowsPath($string) {
			$fileName = substr(strrchr($string, "/"), 1);
			if ($fileName == "") {
				return $string;
			}
			else return $fileName;
		}
		
		public static function getFileNameFromPath($string, $sep = ds, $returnExtension = true) {
			$fileName = substr(strrchr($string, $sep), 1);
			if ($fileName == "") {
				return $string;
			}
			else {
				if (!$returnExtension) return self::getFileNameWithoutExt($fileName);
				return $fileName;
			}
		}
		
		public static function getFileNameWithoutExt($string) {
			return substr($string, 0, strrpos($string, "."));
		}
		
		public static function fileupload($dir, $fileName){
			$input = fopen("php://input", "r");
			$temp = tmpfile();
			$realSize = stream_copy_to_stream($input, $temp);
			fclose($input);
			
			if(!isset($_SERVER["CONTENT_LENGTH"]) || $realSize != (int)$_SERVER["CONTENT_LENGTH"]) return array('status'=>'err','msg'=>'The actual size of the file does not match the passed');
			if(is_dir($dir)) { 
				$file = $dir . ds . $fileName; 
			}
			$target = fopen($file, "w");
			
			fseek($temp, 0, SEEK_SET);
			stream_copy_to_stream($temp, $target);
			fclose($target);
			return $file;
		}
		
		public static function isImage($fileName) {
			if (in_array(strtolower(self::getFileExtension($fileName)), Application::$settings['image_extensions'])) return true;
			return false;
		}
		
		
		public static function rmdir($dir) {
			foreach(glob($dir . '/*') as $file) {
				if(is_dir($file)) self::rmdir($file);
				else unlink($file);
			}
			rmdir($dir);
		}
		
		/*
		mails - format:
			0 => address,
			1 => address Name
		*/
		public static function sendMail($mails, $subject, $body, $from, $fromName, $cc=false) {
			require_once Application::$settings['libs_folder'] . ds . 'phpmailer' . ds . 'class.phpmailer.php';
			
			$host = Application::$settings['smtp']['host'];
			$username = Application::$settings['smtp']['user'];
			$password = Application::$settings['smtp']['password'];

			if($host=="" || count($mails)<1)
				return;

			$mailer = new PHPMailer();
			$mailer->From = $from;
			$mailer->FromName = $fromName;
			$mailer->Host = $host;
			$mailer->Mailer	= "smtp";
			$mailer->Subject = $subject;
			$mailer->Body = $body;
			if($username != "") {
				$mailer->SMTPAuth = true;
				$mailer->Username = $username;
				$mailer->Password = $password;
			}
			$mailer->ClearAddresses();
			$mailer->ClearCCs();
			for($i=0; $i<count($mails); $i++) {
				$to = $mails[$i][0];
				$to_name = $mails[$i][1];
				$mailer->AddAddress($to, $to_name);
			}
			if($cc) $mailer->AddCC($cc,'none');
			return array('sended'=>$mailer->Send(),'error'=>$mailer->ErrorInfo);
		}
		
		public static function parseWords($string, $count) {
			$out = "";
			$string = strip_tags($string);
			$words = explode(" ", $string);
			$i = 0;
			foreach ($words as $w) {
				$out .= $w . ' ';
				$i++;
				if ($i > 25) break;
			}
			return $out;
		}
		
		public static function cutToShort($string, $count) {
			$out = "";
			$string = strip_tags($string);
			$words = explode(" ", $string);
			$i = 0;
			foreach ($words as $w) {
				$out .= $w . ' ';
				$i++;
				if ($i > $count) break;
			}
			return $out;
		}
		
		public static function markWords($text, $key) {
			$text = strip_tags($text);
			$before = self::cutToShort(stristr($text, $key, true), 10);
			$after = self::cutToShort(stristr($text, $key), 10);
			return $before . ' ' . $after;
		}
		
		public static function generatePaginator($count, $limit, $page) {
			$pagesCount = ceil($count / $limit);
			$paginator = Array();
			$i = 0;
			$paginator[$i] = Array(
				'key' => $page - 1,
				'title' => '&laquo;&laquo;',
			);
			if ($page == 0) $paginator[$i]['inactive'] = '1';
			
			$l = $limit;
			$p = intval($l / 2);
			$left = ($page - $p >= 0) ? $p : $page;
			$right = (($l - $left) + $page < $pagesCount) ? $l - $left : $pagesCount - $page;
			
			
			while ($left > 0) {
				$paginator[] = Array(
					'key' => $page - $left,
					'title' => ($page - $left) + 1,
				);
				$left--;
			}
			
			$i = 0;
			while (($i <= $right) && ($page + $i < $pagesCount)) {
				$paginator[] = Array(
					'key' => $page + $i,
					'title' => ($page + $i) + 1,
				);
				$i++;
			}
			
			$paginator[] = Array(
				'key' => $page + 1,
				'title' => '&raquo;&raquo;',
			);
			if (!($page < ($pagesCount - 1))) $paginator[$i]['inactive'] = '1';
			
			return $paginator;
		}
		
		// parse get query like ?a=b&c=20
		public static function parseGet($s) {
			
			$s = substr($s, 1, (strlen($s) - 1));
			
			$d = explode('&', $s);
			
			$out = Array();
			
			$c = count($d);
			for ($i = 0; $i < $c; $i++) {
				$_tmp = explode('=', $d[$i]);
				if (strpos($_tmp[0], '[]')) {
					$_tmpKey = str_replace('[]', '', $_tmp[0]);
					if (!isset($out[$_tmpKey])) {
						$out[$_tmpKey] = Array();
					}
					$out[$_tmpKey][] = $_tmp[1];
				} else {
					$out[$_tmp[0]] = $_tmp[1];
				}
			}
			
			return $out;
			
		}
		
		public static function redirect($url) {
			header("Location: " . $url);
		}
	}

?>