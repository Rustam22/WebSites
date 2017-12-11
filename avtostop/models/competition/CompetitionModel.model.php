<?php

    class CompetitionModel extends CRUDModel {

        public $image;
        public $name;
        public $surname;
        public $email;
        public $mobile;
        public $competition_active;
        public $true_answers;
        public $false_answers;
        public $penalty_points;
        public $distance_traveled;
        public $car_brand;
        public $car_model;

        //public static $perPage=10;
       // public static $tplViewFile;

        public function __construct() {
            $messages = Application::$messages['model_feedback'];
            $commonMessages = Application::$messages['common_messages'];

            $this->image = new ModelFMImageField("image", "Şəkil", false, false);
            $this->name = new ModelTextField("name", "Adı", true, true);
            $this->surname = new ModelTextField("surname", "Soyadı", true, true);
            $this->email = new ModelTextField("email", "E-mail", false, true);
            $this->mobile = new ModelTextField("mobile", "Mobil", false, false);

            $this->competition_active = new ModelSelectField("competition_active", "Müsabiqədə", Array(
                0 => "yox",
                1 => "hə"
            ), true, true);

            $this->true_answers = new ModelTextField("true_answers", "Doğru cavab", false, false);
            $this->false_answers = new ModelTextField("false_answers", "Səhv cavab", false, false);
            $this->penalty_points = new ModelTextField("penalty_points", "Cərimə balları", false, false);
            $this->distance_traveled = new ModelTextField("distance_traveled", "Qət edilən məsafə", false, false);
            $this->car_brand = new ModelTextField("car_brand", "Avtomobilin markası", false, false);
            $this->car_model = new ModelTextField("car_model", "Avtomobilin modeli", false, false);
        }

        public static function initialize() {
            self::$displayFields = Array('image', 'name', 'surname', 'email', 'mobile', 'competition_active',
                                         'true_answers', 'false_answers', 'penalty_points', 'distance_traveled', 'car_brand', 'car_model');
            self::$title = "İştirakçılar";
            self::$iconPath = 'competition.png';
            self::$multiLang = false;
            self::$viewUrl = 'register';
        }


        //Competition Functions
        public static function getCompetitionUserCount() {
            $sql = "SELECT COUNT(`id`) FROM `".CompetitionModel::getTableName()."` WHERE `true_answers` >= '9'";
            $result = self::fQuery($sql);
            return $result[0]["COUNT(`id`)"];
        }
        public static function getRandomCompetitionQuestionsByLimit($limit) {
            $sql = "SELECT `id`, `question`, `var1`, `id_1`, `var2`, `id_2`
                    FROM `vl1_competitionquestionsmodel` ORDER BY RAND() LIMIT ".$limit."";
            $result = self::fQuery($sql);
            return $result;
        }
        public static function addNewCompetitionUser($relation_id, $image, $name, $surname, $email, $mobile) {
            $sql = "SELECT COUNT(`relation_id`) FROM `".CompetitionModel::getTableName()."` WHERE `relation_id` = '".$relation_id."'";
            $result = self::fQuery($sql);
            if($result[0]["COUNT(`relation_id`)"] == "0") {
                $sql = "INSERT INTO `".CompetitionModel::getTableName()."`
                        (`relation_id`, `image`, `name`, `surname`, `email`, `mobile`)
                        VALUES ('".$relation_id."', '".$image."', '".$name."', '".$surname."', '".$email."', '".$mobile."') ";
                $result = self::$mysqli->query($sql);
            }
            return $result;
        }
        public static function getTrueOrFalse($value, $id) {
            $sql = "SELECT `true_var` FROM `vl1_competitionquestionsmodel` WHERE `".$id."` = '".$value."'";
            $result = self::fQuery($sql);
            return $result;
        }

        public static function getCurrentTrueFalseAnswerCount($colName, $relation_id) {
            $sql = "SELECT `".$colName."` FROM `".CompetitionModel::getTableName()."` WHERE `relation_id` = '".$relation_id."'";
            $result = self::fQuery($sql);
            return $result[0][$colName];
        }
        public static function setCurrentTrueFalseAnswerOneMore($colName, $count, $relation_id) {
            $sql = "UPDATE `".CompetitionModel::getTableName()."` SET `".$colName."` = '".$count."' WHERE `relation_id` = '".$relation_id."'";
            $result = self::$mysqli->query($sql);
            return $result;
        }
        public static function getAnswer($id, $value) {
            $sql = "SELECT `answer` FROM `vl1_competitionquestionsmodel` WHERE `".$id."` = '".$value."'";
            $result = self::fQuery($sql);
            return $result[0]["answer"];
        }
        public static function getUserTime($relation_id) {
            $sql = "SELECT `time` FROM `".CompetitionModel::getTableName()."` WHERE `relation_id` = '".$relation_id."'";
            $result = self::fQuery($sql);
            return $result[0]["time"];
        }


        public static function getUserColums() {
            $sql = "SELECT `name`,`surname`,`image`,`competition_active`, `penalty_points`, `distance_traveled`, `car_brand`, `car_model`
                    FROM `".CompetitionModel::getTableName()."` WHERE `false_answers` < '2' AND `true_answers` > '8'
                    ORDER BY `penalty_points` DESC, `distance_traveled`";
            $result = self::fQuery($sql);
            return $result;
        }


    }
?>