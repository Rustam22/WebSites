<?php

    require_once 'private/filter/filter.php';
    require_once 'private/stub/PaymentGatewayGoldenpay.php';

	class PaymentController extends Controller {

        public static $paymentKey;   //4028653553041928
        public static $timeOut = 1;  //one day

        public static function view($request, $vars, $context = Array()) {
            $context['csrf_key'] = Application::getCSRFKey();
            self::renderTemplate('registration' . ds . 'registration.tpl', $context);
        }

        public static function truefalse($request, $vars, $context = Array()) {
            $context['csrf_key'] = Application::getCSRFKey();

            self::$paymentKey = substr($vars[1], -36);

            $stub = new PaymentGatewayGoldenpay();
            $json = $stub->getPaymentResult(self::$paymentKey);
            $context['code'] = $json->status->code;
            $context['message'] = $json->status->message;
            //echo "<pre>"; print_r($json); echo "</pre>";


            $result_1 = MagazinesModel::updatePaymentResultByPaymentKey($context['code'], $context['message'], $json->merchantName, $json->amount, $json->checkCount,
                                                                      $json->paymentDate, $json->cardNumber, $json->language, $json->description, $json->rrn, $json->paymentKey);

            $status = MagazinesModel::getStatusByPaymentKey($json->paymentKey);
            $data = MagazinesModel::getDataByPaymentKey($json->paymentKey);
            //print_r($data);
            $status = $status['status'];
            if($status == "registration") {
                $context['status'] = "registration";
                $userId = MagazinesModel::getUserIdByPaymentKey($json->paymentKey);
                $userId = $userId['userId'];
                $userResult = RegistrationModel::userActivateByUserId($userId);
            } elseif($status == "userBuysMagazine") {
                $context['status'] = "magazines";
                $result_2 = MagazinesModel::getMagazineIdByPaymentKey($json->paymentKey);
                $result_2 = $result_2['magazineId'];
                $context['sqlUpdateResult'] = $result_1;
                $context['sqlGetMagazineIdByPaymentKey'] = $result_2;

                $result_3 = MagazinesModel::getDataById($result_2);
                $hash = md5($result_3['id'].$result_3['amount'].$json->paymentKey);
                $date = date("Ymd");
                $result_4 = MagazinesModel::updateMagazineData($hash, $date, $result_3['id']);

                $context['url'] = "download/".$hash;
                $context['magazineName'] = $json->description;
            } else {
                $context['status'] = "magazines";
                $result_2 = MagazinesModel::getMagazineIdByPaymentKey($json->paymentKey);
                $result_2 = $result_2['magazineId'];
                $context['sqlUpdateResult'] = $result_1;
                $context['sqlGetMagazineIdByPaymentKey'] = $result_2;

                $result_3 = MagazinesModel::getDataById($result_2);
                $hash = md5($result_3['id'].$result_3['amount'].$json->paymentKey);
                $date = date("Ymd");
                $result_4 = MagazinesModel::updateMagazineData($hash, $date, $result_3['id']);

                $context['url'] = "download/".$hash;
                $context['magazineName'] = $json->description;
            }

            self::renderTemplate('magazines' . ds . 'TrueFalse.tpl', $context);
        }

        public static function downloadMagazine($request, $vars) {
            $result = MagazinesModel::getDataByHash($vars[1]);
            $date = date("Ymd");
            //print_r($result);
            $url = 'public/'.$result['file'];
            if(($date - $result['timeOut']) < self::$timeOut) {
                if (file_exists($url)) {
                    header('Content-Type: application/pdf');
                    header("Content-Transfer-Encoding: Binary");
                    header("Content-disposition: attachment; filename='".$result['itemTitle'].".pdf'");
                    readfile($url);
                }
                else {
                    echo ("File doesn't exist.");
                }
            } else {
                echo "Yükləmə müddəti(timeout) sona çatıb!";
            }
        }

        public static function saveItem($request, $vars) {
            if($request->isAjax()) {
                $id = $_POST['id'];
                $cardType = $_POST['cardType'];
                $result = MagazinesModel::getDataById($id);

                $stub = new PaymentGatewayGoldenpay();

                $resp = $stub->getPaymentKeyJSONRequest(intval(($result['amount'])*100), "lv", $cardType, $result['itemTitle']);
                //print_r($resp);
                if($resp->status->code == "1" && $resp->status->message == "success") {
                    $insertResult = MagazinesModel::insertFirstPaymentKeyWithMagazineId($id, $cardType, $result['itemTitle'], $resp->paymentKey);
                    if($insertResult != "1") {
                        $resp->status->code = "8100";
                        echo json_decode($resp);
                        exit();
                    }
                }
                echo json_encode($resp);
            }
        }
        public static function getCurrentMagazineStatus($request, $vars) {
            if($request->isAjax()) {
                $magazineId = $_POST['magazineId'];
                $userId = $_POST['userId'];

                $result = MagazinesModel::getCurrentMagazineStatus($magazineId, $userId);
                $result['count'] = $result[0]['COUNT(`id`)'];
                $result['url'] = MagazinesModel::getUrlByMagazineId($magazineId);
                echo json_encode($result);
            }
        }
        public static function saveItemByUserId($request, $vars) {
            if($request->isAjax()) {
                $magazineId = $_POST['id'];
                $cardType = $_POST['cardType'];
                $userId = $_POST['userId'];
                $result = MagazinesModel::getDataById($magazineId);

                $stub = new PaymentGatewayGoldenpay();

                $resp = $stub->getPaymentKeyJSONRequest(intval(($result['amount'])*100), "lv", $cardType, $result['itemTitle']);
                //print_r($resp);
                if($resp->status->code == "1" && $resp->status->message == "success") {
                    $insertResult = MagazinesModel::insertFirstPaymentKeyWithMagazineIdAndUserId($magazineId, $userId, "userBuysMagazine", $cardType, $result['itemTitle'], $resp->paymentKey);
                    if($insertResult != "1") {
                        $resp->status->code = "8100";
                        echo json_decode($resp);
                        exit();
                    }
                }
                echo json_encode($resp);
            }
        }
	}
?>