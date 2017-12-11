<?php

    class LogModel extends CRUDModel {

        public $side;
        public $name;
        public $email;
        public $mobile;
        public $eventType;
        public $date;
        public $adminUser;

        public static $perPage = 150;
        public static $order = array('date', 'desc');
        public static $tplViewFile;

        public function __construct() {
            $messages = Application::$messages['model_feedback'];
            $commonMessages = Application::$messages['common_messages'];

            $this->side = new ModelTextField("side", "Tərəf", true, true);
            $this->name = new ModelTextField("name", "Adı", true, true);
            $this->email = new ModelTextField("email", "E-mail", false, true);
            $this->mobile = new ModelTextField("mobile", "Mobil", false, false);
            $this->eventType = new ModelTextField("eventType", "Əməliyyat Növü", false, false);
            $this->date = new ModelDateField("date", "Tarix", true, true);
            $this->date->common = true;
            $this->adminUser = new ModelTextField("adminUser", "Admin(adı və email)", false, false);
        }

        public static function initialize() {
            self::$displayFields = Array('side', 'name', 'email', 'mobile', 'eventType', 'date', 'adminUser');
            self::$title = "Loglar";
            self::$iconPath = 'target.png';
            self::$multiLang = false;
            self::$viewUrl = 'register';
        }

        function get_timezone_offset($remote_tz, $origin_tz = null) {
            if($origin_tz === null) {
                if(!is_string($origin_tz = date_default_timezone_get())) {
                    return false; // A UTC timestamp was returned -- bail out!
                }
            }
            $origin_dtz = new DateTimeZone($origin_tz);
            $remote_dtz = new DateTimeZone($remote_tz);
            $origin_dt = new DateTime("now", $origin_dtz);
            $remote_dt = new DateTime("now", $remote_dtz);
            $offset = $origin_dtz->getOffset($origin_dt) - $remote_dtz->getOffset($remote_dt);
            return $offset;
        }


        public static function insertLogEvent($side, $name, $email, $mobile, $eventType, $adminUser) {
            $date = date("Y-m-d H:i:s");
            $sql = "INSERT INTO ".LogModel::getTableName()."(`side`, `name`, `email`, `mobile`, `eventType`, `date`, `adminUser`) VALUES('".$side."', '".$name."', '".$email."', '".$mobile."', '".$eventType."', '".$date."', '".$adminUser."')";
            $result = self::$mysqli->query($sql);
            return $result;
        }

        public static function getAllLogData($email, $phone, $date1, $date2, $side, $status) {
            if($status == "false") {
                $sql = "SELECT * FROM `".LogModel::getTableName()."` WHERE `email` LIKE '%".$email."%' AND `mobile` LIKE '%".$phone."%' AND `side` LIKE '%".$side."%'";
            } elseif($status == "true") {
                $sql = "SELECT * FROM `".LogModel::getTableName()."` WHERE `email` LIKE '%".$email."%' AND `mobile` LIKE '%".$phone."%' AND `side` LIKE '%".$side."%' AND `date` >= '".$date1."' AND `date` <= '".$date2."'";
            }

            $result = self::fQuery($sql);
            return $result;
        }

    }
?>