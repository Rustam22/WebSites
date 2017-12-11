    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8">
        <title>Avtostop.tv</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet/less" type="text/css" href="{$static_url}/stylesheets/stylesheets.css" />
        <link href="{$static_url}/images/favicon.png" rel="shortcut icon" type="image/x-icon" />
        <script src="{$static_url}/javascripts/less.js"></script>

        <script>
            var app = {};
            app.url = '{$app_url}';
        </script>

        {literal}
            <!-- Start Alexa Certify Javascript -->
            <script type="text/javascript">
                _atrk_opts = { atrk_acct:"6rHVi1a4ZP00yX", domain:"avtostop.tv",dynamic: true};
                (function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
            </script>
            <noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=6rHVi1a4ZP00yX" style="display:none" height="1" width="1" alt="" /></noscript>
            <!-- End Alexa Certify Javascript -->
        {/literal}
        <style>
            .flag_img {
                position: absolute;
                margin-top: -6px;
                margin-left: 9px;
                z-index: 1;
            }
        </style>
    </head>
    <body>

    <div class="center-container">
    <!--<h2>{$context.id}</h2>
    <h2>{$context.name}</h2>
    <h2>{$context.surname}</h2>
    <h2>{$context.email}</h2>-->
    <div id="top-container">
        <div class="left-side left">
            <div class="logo-container left">
                <a href="{$app_url}">
                    <div class="sprite logo-sprite"></div>
                </a>
            </div>

            <div class="clear"></div>
        </div>
        <div class="right-side left">
            <div class="right-top right">
                <div class="search-container left">
                    <div class="left search-input-container">
                        <input type="text" name="q" id="search-query" />
                    </div>
                    <div class="left">
                        <div class="search-icon-container c-pointer" id="search-button">
                            <div class="sprite search-icon-sprite"></div>
                        </div>
                    </div>
                </div>
                <div class="live-button-container left">
                    <div class="red-button {if (!$live_active)}live-inactive{/if} " id="in-site" >EFİRDƏ</div>
                </div>
                <div class="sound-volume-container left p-relative">
                    <div class="volume-icon volume-icon-sprite sprite left c-pointer" onclick="initLive();"></div>
                    <div class="volume-disabled hide p-absolute">x</div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="right-bottom">
                <div class="add-info-container left">
                    <img src="{$static_url}/images/more-info-az.png" />
                </div>

                <div class="right auth-container" style="display: none;">
                    <div class="auth-item left auth-item-active"><div><a>Abunəçilər üçün giriş</a></div></div>
                    <div class="auth-item left"><a><img src="{$static_url}/images/signin.png" /></a></div>
                    <div class="clear"></div>
                </div>

                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>

    <div id="slider-container">
    <div class="left-side left">

    <div id="main-slider-container">
        <div class="horizontal-slider-container p-relative" id="main-slider">
            <div class="horizontal-slider-to-left p-absolute">
                <div class="active-pointer ov-hidden arrow-to-left hide">
                    <img src="{$static_url}/images/slider-to-left.gif" />
                </div>
                <div class="inactive-pointer ov-hidden arrow-to-left">
                    <img src="{$static_url}/images/slider-to-left-inactive.gif" />
                </div>
            </div>
            <div class="horizontal-slider-wrapper left ov-hidden">
                <div class="horizontal-slider-ribbon p-relative">
                    {foreach from=$banners item=b}
                        <div class="horizontal-slider-item left text-color-blue font14" style="text-align: center;">
                            <img src="{$public_url}/{$b->file->value}" />
                        </div>
                    {/foreach}
                    <div class="clear"></div>
                </div>
                <div class="horizontal-slider-pointers">
                    {foreach from=$banners item=b name=banners_f }
                        {if $smarty.foreach.banners_f.first}
                            <div class="horizontal-slider-pointer">
                                <div class="pointer-active ov-hidden"></div>
                                <div class="pointer-inactive ov-hidden hide"></div>
                            </div>
                        {else}
                            <div class="horizontal-slider-pointer">
                                <div class="pointer-active ov-hidden hide"></div>
                                <div class="pointer-inactive ov-hidden"></div>
                            </div>
                        {/if}
                    {/foreach}

                    <div class="clear"></div>
                </div>
            </div>
            <div class="horizontal-slider-to-right p-absolute">
                <div class="active-pointer ov-hidden arrow-to-right">
                    <img src="{$static_url}/images/slider-to-right.gif" />
                </div>
                <div class="inactive-pointer ov-hidden arrow-to-right hide">
                    <img src="{$static_url}/images/slider-to-right-inactive.gif" />
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <div id="menu-container">
        {foreach from=$treeItems item=t}
            <div class="menu-item left">
                <div class="menu-item-title"><a href="{$app_url}/{$menuItems[$t.id].url}">{$menuItems[$t.id].menuItemTitle}</a></div>
                <div class="menu-item-bottom"></div>
                {if isset($t.items)}
                    <div class="menu-item-childs hide">
                        <div class="child-side child-side-first left">
                            {foreach from=$t.items item=t1}
                                <div class="menu-item-child {if (isset($t1.items))} menu-item-have-child {/if}" data-el="{$menuItems[$t1.id].r_id}" ><a href="{$app_url}/{$menuItems[$t1.id].url}">{$menuItems[$t1.id].menuItemTitle}</a></div>
                                {if (isset($t1.items))}
                                    <div class="hide menu-item-child-content-{$menuItems[$t1.id].r_id} " >
                                        {foreach from=$t1.items item=t2}
                                            <div class="menu-item-child"><a href="{$app_url}/{$menuItems[$t2.id].url}">{$menuItems[$t2.id].menuItemTitle}</a></div>
                                        {/foreach}
                                    </div>
                                {/if}
                            {/foreach}
                        </div>

                        <div class="child-side child-3-level hide left">

                        </div>
                        <div class="clear"></div>
                    </div>
                {/if}
            </div>
        {/foreach}
        <div class="clear"></div>
    </div>

    {block name="content"}

        <!-- advice container -->

        <div id="advice-container" class="p-relative">



            <div class="advice-items-box">
                <div class="horizontal-slider-container p-relative" id="advice-slider">
                    <div class="p-absolute h-slider-title">Avtofayda</div>
                    <div class="horizontal-slider-wrapper left ov-hidden">
                        <div class="horizontal-slider-ribbon p-relative">
                            {section start=0 name=advices_s step=2 loop=10}
                                {if isset($advices[$smarty.section.advices_s.index])}
                                    <div class="horizontal-slider-item left text-color-blue font14" style="text-align: center;">
                                        <div class="advice-item">
                                            <div class="item item-first left">
                                                <div class="item-top">
                                                    <div class="item-image left">
                                                        <img src="{$public_url}/{$advices[$smarty.section.advices_s.index].image}" />
                                                    </div>
                                                    <a class="item-link" href="{$app_url}/auto/advice/{$advices[$smarty.section.advices_s.index].r_id}">{$advices[$smarty.section.advices_s.index].itemTitle}</a>
                                                    <br/>
                                                    <br/>
                                                    <span class="item-description">{$advices[$smarty.section.advices_s.index].description}</span>
                                                </div>
                                            </div>
                                            <div class="item-splitter left"></div>
                                            {if isset($advices[$smarty.section.advices_s.index + 1])}
                                                <div class="item left">
                                                    <div class="item-top">
                                                        <div class="item-image left">
                                                            <img src="{$public_url}/{$advices[$smarty.section.advices_s.index + 1].image}" />
                                                        </div>
                                                        <a class="item-link" href="{$app_url}/auto/advice/{$advices[$smarty.section.advices_s.index + 1].r_id}">{$advices[$smarty.section.advices_s.index + 1].itemTitle}</a>
                                                        <br/>
                                                        <br/>
                                                        <span class="item-description">{$advices[$smarty.section.advices_s.index + 1].description}</span>
                                                    </div>
                                                </div>
                                            {/if}
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                {/if}
                            {/section}

                            <div class="clear"></div>
                        </div>
                        {if (ceil(count($advices) / 2) > 1)}
                            <div class="horizontal-slider-pointers p-absolute">
                                {section start=0 name=advices_s step=1 loop=ceil(count($advices) / 2)}
                                    {if ($smarty.section.advices_s.index == 0)}
                                        <div class="horizontal-slider-pointer">
                                            <div class="pointer-active ov-hidden"></div>
                                            <div class="pointer-inactive ov-hidden hide"></div>
                                        </div>
                                    {else}
                                        <div class="horizontal-slider-pointer">
                                            <div class="pointer-active ov-hidden hide"></div>
                                            <div class="pointer-inactive ov-hidden"></div>
                                        </div>
                                    {/if}
                                {/section}
                                <div class="clear"></div>
                            </div>
                        {/if}
                    </div>
                    <div class="clear"></div>
                </div>

            </div>


            <div class="advice-items-box" style="margin-top: 20px;">
                <div class="flag_img">
                    <img src="http://avtostop.tv/client/images/flag.png" />
                </div>
                <div class="horizontal-slider-container p-relative" id="advice-slider1">
                    <div class="p-absolute h-slider-title">Sığortalan</div>
                    <div class="horizontal-slider-wrapper left ov-hidden">
                        <div class="horizontal-slider-ribbon p-relative">
                            {section start=0 name=advices_q step=2 loop=10}
                                {if isset($advices1[$smarty.section.advices_q.index])}
                                    <div class="horizontal-slider-item left text-color-blue font14" style="text-align: center;">
                                        <div class="advice-item">
                                            <div class="item item-first left">
                                                <div class="item-top">
                                                    <div class="item-image left">
                                                        <img src="{$public_url}/{$advices1[$smarty.section.advices_q.index].image}" />
                                                    </div>
                                                    <a class="item-link" href="{$app_url}/auto/insurance/{$advices1[$smarty.section.advices_q.index].r_id}">{$advices1[$smarty.section.advices_q.index].itemTitle}</a>
                                                    <br/>
                                                    <br/>
                                                    <span class="item-description">{$advices1[$smarty.section.advices_q.index].description}</span>
                                                </div>
                                            </div>
                                            <div class="item-splitter left"></div>
                                            {if isset($advices1[$smarty.section.advices_q.index + 1])}
                                                <div class="item left">
                                                    <div class="item-top">
                                                        <div class="item-image left">
                                                            <img src="{$public_url}/{$advices1[$smarty.section.advices_q.index + 1].image}" />
                                                        </div>
                                                        <a class="item-link" href="{$app_url}/auto/insurance/{$advices1[$smarty.section.advices_q.index + 1].r_id}">{$advices1[$smarty.section.advices_q.index + 1].itemTitle}</a>
                                                        <br/>
                                                        <br/>
                                                        <span class="item-description">{$advices1[$smarty.section.advices_q.index + 1].description}</span>
                                                    </div>
                                                </div>
                                            {/if}
                                            <div class="clear"></div>
                                        </div>
                                    </div>

                                {/if}
                            {/section}
                            <div class="clear"></div>

                        </div>
                        {if (ceil(count($advices1) / 2) > 1)}
                            <div class="horizontal-slider-pointers p-absolute">
                                {section start=0 name=advices_q step=1 loop=ceil(count($advices1) / 2)}
                                    {if ($smarty.section.advices_q.index == 0)}
                                        <div class="horizontal-slider-pointer">
                                            <div class="pointer-active ov-hidden"></div>
                                            <div class="pointer-inactive ov-hidden hide"></div>
                                        </div>
                                    {else}
                                        <div class="horizontal-slider-pointer">
                                            <div class="pointer-active ov-hidden hide"></div>
                                            <div class="pointer-inactive ov-hidden"></div>
                                        </div>
                                    {/if}
                                {/section}
                                <div class="clear"></div>
                            </div>
                        {/if}
                    </div>
                    <div class="clear"></div>
                </div>
            </div>



            <div class="advice-flag p-absolute">
                <div class="flag-sprite sprite"></div>
            </div>
            <div class="advice-shadow"><img src="{$static_url}/images/advice-box-shadow.png" /></div>

            <div class="faq-title">SUAL-CAVAB</div>
            {*
            <div class="main-faq-container">
                {foreach from=$faq_tree item=ft}
                <div class="faq-menu-item">
                    <img src="{$public_url}/{$faq_items[$ft.id].icon}" class="faq-menu-item-icon" />
                    <a href="{$app_url}/faq/{$faq_items[$ft.id].r_id}">{$faq_items[$ft.id].menuItemTitle}</a>
                    {if (isset($ft.items))}
                    <div class="faq-menu-item-content">
                        {foreach from=$ft.items item=ft1}
                        <div class="item">
                            <div class="menu-item-pointer left"><img src="{$public_url}/{$faq_items[$ft1.id].icon}" /></div>
                            <div class="menu-item"><a href="{$app_url}/faq/{$faq_items[$ft1.id].r_id}">{$faq_items[$ft1.id].menuItemTitle}</a></div>
                        </div>
                        {/foreach}
                    </div>
                    {/if}
                </div>
                {/foreach}
            </div>

            <div class="content-splitter"></div>
            *}
            <div class="not-found-faq-title">
                <span>{*Axtardığınız suala cavab tapmadınız?*}Dj Turala sualını göndər</span>
                <div class="faq-input">



                    <input type="text" id="question-text" maxlength="500" />

                </div>
                <span id="text_counter"></span>
                <div class="right" id="ask-question" class="c-pointer">{*soruş*}göndər</div>
                <div class="clear"></div>
            </div>

        </div>

        <!-- advice container end -->
    {/block}
    </div>
    <div class="right-side right">
        <div class="adv-title">
            <div class="adv-title-item left" >TAPILIB</div>
            <div class="adv-title-item right" >İTİRİLİB</div>
            <div class="clear"></div>
        </div>
        <div class="adv-item-tab">
            {foreach from=$found_adv item=adv}
                <div class="adv-item-container">
                    <div class="item-date">{$adv.date}</div>
                    <div class="item-title"><span>{$adv.itemTitle}</span></div>
                    <div class="item-description">
                        {$adv.description}
                    </div>
                    <div class="item-phone">
                        <div class="item-phone-icon left">
                            <div class="red-phone-icon-sprite sprite"></div>
                        </div>
                        <div class="item-phone-number left">{$adv.phone}</div>
                        <div class="clear"></div>
                    </div>
                </div>
            {/foreach}
            <div style="margin-top: 10px; margin-bottom: 10px; color: #ec1b23;">Tapılmış sənədlər üçün 8155-ə sms göndərin.</div>
            <div class="view-all-advertisements"><a href="{$app_url}/advertisements/found">hamısına bax</a></div>

        </div>
        <div class="adv-item-tab hide">
            {foreach from=$lost_adv item=adv}
                <div class="adv-item-container">
                    <div class="item-date">{$adv.date}</div>
                    <div class="item-title"><span>{$adv.itemTitle}</span></div>
                    <div class="item-description">
                        {$adv.description}
                    </div>
                    <div class="item-phone">
                        <div class="item-phone-icon left">
                            <div class="red-phone-icon-sprite sprite"></div>
                        </div>
                        <div class="item-phone-number left">{$adv.phone}</div>
                        <div class="clear"></div>
                    </div>
                </div>
            {/foreach}
            <div style="margin-top: 10px; margin-bottom: 10px; color: #ec1b23;">İtirilmiş sənədlər üçün 8155-ə sms göndərin.</div>
            <div class="view-all-advertisements"><a href="{$app_url}/advertisements/lost">hamısına bax</a></div>
        </div>
        <div class="calculator-title">KALKULYATORLAR</div>

        <div class="calculator-item" id="calc-custom">
            <div class="calc-icon left">
                <img src="{$static_url}/images/calc-custom.jpg" />
            </div>
            <div class="calc-right right">
                <div class="calc-title" >Gömrük kalkulyatoru</div>
                <div class="calc-description"></div>
            </div>
            <div class="clear"></div>
        </div>

        <div class="calculator-item" id="calc-technical-tb-first-time" >
            <div class="calc-icon left">
                <img src="{$static_url}/images/calc-ins-t.jpg" />
            </div>
            <div class="calc-right right">
                <div class="calc-title">Texniki baxış</div>
                <div class="calc-description"></div>
            </div>
            <div class="clear"></div>
        </div>

        <div class="calculator-item" id="calc-technical-time" >
            <div class="calc-icon left">
                <img src="{$static_url}/images/calc-1.jpg" />
            </div>
            <div class="calc-right right">
                <div class="calc-title">İcbari sığorta</div>
                <div class="calc-description"></div>
            </div>
            <div class="clear"></div>
        </div>

        <div class="youtube-title">
            <img src="{$static_url}/images/archive-title.jpg" />
        </div>

        <div class="youtube">
            <a href="http://www.youtube.com/user/TvAvtostop" target="_blank"><img src="{$static_url}/images/avtostop.jpg" /></a>
        </div>

    </div>
    <div class="clear"></div>
    </div>

    </div>

    <div id="footer" class="relative">
        <img src="{$static_url}/images/footer.png" />
        <div class="p-absolute" style="left: 20px; top: 20px; color: #fff; font-size: 13px; background-color: #666; padding: 30px;">
            Copyright &copy; 2013 Avtostop.tv. All right reserved.<br/>
            Reproduction in whole or in part without permission is prohibited.
        </div>
    </div>

    <div class="block-display hide">
        <div class="message-block p-relative">
            <div class="message-content" id="message-content">

            </div>
            <div class="hide-message-icon hide-message-icon-def p-absolute">
                <img src="{$static_url}/images/close-message.png" onclick="hideMessage()" />
            </div>
        </div>
    </div>
    <!-- Templates -->

    <script type="html/template" id="t-calc-tb-time">
        <div class="calc-field-container ">
            <div class="field">
                <div class="left">
                    <input type="radio"  selected="selected" name="type" id="private-user" />
                </div>
                <div class="left field-own">Fiziki şəxs üçün</div>
                <div class="clear"></div>
            </div>
            <div class="field">
                <div class="left">
                    <input type="radio" name="type" id="company-user" />
                </div>
                <div class="left field-own">Hüquqi şəxs üçün</div>
                <div class="clear"></div>
            </div>

            <div class="field">
                <div class="left">Avtonəqliyyat vasitəsinin növü</div>
                <div class="left select-container field-own">
                    <select id="avto-type">
                        <option value="1">Minik avtomobillərinin və onların bazasında istehsali edilmiş digər avtonəqliyyat vasitələri</option>
                        <option value="2">Avtobuslar, mikroavtobuslar və onların bazasında istehsal edilmiş digər avtonəqliyyat vasitələri</option>
                        <option value="3">Yük avtomobilləri və onların bazasında istehsal edilmiş digər avtonəqliyyat vasitələri</option>
                        <option value="4">Motosikletlər və motorollerlər</option>
                        <option value="5">Qoşqular və yarımqoşqular</option>
                        <option value="6">Traktorlar, yol-tikinti işlərində, meşə və kənd təsərrüfatında istifadə olunan avtonəqliyyat vasitələr</option>
                        <option value="7">Trolleybuslar və tramvaylar</option>
                    </select>
                </div>
                <div class="clear"></div>
            </div>

            <div class="field">
                <div class="left"><input type="checkbox" id="from-another-country" /></div>
                <div class="left field-own-select">Xarici ölkədə qeydiyyata alınmış və Azərbaycan Respublikasına tranzit məqsədilə daxil olan avtonəqliyyat vasitələri üçün. </div>
                <div class="clear"></div>
            </div>

            <div class="field options-fields" id="engine-vol-select">
                <div class="left">Mühərrikin həcmi</div>
                <div class="left select-container field-own">
                    <select id="engine-vol">
                        <option value="1">- 50 sm3 – 1500 sm3</option>
                        <option value="2">- 1501 sm3 – 2000 sm3</option>
                        <option value="3">- 2001 sm3 – 2500 sm3</option>
                        <option value="4">- 2501 sm3 – 3000 sm3</option>
                        <option value="5">- 3001 sm3 – 3500 sm3</option>
                        <option value="6">- 3501 sm3 – 4000 sm3</option>
                        <option value="7">- 4001 sm3 – 4500 sm3</option>
                        <option value="8">- 4501 sm3 – 5000 sm3</option>
                        <option value="9">- 5000 sm3 – dən çox</option>
                    </select>
                </div>
                <div class="clear"></div>
            </div>

            <div class="field hide options-fields" id="passenger-count-select">
                <div class="left">Sərnişin yerlərinin sayı</div>
                <div class="left select-container field-own">
                    <select id="passenger-count">
                        <option value="1">9 – 16</option>
                        <option value="2">16 – dan artıq</option>
                    </select>
                </div>
                <div class="clear"></div>
            </div>

            <div class="field hide options-fields" id="wieght-select">
                <div class="left">Maksimum kütlə</div>
                <div class="left select-container field-own">
                    <select id="weight">
                        <option value="1">3500 kq-dan çox olmadıqda</option>
                        <option value="2">3501 kq – 7 000 kq</option>
                        <option value="3">7000 kq – dan yuxarı</option>
                    </select>
                </div>
                <div class="clear"></div>
            </div>

            <div id="c-result-container">Nəticə: <span>0</span> AZN</div>

            <div id="c-result-calc" onclick="calcIns();">Hesabla</div>

        </div>

        <script>
            $("#avto-type").change(function() {
                var val = parseInt($(this).val());
                $(".options-fields").hide();
                if (val == 1) $("#engine-vol-select").show();
                if (val == 2) $("#passenger-count-select").show();
                if (val == 3) $("#wieght-select").show();
            });
    </script>

    </script>

    <script type="html/template" id="t-calc-custom">
            <table cellspacing="0" cellpadding="0" class="calc">
            <tr>
            <td><div style="font-size: 14px">Status:</div></td>
    <td style="font-size: 14px">
            <select style="border:1px solid #B7B7B8;font-size: 14px;padding: 3px;margin-left: 2px;width: 70px;color: #000000" id="custom_status">
            <option selected="selected" value="1">Yeni</option>
    <option value="2">Köhnə</option>
    </select>
    </td>
    </tr>
            <tr>
    <td style="font-size: 14px">Avtomobilin alınma qiyməti:</td>
    <td style="font-size: 14px">
            <input type="text" onpaste="return false" onkeypress="return isNumberKey(event);" id="custom_price" style="font-size: 14px;padding: 3px;margin-left: 2px;width: 100px;color: #000000"> USD
            </td>
    </tr>
            <tr>
    <td style="font-size: 14px">Mühərrikin işçi həcmi:</td>
    <td style="font-size: 14px">
            <input type="text" onpaste="return false" onkeypress="return isNumberKey(event);" id="custom_engine" style="font-size: 14px;padding: 3px;margin-left: 2px;width: 100px;color: #000000">  sm<sup>3</sup>
    </td>
    </tr>
            <tr>
    <td align="right" style="font-size: 14px">
            1$
    </td>
            <td>
    <div style="font-size: 14px">
            <input type="text" value="0.8" onpaste="return false" onkeypress="return isNumberKey(event);" id="custom_dollar_rate" style="font-size: 14px;padding: 3px;margin-left: 2px;width: 100px;color: #000000"> AZN
            </div>
    </td>
    </tr>
            <tr>
            <td></td>
            <td><input type="button" onclick="calculateCustom();" value="Hesabla" style="font-size: 14px;padding: 3px;margin-left: 2px;width: 70px;color: #000000"></td>
    </tr>
    </table>

    <div id="custom_calc_result"></div>

    </script>
    <script type="html/template" id="t-signin">
        <div class="signin-container">
            <table width="100%">
                <tr>
                    <td colspan="2" align="center"><b>Abunəçilər üçün giriş</b><!--<img src="{$static_url}/images/signin.png" />--></td>
                </tr>
                <tr>
                    <td>
                        E-mail
                    </td>
                    <td>
                        <input type="text" name="email" onpaste="return false" placeholder="E-mail"  id="custom_engine_1" style="font-size: 14px;padding: 3px;margin-left: 2px;width: 100px;color: #000000; width:200px;">
                    </td>
                </tr>
                <tr>
                    <td>
                        Şifrə
                    </td>
                    <td>
                        <input type="password" name="password" placeholder="Şifrə" onpaste="return false"   id="custom_engine_2" style="font-size: 14px;padding: 3px;margin-left: 2px;width: 100px;color: #000000;width:200px;">
                    </td>
                </tr>

                <tr>
                    <td><input type="checkbox" name="remember" id="remember_me"/><label for="remember_me">Məni yadda saxla</label></td><td>
                    <input type="button" onclick="func_send()" value="Giriş"
                           style="font-size: 14px; padding: 3px; margin-left: 2px; width: 70px; color: #000000; cursor: pointer;"></td>
                </tr>
                <tr>
                    <td>Abunən yoxdur?</td>
                    <td><a href="{$app_url}/register">Qeydiyyatdan keç</a></td>
                </tr>
                <tr>
                    <td>Şifrəni unutmusan?</td>
                    <td><a id="restore">Bərpa et</a></td>
                </tr>
            </table>

        </div>
        <div class="forget-container hide">
            <br/>
            <a id="back_to_register">&lt;&lt;Geriyə</a><br/><br/>
            <table>
                <tr>
                    <td>  E-mail
                    </td>
                    <td>
                        <input style=" width:200px;" type="text" name="email" id="forget_email"/>
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input type="button" onclick="" value="Şifrəni göndər" style="font-size: 14px;padding: 3px;margin-left: 2px;width: 150px;color: #000000"/>
                    </td>
                </tr>
            </table>



        </div>
    </script>

    <script type="html/template" id="t-calc-tb-first">
        <div class="calc-field-container ">
            <div class="field">
                <div class="left">Avtonəqliyyat vasitəsinin növü</div>
                <div class="left select-container field-own">
                    <select id="tb-avto-type">
                        <option value="1">Avtonəqliyyаt vаsitəsi</option>
                        <option value="2">Motonəqliyyat vasitələri, traktor, tikintidə, meşə və kənd təsərrüfatında, başqa işlərdə istifadə üçün nəzərdə tutulan özügedən maşınlar, texnoloji, yarış məqsədli idman və digər mexaniki nəqliyyat vasitələri, qoşqular, yarımqoşqu</option>
                    </select>
                </div>
                <div class="clear"></div>
            </div>

            <div class="field options-fields" id="engine-vol-select">
                <div class="left">Mühərrikin həcmi</div>
                <div class="left select-container field-own">
                    <input type="text" id="tb-engine-vol" />
                </div>
                <div class="clear"></div>
            </div>

            <div id="c-result-calc-tb" onclick="calcTech();">Hesabla</div>

            <div id="calc-tb-first-res-1">Yol vergisi: <span>0</span> AZN</div>
            <div id="calc-tb-first-res">Texniki baxış rüsumu: <span>0</span> AZN</div>
            <div id="calc-tb-first-res-2">Nəticə: <span>0</span> AZN</div>
        </div>
    </script>

    <script type="html/template" id="t-calc-tb">
        <br/>
        <br/>
        <br/>
        <table class="calc" cellpadding="0" cellspacing="0">
            <tr>
                <td style="font-size: 14px">Mühərrikin işçi həcmini göstərin</td>
                <td><input style="font-size: 14px;padding: 3px;margin-left: 10px;width: 100px;color: #000000" type="text" name="engine" id="engine" onkeypress="return isNumberKey(event);" onpaste="return false">
                </td><td style="font-size: 14px">kub sm</td>
                <td><input style="font-size: 14px;padding: 3px;margin-left: 4px;width: 100px" type="submit" value="Hesabla" onclick="calculate_tex_baxis()"></td>
            </tr>
            <tr>
                <td id="result_tex_baxis" colspan="4" style="font-size: 14px;padding-top: 5px;padding-bottom: 5px;">Avtomobilin texniki baxış rüsumu : <b>0 AZN dir</b><br></td>
            </tr>
        </table>
    </script>

    <script type="html/template" id="t-player">

                {literal}
                    <div class="" id="player-container" style="position: absolute; top: -10000px;">
            <object width="1" height="1" style="width:01px; height:01px;" id="swfclientid414114613088241" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"> <param value="http://d2iwzbhgddzdwl.cloudfront.net/resources/swfclient/sua.swf" name="movie"> <param value="printfunc=swfclientid414114613088241print&amp;donefunc=swfclientid414114613088241done&amp;0=-osasua:id414114613088241osasua&amp;1=-suaosa:cloudfront.net:id414114613088241suaosa&amp;2=-allowDomain:d2iwzbhgddzdwl.cloudfront.net&amp;3=-allowInsecureDomain:d2iwzbhgddzdwl.cloudfront.net" name="flashvars"> <param value="always" name="AllowScriptAccess"> <param value="transparent" name="wmode"> <embed width="1" height="1" type="application/x-shockwave-flash" flashvars="printfunc=swfclientid414114613088241print&amp;donefunc=swfclientid414114613088241done&amp;0=-osasua:id414114613088241osasua&amp;1=-suaosa:cloudfront.net:id414114613088241suaosa&amp;2=-allowDomain:d2iwzbhgddzdwl.cloudfront.net&amp;3=-allowInsecureDomain:d2iwzbhgddzdwl.cloudfront.net" allowscriptaccess="always" wmode="transparent" name="swfclientid414114613088241" src="http://d2iwzbhgddzdwl.cloudfront.net/resources/swfclient/sua.swf"> </object>
            <object width="900" height="210" type="application/x-shockwave-flash" id="player" name="player" data="http://d2iwzbhgddzdwl.cloudfront.net/resources/player/infinitehd2/player.swf" style="visibility: visible;"><param name="allowFullScreen" value="true"><param name="scale" value="noscale"><param name="allowScriptAccess" value="always"></object>
            <script src="https://d2iwzbhgddzdwl.cloudfront.net/resources/player/infinitehd2/swfobject.js" ></script>
    <script>
        var player_id = "player";
        var player_width = 900;
        var player_height = 210;
        var player_clientList = "trayuse, ophuse, swf";
        var player_stream = "atv_radio";
        var player_streams = [{
            id: "atv_radio",
            stream: "octoshape://streams.octoshape.net/toocast/live/az/atv/radio/2",
            radio: true
        }];
        var player_backgroundImage = "http://www.106-3fm.az/az/images/play.jpg";
        var params = {allowFullScreen: true, scale: "noscale", allowScriptAccess: "always"};
        var attributes = {id: player_id, name: player_id};
        try {
            swfobject.embedSWF(document.location.protocol+"//d2iwzbhgddzdwl.cloudfront.net/resources/player/infinitehd2/player.swf", player_id, player_width, player_height, "10.2.0", null, null, params, attributes);
        } catch (e) {

        }
    </script>
    </div>
    {/literal}

    </script>

    <!-- Templates end -->

    {literal}
    <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-45358884-1']);
    _gaq.push(['_setDomainName', 'avtostop.tv']);
    _gaq.push(['_setAllowLinker', true]);
    _gaq.push(['_trackPageview']);
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
        </script>


    <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function() {
                    try {
                        w.yaCounter22812865 = new Ya.Metrika({id:22812865,
                            clickmap:true,
                            trackLinks:true,
                            accurateTrackBounce:true});
                    } catch(e) { }
                });

                var n = d.getElementsByTagName("script")[0],
                        s = d.createElement("script"),
                        f = function () { n.parentNode.insertBefore(s, n); };
                s.type = "text/javascript";
                s.async = true;
                s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else { f(); }
            })(document, window, "yandex_metrika_callbacks");
        </script>
        <noscript><div><img src="//mc.yandex.ru/watch/22812865" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->

    {/literal}

    <!-- Scripts -->
    <script src="{$static_url}/javascripts/jquery.js"></script>
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>-->
    <script src="{$static_url}/javascripts/template.js"></script>
    <script src="{$static_url}/javascripts/controllers.js"></script>
    <script src="{$static_url}/javascripts/actions.js"></script>
    <script>
        new HorizontalSliderController('#main-slider');
        new HorizontalSliderController('#advice-slider');
        new HorizontalSliderController('#advice-slider1');
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            var left = 500;
            $('#text_counter').text(left+'/500');

            $('#question-text').keyup(function () {

                left = 500 - $(this).val().length;

                if(left < 1){
                    $('#text_counter').addClass("overlimit");
                }
                if(left >= 1){
                    $('#text_counter').removeClass("overlimit");
                }

                $('#text_counter').text(left+'/500');
            });
        });
    </script>
    <!-- Scripts end -->
    ​<script type="text/javascript">
        var addthis_config = addthis_config||{};
        addthis_config.data_track_addressbar = false;
    </script>

    </body>
    </html>
