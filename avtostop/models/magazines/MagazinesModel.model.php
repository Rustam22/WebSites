<?php

class MagazinesModel extends CRUDModel {

    public $itemTitle;
    public $date;
    public $image;
    public $file;
    public $amount;

    public static $tplViewFile;
    public static $multiLang = false;

    public function __construct() {

        $messages = Application::$messages['model_news'];

        $this->itemTitle = new ModelTextField("itemTitle", $messages['field_itemTitle'], true, true);
        $this->itemTitle->required = false;

        $this->date = new ModelDateField("date", $messages['field_date'], false, false);
        $this->date->common = true;

        $this->image = new ModelFMImageField("image", "Şəkil", false, false);
        $this->image->required = true;

        $this->amount = new ModelTextField("amount", "Qiymət AZN", true, true);
        $this->amount->required = true;

        $this->file = new ModelFMFileField("file", "Jurnal Fayl", false, false);
        $this->file->required = true;
    }

    public function getSearchUrl() {
        return 'magazines/' . $this->r_id->value;
    }

    public static function initialize() {
        self::$displayFields = Array('itemTitle', 'date', 'image', 'file', 'amount');
        self::$title = 'Jurnallar';
        self::$iconPath = 'news-icon.png';
        self::$multiLang = false;
        self::$searchable = true;
        self::$viewUrl = 'magazines';
        self::$searchSettings = Array('title_field' => 'itemTitle', 'content_field' => 'description');
    }

    public static function getListToView($start, $limit) {
        $sql = " SELECT * FROM `". self::getTableName() ."` ORDER BY `date` DESC LIMIT " . $start . "," . $limit;
        $r = self::fQuery($sql);
        return Array(
            'd' => $r,
            'c' => self::count(" WHERE `lang_id` = 'az' ")
        );
    }

    public static function setUniqueField() {
        $sql = "SELECT * FROM `".MagazinesModel::getTableName()."` ORDER BY `id` LIMIT 1";
        $sql_result = self::fQuery($sql);
        $id = $sql_result[0]['id'];
        $unqie = md5($id.rand(0, 99999));
        $sql = "UPDATE `".MagazinesModel::getTableName()."` SET `unique` = '".$unqie."' WHERE `id` = '".$id."'";
        $result = self::$mysqli->query($sql);
    }

    public static function getDataById($id) {
        $sql = "SELECT * FROM `".MagazinesModel::getTableName()."` WHERE `id` = '".$id."' ";
        $result = self::fQuery($sql);
        return $result[0];
    }
    public static function getUrlByMagazineId($magazineId) {
        $sql = "SELECT `file` FROM `".MagazinesModel::getTableName()."` WHERE `id` = '".$magazineId."' ";
        $result = self::fQuery($sql);
        return $result[0];
    }

    public static function insertFirstPaymentKeyWithMagazineId($magazineId, $cardType, $itemTitle, $paymentKey) {
        $sql = "INSERT INTO `vl1_paymentresultsmodel` (`magazineId`, `cardType`, `itemTitle`, `paymentKey`)
                VALUES('".$magazineId."', '".$cardType."', '".$itemTitle."', '".$paymentKey."')";
        $result = self::$mysqli->query($sql);
        return $result;
    }
    public static function insertFirstPaymentKeyWithMagazineIdAndUserId($magazineId, $userId, $status, $cardType, $itemTitle, $paymentKey) {
        $sql = "INSERT INTO `vl1_paymentresultsmodel` (`magazineId`, `userId`, `status`, `cardType`, `itemTitle`, `paymentKey`)
                VALUES('".$magazineId."', '".$userId."', '".$status."', '".$cardType."', '".$itemTitle."', '".$paymentKey."')";
        $result = self::$mysqli->query($sql);
        return $result;
    }
    public static function insertFirstPaymentKeyWithUserId($userId, $cardType, $itemTitle, $paymentKey) {
        $sql = "INSERT INTO `vl1_paymentresultsmodel` (`userId`, `cardType`, `itemTitle`, `paymentKey`, `status`)
                VALUES('".$userId."', '".$cardType."', '".$itemTitle."', '".$paymentKey."', 'registration')";
        $result = self::$mysqli->query($sql);
        return $result;
    }

    public static function updatePaymentResultByPaymentKey($code, $message, $merchantName, $amount, $checkCount, $paymentDate, $cardNumber, $language, $description, $rrn, $paymentKey) {
         $sql = "UPDATE `vl1_paymentresultsmodel` SET `code` = '".$code."', `message` = '".$message."', `merchantName` = '".$merchantName."', `amount` = '".$amount."',
                 `checkCount` = '".$checkCount."', `paymentDate` = '".$paymentDate."', `cardNumber` = '".$cardNumber."', `language` = '".$language."',
                 `description` = '".$description."', `rrn` = '".$rrn."' WHERE `paymentKey` = '".$paymentKey."' ";
        $result = self::$mysqli->query($sql);
        return $result;
    }

    public static function getMagazineIdByPaymentKey($paymentKey) {
        $sql = "SELECT `magazineId` FROM `vl1_paymentresultsmodel` WHERE `paymentKey` = '".$paymentKey."' ";
        $result = self::fQuery($sql);
        return $result[0];
    }

    public static function getStatusByPaymentKey($paymentKey) {
        $sql = "SELECT `status` FROM `vl1_paymentresultsmodel` WHERE `paymentKey` = '".$paymentKey."' ";
        $result = self::fQuery($sql);
        return $result[0];
    }
    public static function getDataByPaymentKey($paymentKey) {
        $sql = "SELECT * FROM `vl1_paymentresultsmodel` WHERE `paymentKey` = '".$paymentKey."' ";
        $result = self::fQuery($sql);
        return $result[0];
    }
    public static function getCurrentMagazineStatus($magazineId, $userId) {
        $sql = "SELECT COUNT(`id`) FROM `vl1_paymentresultsmodel` WHERE `magazineId` = '".$magazineId."'
                AND `userId` = '".$userId."' AND `code` = '1' AND `message` = 'success'";
        $result = self::fQuery($sql);
        return $result;
    }
    public static function getUserIdByPaymentKey($paymentKey) {
        $sql = "SELECT `userId` FROM `vl1_paymentresultsmodel` WHERE `paymentKey` = '".$paymentKey."' ";
        $result = self::fQuery($sql);
        return $result[0];
    }

    public static function updateMagazineData($hash, $date, $id) {
        $sql = "UPDATE `".MagazinesModel::getTableName()."` SET `hash` = '".$hash."', `timeOut` = '".$date."' WHERE `id` = '".$id."'";
        $result = self::$mysqli->query($sql);
        return $result;
    }

    public static function getDataByHash($hash) {
        $sql = "SELECT * FROM `".MagazinesModel::getTableName()."` WHERE `hash` = '".$hash."' ";
        $result = self::fQuery($sql);
        return $result[0];
    }

}

?>