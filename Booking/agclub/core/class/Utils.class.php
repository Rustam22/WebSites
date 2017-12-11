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
		
		public static function generateToken() {
			return md5(self::generatePassword(5));
		}

		public static function toUpper($string, $b = false) {
			$string = strtoupper($string);
			if ($b) {
				$string = str_replace('I', 'İ', $string);
			}
			return $string;
		}
		
		public static function getFileExtension($string) {
			return substr(strrchr($string, "."), 1);
		}
		
		public static function getAgeByBirthDay($birthDay) {
			return intval(date('Y-m-d') - $birthDay);
		}
		
		public static function pasteToTag($text, $value, $tagName) {
			$tagName = 'name';
			
			$pattern = '/\['.$tagName.'\]([a-zA-Zəöğçşüiı;&]+)\[\/'.$tagName.'\]/i';
			if (empty($value)) $value = '<span class="ibanner-reg-text ibanner-reg" >${1}</span>';
			return preg_replace($pattern, $value, $text);
		}
		
		public static function getFileNameFromWindowsPath($string) {
			$fileName = substr(strrchr($string, "/"), 1);
			if ($fileName == "") {
				return $string;
			}
			else return $fileName;
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
			if (in_array(self::getFileExtension($fileName), Application::$settings['image_extensions'])) return true;
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
			$mailer->SetLanguage("ru", app_root . ds . 'libs' . ds . 'phpmailer' . ds . 'language/');
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
			$b = array('sended'=>$mailer->Send(),'error'=>$mailer->ErrorInfo);
			
			return $b;
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
	}

?>