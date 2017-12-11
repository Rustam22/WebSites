<?php
    class TvLiveModel extends CRUDModel {

        public $iframe;
        public $date;
        public $active;
        public $titleName;

        public static $order = array('date', 'desc');

        public function __construct() {
            $messages = Application::$messages['model_news'];

            $this->iframe = new ModelTextField("iframe", 'Link', true, true);
            $this->iframe->required = false;

            $this->titleName = new ModelTextField("titleName", 'Adı', true, true);
            $this->titleName->coomon = false;

            $this->active = new ModelSelectField("active", "Görünür", Array(
                '0' => Application::$messages['common_messages']['nno'],
                '1' => Application::$messages['common_messages']['yyes'],
            ), true, true);
            $this->active->common = true;
            $this->date = new ModelDateField("date", $messages['field_date'], true, true);
            $this->date->common = true;
        }

        public static function initialize() {
            self::$displayFields = Array('titleName', 'iframe', 'date', 'active');
            self::$title = 'Live Tv';
            self::$iconPath = 'live_tv.png';
            self::$multiLang = false;
            self::$searchable = false;
        }

        public static function getLastiFrame() {
            $sql = "SELECT `iframe` FROM `".TvLiveModel::getTableName()."` WHERE `active` = '1' ORDER BY `date` DESC LIMIT 1";
            $result = self::fQuery($sql);

            return $result;
        }
    }
?>