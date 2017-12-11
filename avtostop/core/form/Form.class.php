<?php
    
    define("FORM_VALIDATION_NUMERIC",1);
    define("FORM_VALIDATION_EMAIL",2);
    define("FORM_VALIDATION_STRING",3);
    define("FORM_VALIDATION_DATE",4);
    
	require_once 'FormField.class.php';
	require_once 'FormTextField.class.php';
	require_once 'FormCityField.class.php';
	require_once 'FormTextArea.class.php';
	require_once 'FormPasswordField.class.php';
	require_once 'FormDateField.class.php';
	require_once 'FormRadioField.class.php';
	require_once 'FormSelectField.class.php';
	require_once 'FormCheckBoxField.class.php';
	require_once 'FormFileField.class.php';
	require_once 'FormImageField.class.php';
	
    class Form {
        
		public static $hasCaptcha = false;
		public static $enableCSRFSecurity = true;
		
        public static function getValues() {
			$class = get_called_class();
			$csrfKeyName = 'csrf_key';
            $data = Array();
            $data["success"] = true;
            $data["data"] = Array();
            $data["errors"] = Array();
			// check csrf
			if ($class::$enableCSRFSecurity) {
				
				if (!(isset($_POST[$csrfKeyName]) && isset($_SESSION[$csrfKeyName]) && ($_POST[$csrfKeyName] == $_SESSION[$csrfKeyName]))) {
					$data["errors"][] = $csrfKeyName;
				}
			}
			
			if ($class::$hasCaptcha) {
				$captchaKey = 'captcha_code';
				if (!self::captchaAuthentification($captchaKey)) $data["errors"][] = $captchaKey;
			}
			
            $classInfo = self::getClassInfo();
            $f = new $classInfo["className"];
            $count = count($classInfo["classVars"]);
            for($i = 0; $i < $count; $i++) {
                $valid = $f->$classInfo["classVars"][$i]->getFromPost();
                if ($valid !== false) {
                    $data["data"][$classInfo["classVars"][$i]] = $valid;
                } else $data["errors"][] = $classInfo["classVars"][$i];
            }
            $data["success"] = count($data["errors"]) ? false : true;
            return $data;
        }
		
		public static function getFormView(&$smarty, $values = Array()) {
			$classInfo = self::getClassInfo();
			$tmpObject = new $classInfo['className'];
			$out = "";
			foreach ($classInfo['classVars'] as $p) {
				if (isset($values[$p])) $tmpObject->$p->value = $values[$p];
				$out .= $tmpObject->$p->getView($smarty);
				if ($tmpObject->$p->clearAfter) {
					$out .= '<div class="clear"></div>';
				}
			}
			return $out;
		}
		
		public static function getReadOnlyView(&$smarty, $values = Array()) {
			$classInfo = self::getClassInfo();
			$tmpObject = new $classInfo['className'];
			$out = "";
			foreach ($classInfo['classVars'] as $p) {
				if (isset($values[$p])) $tmpObject->$p->value = $values[$p];
				$out .= $tmpObject->$p->readOnlyView($smarty);
				if ($tmpObject->$p->clearAfter) {
					$out .= '<div class="clear"></div>';
				}
			}
			return $out;
		}
        
		private static function captchaAuthentification($key) {
			if (isset($_POST[$key]) && isset($_SESSION[$key]) && $_SESSION[$key] == $_POST[$key]) return true;
			else return false;
		}
		
        protected static function getClassInfo() {
            $classInfo = Array();
            $classVars = Array();
            $class = get_called_class();
            $reflect = new ReflectionClass($class);
            $props = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
            foreach ($props as $p) {
                if (!$p->isStatic()) {
                    $classVars[] = $p->getName();
                }
            }
            return Array("className" => $class, "classVars" => $classVars);
        }
    }
    
?>