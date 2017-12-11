{extends file="base.tpl"}

{block name="content"}


    <script type="text/javascript">
        $(document).ready(function() {
            var code = '{$code}';
            var message = '{$message}';
            var url = '{$app_url}/{$url}';
            var magazineName = '{$magazineName}';
            var status = '{$status}';

            if(code == '1' && message == 'success') {
                if(status == "magazines") {
				    $(".page-content h1").html(magazineName + " üçün ödəniş uğurla başa çatdı.Jurnalı <a href='" + url + "'>buradan</a> yükləyin");
                } else if(status == "registration") {
                    $(".page-content h1").html("Ödəniş uğurla başa çatdı, siz Abunəçilər üçün giriş panelinnən hesabınıza daxil ola bilərsiniz");
                }
            } else {
                getPaymentResultStatus(code);
            }

            function getPaymentResultStatus(code) {
                if(code == 900) {
                    $(".page-content h1").html("Naməlum error, xahiş edirik ki, GoldenPay ilə əlaqə saxlayasınız");
                }
                if(code == 901) {
                    $(".page-content h1").html("Göndərilən verilənlər boş və ya yalnışdır");
                }
                if(code == 811) {
                    $(".page-content h1").html("Ödəniş kodu boşdur");
                }
                if(code == 803) {
                    $(".page-content h1").html("Yalnış hashcode");
                }
                if(code == 812) {
                    $(".page-content h1").html("Ödəniş kodu sistemdə mövcud deyil");
                }
                if(code == 813) {
                    $(".page-content h1").html("Siz ödəniş kodunu qəbul edirsiniz , lakin ödəniş hələ bitməmişdir");
                }
                if(code == 814) {
                    $(".page-content h1").html("Ödəniş ləğv olundu");
                }
                if(code == 815) {
                    $(".page-content h1").html("Ödəmə baş verən zaman problem baş vermişdir, GoldenPay ilə əlaqə saxlayın");
                }
                if(code == 816) {
                    $(".page-content h1").html("Ödəniş uğursuz oldu.Siz baş vermə səbəbini ecomm error kod-larından tapa bilərsiniz");
                }
                if(code == 817) {
                    $(".page-content h1").html("Ödəniş ləğv olundu.");
                }
                if(code == 818) {
                    $(".page-content h1").html("Ödəniş davam etməkdədir.");
                }
                if(code == 819) {
                    $(".page-content h1").html("Timeout problemi (15 dəq)");
                }
            }
        })
    </script>

    <div class="faq-title">Ödəniş nəticə</div>

    <div class="path-container">
        <div class="path-item left"><a href="{$app_url}">Baş səhifə</a></div>
        {foreach from=$path item=p name=path_f}
            <div class="path-item left {if ($smarty.foreach.path_f.last)}path-item-last{/if} ">&raquo;</div>
            <div class="path-item left {if ($smarty.foreach.path_f.last)}path-item-last{/if} "><a href="{$app_url}/page/{$p.r_id}">{$p.title}</a></div>
        {/foreach}
        <div class="clear"></div>
    </div>

    <style type="text/css">
        .page-content h1 {
            text-align: center;
            color: #ec1b23;
            font-size: 25px;
        }
    </style>
    <div class="page-content">

        <h1></h1>

    </div>

{/block}