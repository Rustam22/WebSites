<?php
/* 
 * *** GoldenPay integration PHP code sample ***
 * 
 * Check payment status.
 */

require_once './private/filter/filter.php';
require_once './private/stub/PaymentGatewayGoldenpay.php';

//{
//"status":{"code":1,"message":"success"},
//"paymentKey":"babc0883-a4ab-4821-84d3-73c86834aee3",
//"merchantName":"test","amount":10,"checkCount":1,
//"paymentDate":"2014-09-03 11:50:57","cardNumber":"402865******8101",
//"language":"ru","description":"key11","rrn":"424611432573"
//}

$payment_key = getFilteredParam('payment_key');

$stub = new PaymentGatewayGoldenpay();
$resp = $stub->getPaymentResult($payment_key);


if ($resp->status->code == 1 && $resp->checkCount == 0) {
    echo "Payment was successful";
    echo "<br>amount: ".$resp->amount;
    echo "<br>amount: ".$resp->paymentDate;
} else {
    echo "Payment was <b>unsuccessful</b>";
}