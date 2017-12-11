<?php
/* 
 * *** GoldenPay integration PHP code sample ***
 * 
 * Item selection script.
 */
//require_once './private/filter/filter.php';
//require_once './private/stub/PaymentGatewayGoldenpay.php';

?>



<form action="saveitem.php" method="post">
    Amount : <input type="text" name="amount" value="" /> <br>
    Item : <input type="text" name="item" value="" /> <br>
    Card type :
    <select name="cardType">
        <option value='v'>Visa</option>
        <option value='m'>Master</option>
    </select> <br>

    Lang :
    <select name="lang">
        <option value='lv'>Az</option>
        <option value='ru'>Ru</option>
        <option value='ru'>En</option>
    </select> <br>
    <input type="submit" name="selectItem" value="Select item">
</form>