<?php
/* 
 * *** GoldenPay integration PHP code sample ***
 * 
 * Save selected item and redireck user to payment page.
 */

require_once './private/filter/filter.php';
require_once './private/stub/PaymentGatewayGoldenpay.php';

$cardType = getFilteredParam('cardType');
$amount = intval(getFilteredParam('amount')*100);
$description = getFilteredParam('item');
$lang = getFilteredParam('lang');

$stub = new PaymentGatewayGoldenpay();

/*
 * Response: {"status":{"code":1,"message":"success"},"paymentKey":"8d53b07f-ec45-48b9-b877-c0e9d5c54682"}
 * 
 * Save payment key to your db : $resp->paymentKey
 */
$resp = $stub->getPaymentKeyJSONRequest($amount, $lang, $cardType, $description);
print_r($resp);
//header('Location: '.$resp->urlRedirect);

?>


Please wait ...



