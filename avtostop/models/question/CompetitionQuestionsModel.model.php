<?php

    class CompetitionQuestionsModel extends CRUDModel {

        public $question;
        public $var1;
        public $var2;
        public $answer;
        public $true_var;
        public $id_1;
        public $id_2;

        //public static $perPage=10;
        //public static $tplViewFile;

        public function __construct() {
            $messages = Application::$messages['model_feedback'];
            $commonMessages = Application::$messages['common_messages'];

            $this->question = new ModelTextField("question", "Sual", true, true);
            $this->var1 = new ModelTextField("var1", "Variant 1", true, true);
            $this->var2 = new ModelTextField("var2", "Variant 2", true, true);
            $this->answer = new ModelTextField("answer", "Cavab", true, true);
            $this->true_var = new ModelSelectField("true_var", "Düzqün Cavab", Array(
                "var1" => "variant_1",
                "var2" => "variant_2"
            ), true, true);
            $this->id_1 = new ModelTextField("id_1", "ID 1", true, true);
            $this->id_2 = new ModelTextField("id_2", "ID 2", true, true);
        }

        public static function initialize() {
            self::$displayFields = Array('question', 'var1', 'var2', 'answer', 'true_var', 'id_1', 'id_2');
            self::$title = "Musabiqe Suallar";
            self::$iconPath = 'competitionQuestion.png';
            self::$multiLang = false;
            self::$viewUrl = 'register';
        }

        public static function excelImport() {
            $url = Application::$settings['url'];
            $file = fopen($url. "/public/competitionQuestions.csv", "r");
            $currentQuestionsCount = (int)CompetitionQuestionsModel::getCount();
            $count = 0;
            while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
                if((int)$count >= (int)($currentQuestionsCount + 1)) {
                    //echo "<pre>"; print_r($emapData);  echo "</pre>";
                    $sql = "INSERT INTO `".CompetitionQuestionsModel::getTableName()."` (`question`, `var1`, `var2`, `answer`, `true_var`, `id_1`, `id_2`) VALUES('".$emapData[0]."', '".$emapData[1]."', '".$emapData[2]."', '".$emapData[3]."', '".$emapData[4]."', '".rand(10000, 99999)."', '".rand(10000, 99999)."')";
                    $result = self::$mysqli->query($sql);
                }
                $count++;
            }
        }

        public static function getCount() {
            $sql = "SELECT COUNT(`id`) FROM `".CompetitionQuestionsModel::getTableName()."`";
            $result = self::fQuery($sql);
            return $result[0]["COUNT(`id`)"];
        }


    }
?>