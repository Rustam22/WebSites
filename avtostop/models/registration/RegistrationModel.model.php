<?php

    class RegistrationModel extends CRUDModel {

        public $name;
        public $surname;
        public $email;
        public $mobile;
        public $date;
        public $active;
        public $image;

        public static $perPage=10;
        public static $order = array('date', 'desc');
        public static $tplViewFile;

        public function __construct() {
            $messages = Application::$messages['model_feedback'];
            $commonMessages = Application::$messages['common_messages'];

            $this->image = new ModelFMImageField("image", "Şəkil", false, false);
            $this->name = new ModelTextField("name", "Adı", true, true);
            $this->surname = new ModelTextField("surname", "Soyadı", true, true);
            $this->email = new ModelTextField("email", "E-mail", false, true);
            $this->mobile = new ModelTextField("mobile", "Mobil", false, false);
            $this->image = new ModelFMImageField("image", "Şəkil", false, false);

            $this->date = new ModelDateField("date", "Tarix", true, true);
            $this->date->common = true;

            $this->active = new ModelSelectField("active", "Aktivləşmə", Array(
                0 => "passiv",
                1 => "activ"
            ), true, true);

        }

        public static function initialize() {
            self::$displayFields = Array('name', 'surname', 'email', 'mobile', 'date', 'active');
            self::$title = "Qeydiyyat";
            self::$iconPath = 'feedback-icon.png';
            self::$multiLang = false;
            self::$viewUrl = 'register';
        }


        public static function addNewUser($name, $surname, $email, $mobile, $date, $password, $hash, $image) {
            $sql = "INSERT INTO `".RegistrationModel::getTableName()."`
                    (`name`, `surname`, `email`, `mobile`, `date`, `password`, `hash`, `image`)
                    VALUES('".$name."', '".$surname."', '".$email."', '".$mobile."', '".$date."', '".$password."', '".$hash."', '".$image."')";

            $row = self::query($sql);
            return $row;
        }

        public static function updateUserFields($id, $name, $surname, $email, $mobile) {
            $sql = "UPDATE `".RegistrationModel::getTableName()."` SET
                    `name` = '".$name."', `surname` = '".$surname."', `email` = '".$email."', `mobile` = '".$mobile."'
                    WHERE `id` = '".$id."'";
            $result = self::$mysqli->query($sql);
            return $sql;
        }

        public static function checkFields($column_name, $value) {
            $array = array();
            $count = 0;
            $sql = "SELECT `".$column_name."` FROM `".RegistrationModel::getTableName()."` WHERE `".$column_name."` = '".$value."' ";
            $result = self::$mysqli->query($sql);

            while($row = $result->fetch_assoc()) {
                $array[$count] = $row;
                $count++;
            }
            if(isset($array[0][$column_name])) return true;
            else return false;
        }

        public static function isActiveUser($email) {
            $array = array();
            $count = 0;
            $sql = "SELECT `active` FROM `".RegistrationModel::getTableName()."` WHERE `email` = '".$email."' ";
            $result = self::$mysqli->query($sql);

            while($row = $result->fetch_assoc()) {
                $array[$count] = $row;
                $count++;
            }
            if(isset($array[0]['active'])) return ($array[0]['active'] == 1 ? true : false);
        }

        public static function getAllFieldsUser($password, $email) {
            $array = array();
            $count = 0;
            $sql = "SELECT `name`,`surname`,`email`,`active`,`date`, `image`, `id` FROM `".RegistrationModel::getTableName()."`
                    WHERE `password` = '".$password."' AND `email` = '".$email."'";
            $result = self::$mysqli->query($sql);

            while($row = $result->fetch_assoc()) {
                $array[$count] = $row;
                $count++;
            }
            return $array[0];
        }
		
        public static function setGeneratedHash($key, $email) {
            $count = 0;
            $sql = "SELECT * FROM `".RegistrationModel::getTableName()."` WHERE `email` = '".$email."' ";
            $result = self::$mysqli->query($sql);

            while($row = $result->fetch_assoc()) {$count++;}

            if($count > 0) {
                $sql = "UPDATE `".RegistrationModel::getTableName()."` SET `hash` = '".$key."' WHERE `email` = '".$email."' ";
                $result = self::$mysqli->query($sql);
                    return 1;
            } else {
                return 0;
            }
        }
        
        public static function setNewPassword($key, $password, $new_key) {
            $count = 0;
            $sql = "SELECT * FROM `".RegistrationModel::getTableName()."` WHERE `hash` = '".$key."' ";
            $result = self::$mysqli->query($sql);

            $result_1 = $result = self::fQuery($sql);
            $result_1 = $result_1[0];
            $result_2 = LogModel::insertLogEvent('Site User', $result_1['name'], $result_1['email'], $result_1['mobile'], 'Parolın Bərpası', '');

            while($row = $result->fetch_assoc()) {$count++;}
            
            if($count > 0) {
                $sql = "UPDATE `".RegistrationModel::getTableName()."` SET `hash`='".$new_key."',`password`='".$password."' WHERE `hash`='".$key."'";
                $result = self::$mysqli->query($sql);
                return true;
            }
            else return false;
        }

        public static function  test() {
            $sql = "SELECT * FROM `".RegistrationModel::getTableName()."` WHERE `hash` = '9e07c02f29ede8a4cff4405914da3ff2' ";
            $result = self::fQuery($sql);
            return $result[0];
        }

		public static function userActivate($name, $surname, $email, $mobile, $password) {
            $result_1 = LogModel::insertLogEvent('Site User', $name, $email, $mobile, 'Registrasiyada Aktivləşmə', '');
		    $sql = "UPDATE `".RegistrationModel::getTableName()."` SET `active` = '1' WHERE `name` = '".$name."' AND `surname` = '".$surname."' 
			        AND `email` = '".$email."' AND `mobile` = '".$mobile."' AND `password` = '".$password."' ";
			$result = self::$mysqli->query($sql);
		}
        public static function userActivateByUserId($userId) {
            //$result_1 = LogModel::insertLogEvent('Site User', $name, $email, $mobile, 'Registrasiyada Aktivləşmə', '');
            $sql = "UPDATE `".RegistrationModel::getTableName()."` SET `active` = '1' WHERE `id` = '".$userId."'";
            $result = self::$mysqli->query($sql);
        }

        public static function userActivateOP($id) {
            $sql = "SELECT * FROM `".RegistrationModel::getTableName()."` WHERE `id` = '".$id."'";
            $result_1 = self::fQuery($sql);
            $result_1 = $result_1[0];
            $result_2 = LogModel::insertLogEvent('Site User', $result_1['name'], $result_1['email'], $result_1['mobile'], 'Təkrar Aktivləşmə', '');
            $sql = "UPDATE `".RegistrationModel::getTableName()."` SET `active` = '1' WHERE `id` = '".$id."'";
            $result = self::$mysqli->query($sql);
        }

        public static function EmailDistinct($email) {
            $sql = "SELECT COUNT(`id`) FROM `".RegistrationModel::getTableName()."` WHERE `email` LIKE '%".$email."%'";
            $result = self::fQuery($sql);
            return $result;
        }
        public static function MobileDistinct($mobile) {
            $sql = "SELECT COUNT(`id`) FROM `".RegistrationModel::getTableName()."` WHERE `mobile` LIKE '%".$mobile."%'";
            $result = self::fQuery($sql);
            return $result;
        }
        public static function EmailDistinctOP($email, $id) {
            $sql = "SELECT COUNT(`id`) FROM `".RegistrationModel::getTableName()."` WHERE `email` LIKE '%".$email."%' AND `id` != '".$id."'";
            $result = self::fQuery($sql);
            return $result;
        }
        public static function MobileDistinctOP($mobile, $id) {
            $sql = "SELECT COUNT(`id`) FROM `".RegistrationModel::getTableName()."` WHERE `mobile` LIKE '%".$mobile."%' AND `id` != '".$id."'";
            $result = self::fQuery($sql);
            return $result;
        }
		
		public static function subscription($mobile, $bool) {
		    $sql = "";
		    if($bool == 'charged') {
			    $sql = "UPDATE `".RegistrationModel::getTableName()."` SET `active` = '1' WHERE `mobile` = '".$mobile."'";
			} elseif($bool == 'uncharged') {
			    $sql = "UPDATE `".RegistrationModel::getTableName()."` SET `active` = '0' WHERE `mobile` = '".$mobile."'";
			}
            $sql_1 = "SELECT * FROM `".RegistrationModel::getTableName()."` WHERE `mobile` = '".$mobile."'";
            $result_1 = self::fQuery($sql_1);
            $result_1 = $result_1[0];
            $result_2 = LogModel::insertLogEvent('Lsim', $result_1['name'], $result_1['email'], $result_1['mobile'], $bool , '');
			$result = self::$mysqli->query($sql);
			
			return $result;
		}

        public static function getAllRegData($email, $phone) {
            $sql = "SELECT * FROM `".RegistrationModel::getTableName()."`
                    WHERE `email` LIKE '%".$email."%' AND `mobile` LIKE '%".$phone."%' ";
            $result = self::fQuery($sql);

            return $result;
        }

        //Competition Events
        public static function getUserDataByUserId($userId) {
            $sql = "SELECT id, image, name, surname, email, mobile FROM `".RegistrationModel::getTableName()."` WHERE `id` = '".$userId."' ";
            $result = self::fQuery($sql);
            return $result;
        }
        public static function getUserDataByUserEmail($email_value) {
            $sql = "SELECT id, name, surname, email, mobile FROM `".RegistrationModel::getTableName()."` WHERE `email` = '".$email_value."' ";
            $result = self::fQuery($sql);
            return $result[0];
        }



        //GoldenPay Funtions
        public static function getIdByEmailAndMobile($email, $mobile) {
            $sql = "SELECT `id` FROM `".RegistrationModel::getTableName()."` WHERE `email` = '".$email."' AND `mobile` = '".$mobile."' ";
            $result = self::fQuery($sql);
            return $result;
        }
    }
?>