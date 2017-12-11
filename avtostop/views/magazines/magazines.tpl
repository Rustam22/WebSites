{extends file="base.tpl"}

{block name="content"}

    <script type="html/template" id="t-itemPayment">
        <div class="signin-container">
            <form action="{$app_url}/goldenPay/saveitem.php" method="post">
                <table>
                    <tr>
                        <td>Məbləğ: </td>
                        <td><input type="text" name="amount" value="" /></td>
                    </tr>
                    <tr>
                        <td>Jurnalın Adı: </td>
                        <td><input type="text" name="item" value="" disabled="disabled" /></td>
                    </tr>
                    <tr>
                        <td>Kartın növü: </td>
                        <td>
                            <select name="cardType" style="cursor: pointer;">
                                <option value="v">Visa</option>
                                <option value="m">Master</option>
                            </select>
                        </td>
                    </tr>
                    <!--<tr>
                        <td>Dil: </td>
                        <td>
                            <select name="lang" style="cursor: pointer;">
                                <option value="lv">Az</option>
                            </select>
                        </td>
                    </tr>-->
                    <tr>
                        <td></td>
                        <td><input type="button" name="selectItem" style="cursor: pointer; padding: 3px 5px;" value="Təstiq et&nbsp;&nbsp;&nbsp;"></td>
                    </tr>
                </table>
            </form>
        </div>
    </script>

    <script>
        {if isset($context_cookie.active) and ($context_cookie.active eq 1)}
            var userIdGlob = '{$context_cookie.id}';
        {elseif isset($context_session.active) and ($context_session.active eq 1)}
            var userIdGlob = '{$context_session.id}';
        {/if}
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var DATA = '';
            $(".advice-item .buy").click(function() {
                var id = this.id;
                var itemName = $(".advice-item #" + id + " p").html();
                var cost = $(".advice-item #" + id + " span").html().slice(0, -4);

                showMessage(tmpl($('#t-itemPayment').html(), {}));
                $(".signin-container input[name=amount]").val(cost + " AZN");
                $(".signin-container input[name=item]").val(itemName);
                $(".signin-container input[name=item], input[name=amount]").prop('disabled', true);

                {if isset($context_cookie.active) and ($context_cookie.active eq 1)}
                    var userId = '{$context_cookie.id}';
                    $(".signin-container input[name=selectItem]").click(function () {
                        var cardType = $(".signin-container select[name=cardType]").val();
                        $.ajax({
                            url: app.url + '/saveItemByUserId',
                            type: 'post',
                            dataType: "json",
                            data: "id=" + id + "&cardType=" + cardType + "&userId=" + userId,
                            success: function (data) {
                                DATA = JSON.parse(JSON.stringify(data));
                                if(DATA['status'].code == '1' && DATA['status'].message == 'success') {
                                    window.open(DATA['urlRedirect']);
                                } else {
                                    getPaymentKeyStatus(DATA['status'].code);
                                    location.reload();
                                }
                            }
                        });
                    });
                {elseif isset($context_session.active) and ($context_session.active eq 1)}
                    var userId = '{$context_session.id}';
                    $(".signin-container input[name=selectItem]").click(function () {
                        var cardType = $(".signin-container select[name=cardType]").val();
                        $.ajax({
                            url: app.url + '/saveItemByUserId',
                            type: 'post',
                            dataType: "json",
                            data: "id=" + id + "&cardType=" + cardType + "&userId=" + userId,
                            success: function (data) {
                                DATA = JSON.parse(JSON.stringify(data));
                                if(DATA['status'].code == '1' && DATA['status'].message == 'success') {
                                    window.open(DATA['urlRedirect']);
                                } else {
                                    getPaymentKeyStatus(DATA['status'].code);
                                    location.reload();
                                }
                            }
                        });
                    });
                {else}
                    $(".signin-container input[name=selectItem]").click(function () {
                        var cardType = $(".signin-container select[name=cardType]").val();
                        $.ajax({
                            url: app.url + '/saveItem',
                            type: 'post',
                            dataType: "json",
                            data: "id=" + id + "&cardType=" + cardType,
                            success: function (data) {
                                DATA = JSON.parse(JSON.stringify(data));
                                if(DATA['status'].code == '1' && DATA['status'].message == 'success') {
                                    window.open(DATA['urlRedirect']);
                                } else {
                                    getPaymentKeyStatus(DATA['status'].code);
                                    location.reload();
                                }
                            }
                        });
                    });
                {/if}

            });
            function getPaymentKeyStatus(code) {
                switch (code) {
                    case 900:
                        alert("Naməlum error, xahiş edirik ki,GoldenPay ilə əlaqə saxlayasınız");
                        break;
                    case 901:
                        alert("Göndərilən verilənlər boş və ya yalnışdır");
                        break;
                    case 801:
                        alert("Merchant adı boşdur və ya sistemdə bu adda merchant adı yoxdur");
                        break;
                    case 802:
                        alert("Merchant dayandırılmışdır.Xahiş edirik ki, GoldenPay ilə əlaqə saxlayasınız");
                        break;
                    case 803:
                        alert("Hashcode boş və ya yalnışdır");
                        break;
                    case 804:
                        alert("Bu merchant-ın ödəmə etməyə icazəsi yoxdur");
                        break;
                    case 805:
                        alert("Kartın tipi boş və ya yalnışdır");
                        break;
                    case 806:
                        alert("Kart tipi dayandırılmışdır. Xahiş edirik ki, GoldenPay ilə əlaqə saxlayasınız");
                        break;
                    case 807:
                        alert("Bu istifadəçinin bu merchant və kart tipindən istifadə edərək ödəniş etməsi mümkün deyil (konfiqurasiya verilənləri mövcud deyil)");
                        break;
                    case 808:
                        alert("Bu istifadəçinin bu merchant və kart tipindən istifadə edərək ödəniş etməsi mümkün deyil (konfiqurasiya verilənləri dayandırılmışdır)");
                        break;
                    case 809:
                        alert("Məbləğ boş və ya yalnışdır");
                        break;
                    case 810:
                        alert("Dil 'lv', 'ru' or 'en' -lərindən biri olmalıdır.");
                        break;
                    case 8100:
                        alert("Bazaya sorğu baş tutmadı");
                        break;
                }
            }
            function getPaymentResultStatus(code) {
                switch (code) {
                    case 900:
                        alert("Naməlum error, xahiş edirik ki, GoldenPay ilə əlaqə saxlayasınız");
                        break;
                    case 901:
                        alert("Göndərilən verilənlər boş və ya yalnışdır");
                        break;
                    case 811:
                        alert("Ödəniş kodu boşdur");
                        break;
                    case 803:
                        alert("Yalnış hashcode");
                        break;
                    case 812:
                        alert("Ödəniş kodu sistemdə mövcud deyil");
                        break;
                    case 813:
                        alert("Siz ödəniş kodunu qəbul edirsiniz , lakin ödəniş hələ bitməmişdir");
                        break;
                    case 814:
                        alert("Ödəniş ləğv olundu");
                        break;
                    case 815:
                        alert("Ödəmə baş verən zaman problem baş vermişdir, GoldenPay ilə əlaqə saxlayın");
                        break;
                    case 816:
                        alert("Ödəniş uğursuz oldu.Siz baş vermə səbəbini ecomm error kod-larından tapa bilərsiniz");
                        break;
                    case 817:
                        alert("Ödəniş ləğv olundu.");
                        break;
                    case 818:
                        alert("Ödəniş davam etməkdədir.");
                        break;
                    case 819:
                        alert("Timeout problemi (15 dəq)");
                        break;
                }
            }
        })
    </script>

    {if isset($context_cookie.active) and ($context_cookie.active eq 1)}
        <script type="text/javascript">
            $(document).ready(function() {
                $(".advice-item .buy").each(function(){
                    var magazineId = $(this).attr('id');
                    var userId = userIdGlob;
                    $.ajax({
                        url: app.url + '/getCurrentMagazineStatus',
                        type: 'post',
                        dataType: "json",
                        data: "magazineId=" + magazineId + "&userId=" + userId,
                        success: function (data) {
                            data = JSON.parse(JSON.stringify(data));
                            if(parseInt(data['count']) >= 1) {
                                $(".advice-item .downloadSign-" + magazineId).html("<a class='downloadSign' href='{$app_url}/public/" + data['url'].file + "' >Yüklə</a>");
                                return false;
                            }
                        }
                    });
                });
            })
        </script>
    {elseif isset($context_session.active) and ($context_session.active eq 1)}
        <script type="text/javascript">
            $(document).ready(function() {
                $(".advice-item .buy").each(function(){
                    var magazineId = $(this).attr('id');
                    var userId = userIdGlob;
                    $.ajax({
                        url: app.url + '/getCurrentMagazineStatus',
                        type: 'post',
                        dataType: "json",
                        data: "magazineId=" + magazineId + "&userId=" + userId,
                        success: function (data) {
                            data = JSON.parse(JSON.stringify(data));
                            if(parseInt(data['count']) >= 1) {
                                $(".advice-item .downloadSign-" + magazineId).html("<a class='downloadSign' href='{$app_url}/public/" + data['url'].file + "' >Yüklə</a>");
                                return false;
                            }
                        }
                    });
                });
            })
        </script>
    {/if}

    <div class="faq-title">Jurnallar</div>

    <div class="path-container">
        <div class="path-item left"><a href="{$app_url}">Baş səhifə</a></div>
        {foreach from=$path item=p name=path_f}
            <div class="path-item left {if ($smarty.foreach.path_f.last)}path-item-last{/if} ">&raquo;</div>
            <div class="path-item left {if ($smarty.foreach.path_f.last)}path-item-last{/if} "><a href="{$app_url}/page/{$p.r_id}">{$p.title}</a></div>
        {/foreach}
        <div class="clear"></div>
    </div>

    <style type="text/css">
        .advice-item {
            float: left;
            margin-right: 85px;
            width: 145px;
        }
        .advice-item .advice-item-title {
            padding: 0 10px;
        }
        .advice-item .advice-item-date span {
            color: gray;
        }
        .advice-item .advice-item-title p {
            color: #ab0f0f;
            text-decoration: underline;
        }
        .advice-item .cost, .buy {
            padding: 2px 5px;
            background-color: #ec1b23;
            float: left;
            color: white;
            margin-right: 5px;
        }
        .advice-item .buy {
            cursor: pointer;
        }
        .downloadSign {
            background-color: #12C71C;
            padding: 2px 16px;
            text-decoration: none;
            line-height: 25px;
            color: white;
        }
    </style>
    <div class="page-content">

        {foreach from=$advices item=a name=foo}

            <div class="advice-item">
                <div class="advice-item-date"><span>&nbsp;&nbsp;&nbsp;{$a.date}</span></div>
                <div class="advice-item-title"><img with="80" height="115" src="{$app_url}/public/{$a.image}"></div>
                <div id="{$a.id}" class="advice-item-title"><p>{$a.itemTitle}</p></div>
                <div id="{$a.id}" class="cost"><span>{$a.amount} AZN</span></div>
                <div class="downloadSign-{$a.id}"><div class="buy" id="{$a.id}">Yüklə</div></div>
            </div>
            {if ($smarty.foreach.foo.iteration%3) eq 0}<div style="clear: both;"></div>{/if}

        {/foreach}

        {if ($pages > 1)}
            <div class="advice-paginator-container">
                <div class="advice-paginator-item"><a href="{$app_url}/advices/page/{$to_left}">&laquo;</a></div>

                {section name=adv_pag loop=$pages }
                    <div class="advice-paginator-item"><a href="{$app_url}/advices/page/{$smarty.section.adv_pag.index}">{$smarty.section.adv_pag.index + 1}</a></div>
                {/section}

                <div class="advice-paginator-item"><a href="{$app_url}/advices/page/{$to_right}">&raquo;</a></div>
            </div>
        {/if}

    </div>

{/block}