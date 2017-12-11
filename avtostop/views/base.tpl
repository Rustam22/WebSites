<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Avtostop.tv</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet/less" type="text/css" href="{$static_url}/stylesheets/stylesheets.css" />
    <link href="{$static_url}/images/favicon.png" rel="shortcut icon" type="image/x-icon" />
    <script src="{$static_url}/javascripts/less.js"></script>
    <script type="text/javascript" src="{$static_url}/javascripts/jquery.js"></script>


    <script>
        var app = {};
        app.url = '{$app_url}';
        var fullCount = 10;
        var personCount = '';
        var UsersData = '';
        {if isset($context_cookie.active) and ($context_cookie.active eq 1)}
            var userId = '{$context_cookie.id}';
        {elseif isset($context_session.active) and ($context_session.active eq 1)}
            var userId = '{$context_session.id}';
        {/if}
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

	
	<script type="text/javascript">
        {literal}
        $(document).ready(function() {
            $("body").on( "click", "#restore", function( event ) {
                var email = document.getElementById("custom_engine_1").value;
                //alert(email);
                if(!validateEmail(email)) {
                    showMessage('Xahiş edirik xananı düzgün doldurasınız!');
                    //alert("Xahiş edirik xananı düzgün doldurasınız!");
                    return false;
                }

                $.ajax({
                    type: 'post',
                    url: app.url + '/register/passRecovery',
                    data: 'email=' + email,
                    success: function(data) {
                        showMessage(data);
                        location.reload();
                    }
                });
            });
            function reg_question() {
                var question = document.getElementById("no_auth_question").value.trim();
                if(question.length > 0) {
                    $.ajax({
                        type: 'post',
                        url:  app.url + '/register/regQuestion',
                        data: "question=" + question,
                        success: function(data) {
                            //alert(data);
                        }
                    });
                }
            }
            $("body").on( "click", "#autorization", function( event ) {func_send();});
            function func_send() {
                var email = document.getElementById("custom_engine_1").value.trim();
                var password = document.getElementById("custom_engine_2").value.trim();
                var remember = document.getElementById("remember_me").checked;

                try {
                    var question = document.getElementById("no_auth_question").value.trim();
                }
                catch(err) {
                    var question = '';
                }

                //console.log(question);
                //alert(email + " - " + password + " - " + remember + " - " + question);

                if(!validateEmail(email) || password.length < 5) {
                    showMessage('Xahiş edirik xanaları düzgün doldurasınız!');
                    //alert("Xahiş edirik xanaları düzgün doldurasınız!");
                    return false;
                }

                if(question.length > 0) {

                    $.ajax({
                        type: 'post',
                        url:  app.url + '/register/isLoggedIn',
                        data: "email=" + email + "&password=" + password + "&checked=" + remember + "&question=" + question,
                        success: function(data) {
                            if((data !="cookie") && (data !="session")) {
                                showMessage(data);
                                //alert(data);
                            } else {
                                if(data == "cookie") {
                                    location.reload();
                                } else if(data == "session") {
                                    location.reload();
                                }
                            }
                        }
                    });
                }else {
                    $.ajax({
                        type: 'post',
                        url:  app.url + '/register/isLoggedIn',
                        data: "email=" + email + "&password=" + password + "&checked=" + remember,
                        success: function(data) {
                            if((data !="cookie") && (data !="session")) {
                                showMessage(data);
                                //alert(data);
                            } else {
                                if(data == "cookie") {
                                    location.reload();
                                } else if(data == "session") {
                                    location.reload();
                                }
                            }
                        }
                    });
                }
            }
            function validateEmail(email) {
                var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }
            function userLogout() {
                $.ajax({
                    type: 'post',
                    url:  app.url + '/register/userLogout',
                    data: '',
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        })
        {/literal}
    </script>
	
	
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                type: 'get',
                url:  app.url + '/getUsersData',
                async: false,
                dataType: 'json',
                success: function(data) {
                    UsersData = JSON.parse(JSON.stringify(data));
                    personCount = UsersData.length;
                    console.log(UsersData);
                }
            });
        })
    </script>
</head>
<body>
<div class="center-container">
<div id="top-container">
    {*<h6>{$context_session.name}</h6>
    <h6>{$context_session.surname}</h6>
    <h6>{$context_session.email}</h6>
    <h6>{$context_session.active}</h6>
    <h6>{$context_session.date}</h6>

    <h6>{$context_cookie.name}</h6>
    <h6>{$context_cookie.surname}</h6>
    <h6>{$context_cookie.email}</h6>
    <h6>{$context_cookie.active}</h6>
    <h6>{$context_cookie.date}</h6>*}
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
                <div class="red-button {if (!$live_active)}live-inactive{/if}"  id="in-site" >EFİRDƏ</div>
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
                <img src="{$static_url}/images/more-info-az.png" style="margin-left: 23px; height: 45px;" />
            </div>



            {if isset($context_cookie.active) and ($context_cookie.active eq 1)}
                <div class="right" style="cursor: pointer;">
                    <div class="left" style="margin-left: 5px;">
                        <div style="margin-top: 10px;margin-right: 10px;">
                            {$context_cookie.name}&nbsp&nbsp{$context_cookie.surname}<br>
                            <a onclick="userLogout()" href="{$app_url}/register/userLogout" style="color: rgb(27, 27, 27);">Çıxış</a>
                        </div>
                    </div>
                    <div class="left"><a><img style="width: 41px; margin-right: 10px;" src="{$static_url}/images/signin.png" /></a></div>
                    <div class="clear"></div>
                </div>
				{if isset($competitionTime) and $competitionTime eq true}
                <script type="text/javascript">
                    $(document).ready(function() {
                        var defaultUrl = app.url + '/';
                        var currentUrl = location.href;
                        if(defaultUrl == currentUrl) {
                            {if isset($context_cookie.id) or isset($context_session.id)}
                                {if $user eq "false"}<!--competitionSigninCustomAfterAuthShow();-->{/if}
                            {/if}
                        }
                    })
                </script>
				{/if}
            {elseif isset($context_session.active) and ($context_session.active eq 1)}
                <div class="right" style="cursor: pointer;">
                    <div class="left" style="margin-left: 5px;">
                        <div style="margin-top: 10px;margin-right: 10px;">
                            {$context_session.name}&nbsp&nbsp{$context_session.surname}<br>
                            <a onclick="userLogout()" href="{$app_url}/register/userLogout" style="color: rgb(27, 27, 27);">Çıxış</a>
                        </div>
                    </div>
                    <div class="left"><a><img style="width: 41px; margin-right: 10px;" src="{$static_url}/images/signin.png" /></a></div>
                    <div class="clear"></div>
                </div>
				{if isset($competitionTime) and $competitionTime eq true}
                <script type="text/javascript">
                    $(document).ready(function() {
                        var defaultUrl = app.url + '/';
                        var currentUrl = location.href;
                        if(defaultUrl == currentUrl) {
                            {if isset($context_cookie.id) or isset($context_session.id)}
                                {if $user eq "false"}<!--competitionSigninCustomAfterAuthShow();-->{/if}
                            {/if}
                        }
                    })
                </script>
				{/if}
            {else}
                <div class="right auth-container" style="opacity: 1;">
                    <div class="auth-item left auth-item-active">
                        <div><a>Abunəçilər üçün giriş</a></div>
                    </div>
                    <div class="auth-item left"><a><img src="{$static_url}/images/signin.png" /></a></div>
                    <div class="clear"></div>
                </div>
            {/if}


            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>

<div id="slider-container">

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
</div><br>


     <!------Competition------>
     <script type="text/javascript">
         $(document).ready(function() {
             for(var i = 0; i < UsersData.length; i++) {
                 var userBlock = "<div class='person'>" +
                                     "<p>" + (i+1) + "</p>" +
                                     "<img src='{$app_url}/public" + UsersData[i].image + "'>";
                                     if(UsersData[i].competition_active == "0") {
                                         userBlock += "<p style='text-decoration: line-through; color: rgb(157, 157, 157);'>"
                                                   + UsersData[i].name + "&nbsp" + UsersData[i].surname + "</p>";

                                     } else {
                                         userBlock += "<p>" + UsersData[i].name + "&nbsp" + UsersData[i].surname + "</p>";
                                     }
                                     userBlock += "<div style='clear: both;'></div></div>";
                 $(".competition-block .right-block .participant").append(userBlock);
             }

             for(var i = personCount; i < fullCount; i++) {
                 var txt = "<div class='empty-person'><p>" + (i+1) + "</p><p>boşdur</p> <div style='clear: both;'></div></div>";
                 $(".competition-block .right-block .participant").append(txt);
             }

             $(".right-block img").error(function() {
                 $(this).attr("src", "{$static_url}/competition/no-face.png");
                 $(this).css({
                     "width": "30px",
                     "margin-left": "-2px"
                 });
             });
         })
     </script>
	 {*}{if isset($competitionTime) and $competitionTime eq true}
		 <div class="competition-block">
			 <div class="left-block">
				 <div class="headers">
					 {if isset($context_cookie.id) or isset($context_session.id)}
						 {if $user eq "true"}<button class="begin-test-button-1">Siz Müsabiqədəsiz</button>
						 {elseif $user eq "false"}<button class="out">ƏTRAFLI</button>{/if}
					 {else}<button class="out">ƏTRAFLI</button>{/if}
				 </div>
			 </div>
			 <div class="right-block">
				 <div class="participant">

					 <!-- Append -->
				 </div>
			 </div>
		 </div><br>
	 {/if}*}


<div class="left-side left">

<style>
    iframe {
        width: 700px !important;
        height: 300px !important;
    }
</style>
{$iframe}


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
            <img src="{$app_url}/client/images/flag.png" />
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




    <!-- DYP Block Begin -->
    {literal}
        <style type="text/css">
            .uploadFileds {
                width: 205px;
                margin-top: 55px;
            }
            .uploadFileds .check-file {
                margin: 0;
                margin-top: -40px;
            }
            .uploadFileds .check-file input {
                display: none;
            }
            .uploadFileds .check-file a{
                color: red;
                text-decoration: underline;
                cursor: pointer;
            }
            .uploadFileds .check-file a p {
                color: red;
                font-weight: 100;
                font-size: 16px;
            }
            .uploadFileds .check-file a img{
                width: 19px;
                margin: -16px 0px 0px 0px;
            }
            .uploadFileds .check-file:not(:first-child) {
                display: none;
            }
        </style>
        <script type="text/javascript" src="{/literal}{$app_url}/client/javascripts/jqueryForm.js{literal}"></script>
        <script>
            (function() {
                var bar = $('.bar');
                var percent = $('.percent');
                var status = $('#status');

                $('#sendQuestionWithFiles').ajaxForm({
                    beforeSend: function() {
                        status.empty();
                        var percentVal = '0%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        var percentVal = percentComplete + '%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    success: function(data) {
                        //alert(data);
                        var percentVal = '100%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    complete: function(xhr) {
                        status.html(xhr.responseText);
                    }
                });
            })();
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                var count = 0;
                $(".uploadFileds .check-file a").click(function() {

                    var currentId = $(this).attr("id");
                    $(".uploadFileds #" + currentId + " input").trigger("click");
                    $(".uploadFileds #" + currentId + " input").change(function() {
                        var fileName = $(".uploadFileds #" + currentId + " input").val().split('/').pop().split('\\').pop();
                        if(fileName.length > 23) {fileName = fileName.substring(0, 20) + "...";}

                        if(fileName.length == 0) {
                            $(".uploadFileds #" + currentId + " a p").html(fileName);
                            $("input").remove("#" + currentId);
                            $("img").remove("." + currentId);
                        } else {
                            $(".uploadFileds #" + currentId + " a p").html(fileName);
                        }
                        //$("#submit").trigger("click");
                        count++;
                        addFileChangeField(count);
                    });
                });
                function addFileChangeField(value) {
                    if(value < 3) {
                        $(".uploadFileds .check-file:eq(" + value + ")").css("display", "block");
                    }
                }
            })
        </script>
    {/literal}


    <div class="dyp">
    <div class="middle-line"></div>
    <div class="flag_img">
        <img src="{$app_url}/client/images/flag.png" />
    </div>
    <p>SUAL-CAVAB</p>
    <div class="block-both">
    <div class="block-left">
        {if isset($context_cookie.active) and ($context_cookie.active eq 1)}
            <div class="not-found-faq-title">
                <span>{*Axtardığınız suala cavab tapmadınız?*}Dj Turala sualını göndər</span>
                <div class="faq-input">
                    <textarea id="no_auth_question" maxlength="1000">{if isset($question)}{$question}{/if}</textarea>

                    {if isset($context_cookie.email)}
                        <input type="hidden" id="question-email" value="{$context_cookie.email}" />
                    {/if}
                </div>

                <div class="uploadFileds">
                    <form id="sendQuestionWithFiles" enctype="multipart/form-data" action="{$app_url}/sendQuestionWithFiles/add" method="POST">
                        <div class="check-file" id="file11">
                            <a id="file11">
                                <p id="file11">Fayl yüklə</p>
                                <img class="file11" src="{$app_url}/client/images/clip.png">
                            </a>
                            <input type="file" name="file11" id="file11">
                        </div><br>
                        <div class="check-file" id="file12">
                            <a id="file12">
                                <p id="file12">Fayl yüklə</p>
                                <img class="file12" src="{$app_url}/client/images/clip.png">
                            </a>
                            <input type="file" name="file12" id="file12">
                        </div><br>
                        <div class="check-file" id="file13">
                            <a id="file13">
                                <p id="file13">Fayl yüklə</p>
                                <img class="file13" src="{$app_url}/client/images/clip.png">
                            </a>
                            <input type="file" name="file13" id="file13">
                        </div><br>
                        <input type="submit" id="submit" value="Upload" style="display: none;">
                    </form>
                </div>

                <span id="text_counter" style="display: none;"></span>
                <div class="right" id="ask-question" style="cursor: pointer;position: absolute;left: 235px;bottom: 5px;">{*soruş*}göndər</div>
                <div class="clear"></div>
            </div>
        {elseif isset($context_session.active) and ($context_session.active eq 1)}
            <div class="not-found-faq-title">
                <span>{*Axtardığınız suala cavab tapmadınız?*}Dj Turala sualını göndər</span>
                <div class="faq-input">
                    <textarea id="no_auth_question" maxlength="1000">{if isset($question)}{$question}{/if}</textarea>

                    {if isset($context_session.email)}
                        <input type="hidden" id="question-email" value="{$context_session.email}" />
                    {/if}
                </div>


                <div class="uploadFileds">
                    <form id="sendQuestionWithFiles" enctype="multipart/form-data" action="{$app_url}/sendQuestionWithFiles/add" method="POST">
                        <div class="check-file" id="file11">
                            <a id="file11">
                                <p id="file11">Fayl yüklə</p>
                                <img class="file11" src="{$app_url}/client/images/clip.png">
                            </a>
                            <input type="file" name="file11" id="file11">
                        </div><br>
                        <div class="check-file" id="file12">
                            <a id="file12">
                                <p id="file12">Fayl yüklə</p>
                                <img class="file12" src="{$app_url}/client/images/clip.png">
                            </a>
                            <input type="file" name="file12" id="file12">
                        </div><br>
                        <div class="check-file" id="file13">
                            <a id="file13">
                                <p id="file13">Fayl yüklə</p>
                                <img class="file13" src="{$app_url}/client/images/clip.png">
                            </a>
                            <input type="file" name="file13" id="file13">
                        </div><br>
                        <input type="submit" id="submit" value="Upload" style="display: none;">
                    </form>
                </div>

                <span id="text_counter" style="display: none;"></span>
                <div class="right" id="ask-question" style="cursor: pointer;position: absolute;left: 235px;bottom: 5px;">{*soruş*}göndər</div>
                <div class="clear"></div>
            </div>
        {else}
            <div class="left-block-inside">
                <span style="color: #000; font-weight: bold;">Dj Turala sualını göndər</span><br>
                <textarea id="no_auth_question" maxlength="1000"></textarea>
                            <span class="after-change-file" style="float: left;">
                                <a style="text-decoration: underline; color: red; cursor: pointer;">
                                    <img src="{$app_url}/client/images/clip.png" style="width: 19px; margin: 13px 5px -4px 4px;"><span>Fayl yüklə</span>
                                </a><br><br>
                                <input type="file" name="file" style="display: none;">
                            </span>
                <div class="right auth-container">
                    <div class="auth-item left auth-item-active">
                        <div><a>göndər</a></div>
                    </div>
                </div>
            </div>
        {/if}
    </div>
    <div class="block-right">
        {if isset($success)}
            {if ($success eq 1)}
                <script type="text/javascript">
                    window.scrollTo(0, 1000);
                </script>
                <span id="success" style="color:red;font-size:18px;margin-top:-30px;margin-bottom:10px;display: block;">
                                Müraciətiniz qəbul olundu.
                            </span>
            {else}
                <span style="color:red;font-size:18px;margin-top:-30px;margin-bottom:10px;display: block;">Xanaları düzgün doldurun.</span>
            {/if}
        {/if}
        <span style="color: #000; font-weight: bold;">DYP-yə onlayn şikayət göndər</span><br>

        <style type="text/css">
            .dyp-file-fields {
                width: 205px;
                margin-top: 55px;
            }
            .dyp-file-fields .check-file {
                margin: 0;
                margin-top: -40px;
            }
            .dyp-file-fields .check-file input {
                display: none;
            }
            .dyp-file-fields .check-file a{
                color: red;
                text-decoration: underline;
                cursor: pointer;
            }
            .dyp-file-fields .check-file a p {
                color: red;
                font-weight: 100;
                font-size: 16px;
            }
            .dyp-file-fields .check-file a img{
                width: 19px;
                margin: -16px 0px 0px 0px;
            }
            .dyp-file-fields .check-file:not(:first-child) {
                display: none;
            }
        </style>
        {literal}
            <script type="text/javascript">
                $(document).ready(function() {
                    var count = 0;
                    $(".dyp-file-fields .check-file a").click(function() {

                        var currentId = $(this).attr("id");
                        $(".dyp-file-fields #" + currentId + " input").trigger("click");
                        $(".dyp-file-fields #" + currentId + " input").change(function() {
                            var fileName = $(".dyp-file-fields #" + currentId + " input").val().split('/').pop().split('\\').pop();
                            if(fileName.length > 23) {fileName = fileName.substring(0, 20) + "...";}

                            if(fileName.length == 0) {
                                $(".dyp-file-fields #" + currentId + " a p").html(fileName);
                                $("input").remove("#" + currentId);
                                $("img").remove("." + currentId);
                            } else {
                                $(".dyp-file-fields #" + currentId + " a p").html(fileName);
                            }
                            //$("#submit").trigger("click");
                            count++;
                            addFileChangeField(count);
                        });
                    });
                    function addFileChangeField(value) {
                        if(value < 3) {
                            $(".dyp-file-fields .check-file:eq(" + value + ")").css("display", "block");
                        }
                    }
                })
            </script>
        {/literal}

        <form enctype="multipart/form-data" action="{$app_url}/onlineComplaint/add" method="POST">
            <input type="text" name="full_name" id="full_name" placeholder="Ad, Soyad">
            <input type="text" name="new_mail" id="new_mail" placeholder="Email">
            <input type="text" name="mobile2" id="mobile2" placeholder="Mobil">
            <textarea maxlength="5000" placeholder="Mövzu" name="complaint_text" id="complaint_text"></textarea>

            <div class="dyp-file-fields">
                <div class="check-file" id="file21">
                    <a id="file21">
                        <p id="file21">Fayl yüklə</p>
                        <img class="file21" src="{$app_url}/client/images/clip.png">
                    </a>
                    <input type="file" name="file21" id="file21">
                </div><br>
                <div class="check-file" id="file22">
                    <a id="file22">
                        <p id="file22">Fayl yüklə</p>
                        <img class="file22" src="{$app_url}/client/images/clip.png">
                    </a>
                    <input type="file" name="file22" id="file22">
                </div><br>
                <div class="check-file" id="file23">
                    <a id="file23">
                        <p id="file23">Fayl yüklə</p>
                        <img class="file23" src="{$app_url}/client/images/clip.png">
                    </a>
                    <input type="file" name="file23" id="file23">
                </div><br>
            </div>

            <button class="submit_button" id="submit_button">göndər</button>
            <input type="hidden" name="csrf_key" id="csrf-key" value="{$csrf_key}" />
        </form>
    </div>
    </div>
    </div>
    <!-- DYP Block END -->



    <!-- Sual Gonder Start-->
    <!--<div class="faq-title">SUAL-CAVAB</div>
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
			{if isset($context_cookie.active) and ($context_cookie.active eq 1)}
				<div class="not-found-faq-title">
					<span>{*Axtardığınız suala cavab tapmadınız?*}Dj Turala sualını göndər</span>
					<div class="faq-input">
						<input type="text" id="question-text" maxlength="" value="{if isset($question)}{$question}{/if}"/>
						{if isset($context_cookie.email)}
							<input type="hidden" id="question-email" value="{$context_cookie.email}" />
						{/if}
					</div>
					<span id="text_counter" style="display: none;"></span>
					<div class="right" id="ask-question" style="cursor: pointer;">{*soruş*}göndər</div>
					<div class="clear"></div>
				</div>

			{elseif isset($context_session.active) and ($context_session.active eq 1)}
				<div class="not-found-faq-title">
					<span>{*Axtardığınız suala cavab tapmadınız?*}Dj Turala sualını göndər</span>
					<div class="faq-input">
						<input type="text" id="question-text" maxlength="" value="{if isset($question)}{$question}{/if}"/>
						{if isset($context_session.email)}
							<input type="hidden" id="question-email" value="{$context_session.email}" />
						{/if}
					</div>
					<span id="text_counter" style="display: none;"></span>
					<div class="right" id="ask-question" style="cursor: pointer;">{*soruş*}göndər</div>
					<div class="clear"></div>
				</div>
			{else}

				<div>
					<span style="color: #000; font-weight: bold;">Dj Turala sualını göndər</span><br>
					<input style="width: 100%;
								  height: 20px;
								  border: 1px solid #666666;
								  margin-top: 10px;
								  background-color: #ededed;" type="text" id="no_auth_question" maxlength="500">
					<div class="right auth-container" style="border: 1px solid red;
															 color: red;
															 font-weight: bold;
															 width: 50px;
															 cursor: pointer;
															 margin-top: 10px;
															 padding: 3px 10px;
															 float: right;">
						<div class="auth-item left auth-item-active">
						   <div><a>göndər</a></div>
						</div>
					</div>
				</div>
			{/if}-->
    <!-- Sual Gonder End-->


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

    <div class="calculator-item" id="calc-kasko" >
        <div class="calc-icon left">
            <img src="{$static_url}/images/ks.png" />
        </div>
        <div class="calc-right right">
            <div class="calc-title">KASKO sığorta</div>
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
<div style="width: 100%; border-top: 1px solid red;">
</div>
<br>
<div style="width: 100%;">
    {literal}
        <a href="http://bit.ly/1B9n7Ka" target="itunes_store" style="display:inline-block;overflow:hidden;background:url(http://linkmaker.itunes.apple.com/htmlResources/assets/en_us//images/web/linkmaker/badge_itunes-lrg.png) no-repeat;width:110px;height:40px;@media only screen{background-image:url(http://linkmaker.itunes.apple.com/htmlResources/assets/en_us//images/web/linkmaker/badge_itunes-lrg.svg);}"></a>
    {/literal}
    <a href="https://soundcloud.com/dj-tural" target="_blank"><img src="{$app_url}/client/images/orange.png"></a>
    <a href="https://play.google.com/store/apps/details?id=com.avto.avtostop" target="_blank" style="text-decoration: none;">
        <img style="height: 40px;" src="{$app_url}/client/images/google_play.png">
    </a>
    <a href="http://appsto.re/az/KuMZ4.i" target="_blank" style="text-decoration: none;">
        <img style="height: 40px;" src="http://s3.amazonaws.com/37assets/svn/1161-download-on-the-app-store.png">
    </a>
    <br>
    <br>
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

{literal}
<!-- Competiiton Template Script -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".adv-title-1 .current-user img").error(function() {
            $(this).attr("src", app.url + "/client/competition/no-face.png");
            $(this).css({
                "width": "30px",
                "margin-left": "-2px"
            });
        });
    })
</script>
{/literal}

<script type="html/template" id="t-competition">
    <div class="competition-template-header">
        <div class="adv-title">
            <div class="adv-title-item left">ŞƏRTLƏR</div>
            <div class="adv-title-item right">İŞTİRAKÇILAR</div>
            <div class="clear"></div>
        </div>

        <div id="t-dynamic-content">

        </div>
    </div>
</script>
<script type="html/template" id="t-competition-after-auth-1">
    <div class="competition-template-header">
        <p class="middle-text-start">
            Müsabiqənin iştirakçısı olmaq üçün yol-hərəkat qaydaları mövzusunda test imtahanından
            keçmək lazımdır. Test imtahan 10 sualdan ibarətdir. Bir səhv etmək hüququ var, yani test
            imtahanından keçmək üçün 9 sualı düzgün cavablandırmaq lazımdır. Uğurlar!
        </p>
        <button class="begin-test-button">TEST İMTAHANA BAŞLA</button>
    </div>
</script>




<script type="html/template" id="t-competition-after-auth-2">
    <div class="competition-template-header">
        <div class="adv-title-1">
            <div class="adv-title-item-1 left">TEST İMTAHAN</div>
            <div class="current-user left">
                {if isset($context_cookie.active) and ($context_cookie.active eq 1)}
                    <img src="{$app_url}/public{$context_cookie.image}">
                    <p>{$context_cookie.name}&nbsp;&nbsp;{$context_cookie.surname}</p>
                {elseif isset($context_session.active) and ($context_session.active eq 1)}
                    <img src="{$app_url}/public{$context_session.image}">
                    <p>{$context_session.name}&nbsp;&nbsp;{$context_session.surname}</p>
                {/if}
            </div><div class="clear"></div><br><br>

            <div class="question">
                <!--<p>Sual 1:</p>
                <h2>"Yol verin" tələbi nəyi bildirir?</h2><br>
                <div class="options">
                    <input type="radio" name="answer[]"  id="first"  value="23745">
                    <div>Siz hökmən dayanmalısınız ki, digər yol hərəkət iştirakçılarını buraxasınız.</div><br><br>
                    <input type="radio" name="answer[]" id="second" value="85483">
                    <div>Siz hərəkətə başlamamalısınız, hərəkəti davam etdirməməlisiniz və ya digər manevrlər
                        etməməlisiniz - əgər bu hərəkətləriniz Sizə nisbətən üstünlüyə malik olanları qəflətən
                        hərəkətin istiqamətini və ya sürəti dəyişməyə məcbur edəcəksə.</div>
                </div><div class="clear"></div><br><br><br>

                <div class="true-answer">
                     <p>Cavab doğrudur</p><br>
                     <span>
                          "Yol vermək" tələbi yaranmış konkret şəraitdən asılı olaraq müxtəlif formada yerinə yetirilə
                          bilər, ancaq hər dəfə hökmən dayanmağa məcbur etmir. Yol vermək sürücünün hərəkəti
                          davam etdirməsi və ya yenidən hərəkətə başlaması, hər hansı manevr etməsi başqa NV-nin
                          sürücülərini qəflətən hərəkət istiqamətini və ya sürəti dəyişdirməyə məcbur edəcəyi halda
                          onun hərəkəti davam etdirməməsi və ya yenidən hərəkətə başlamaması, manevr
                          etməməsidir. Əsas şərt ondan ibarətdir ki, üstünlüyə malik olan digər NV-nin hərəkəti üçün
                          maneə yaradılmasın (m. 1.41).
                     </span>
                </div>-->
            </div>

            <div class="expectation">
                <button class="answering">CAVABLANDIR</button>
                <button class="next-question">>>></button>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</script>


<script type="html/template" id="dynamic-content-1">
    <div class="dynamic-content">
        <h3>Müddət:</h3>
        <span>Müsabiqə 1 aprel – 28 may 2015-ci il tarixində keçiriləcəkdir.</span>
        <h3>İştirakçılar:</h3>
            <span>
                İştirakçı olmaq üçün sayta abunə olmaq və 10 test sualından 9-na düzgün cavab vermək lazımdır.
                İştirakçının sürücülük vəsiqəsi və ona məxsus olan avtomobili olmalıdır. İştirakçıların sayı 10-dur.
            </span>
        <h3>Hədiyyə:</h3>
        <span>Müsabiqədə qalib olan şəxs 2 nəfərə 5 günlük Praqaya səyahət əldə edəcək.</span>
        <h3>Şərtlər:</h3>
            <span>
                Müsabiqənin müddəti ərzində hər iştirakçının avtomobilinə xüsusi qurğu quraşdırılır və bu qurğu
                vasitəsilə avtomobilin sürəti ölçülür. Sürət həddinin aşmasına görə iştirakçılar cərimə xalları alırlar.
                Hər bir iştirakçı gün ərzində ən azı ... km. məsafə qət etməlidir. Hər həftənin nəticəsinə görə ən
                çox cərimə balı toplayan iştırakçı müsabiqəni tərk edir. Sonuncu iştirakçı qalib olur.
            </span>
        <h2 style="color: red;">...</h2>
        <!--<button>İŞTİRAKÇI OL</button>-->
    </div>
</script>
<script type="html/template" id="dynamic-content-2">
    <br>
    <div class="dynamic-content">
        <table cellpadding="0" cellspacing="0">
            <thead>
                <th>Sıra sayı</th>
                <th>İştirakçının adı və soyadı</th>
                <th>Cərimə balları</th>
                <th>Qət edilən məsafə, km.</th>
                <th>Avtomobilin markası və modeli</th>
            </thead>

        </table><br><br>
        <!--<button>İŞTİRAKÇI OL</button>-->
    </div>
</script>

<div class="competition-block-display hide">
    <div class="competition-message-block p-relative">
        <div class="competition-message-content" id="competition-message-content">

        </div>
        <div class="hide-message-icon hide-message-icon-def p-absolute">
            <img src="{$static_url}/images/close-message.png" onclick="competitionHideMessage()" />
        </div>
    </div>
</div>
<!-- Templates -->
<style type="text/css">
    .kasko button{
        background-color: #CCCCCC;
        color: #000000;
        margin-top: 20px;
        padding: 5px;
        text-align: center;
        width: 100px;
        cursor: pointer;
        border: none;
    }
    .kasko .result {
        width: 100%;
        height: 1px;
        border-top: 1px solid #ffffff;
        margin-top: 10px;
        padding-top: 8px;
        margin-bottom: 15px;
        font-size: 20px;
    }
    .kasko #hSend {
        margin: 0px;
        float: right;
    }
    .kasko .result #inner-block {
        display: none;
    }
    .kasko .result #inner-block .initials {
        margin-top: 10px;
    }
    .kasko .result #inner-block .initials, .initials input {
        float: right;
    }
</style>
<script type="html/template" id="t-calc-tb-kasko">
    <div class="calc-field-container">
        <div class="kasko">
            <table>
                <tr>
                    <td>Buraxılış ili: </td>
                    <td>
                        <select class="select" name="bi" id="bi">
                            <option value="">--</option>
                            <option value="2005">1998 - 2005</option>
                            <option value="2014">2006 - 2014</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Orta bazar qiyməti: </td>
                    <td>
                        <input type="text" name="sm" id="sm" onpaste="return false" onkeypress="return isNumberKey(event);">
                    </td>
                </tr>
                <tr>
                    <td>Franşıza məbləği: </td>
                    <td>
                        <select class="select" name="fr" id="fr">
                            <option value="0">0</option>
                            <option value="1">100</option>
                            <option value="2">150</option>
                            <option value="3">200</option>
                            <option value="4">250</option>
                            <option value="5">300</option>
                            <option value="6">500</option>
                            <option value="7">750</option>
                            <option value="8">1000</option>
                            <option value="9">1500</option>
                            <option value="10">2000</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Siğorta müddəti: </td>
                    <td>
                        <select class="select" name="md" id="md">
                            <option value="">--</option>
                            <option value="1">1 ay</option>
                            <option value="2">2 ay</option>
                            <option value="3">3 ay</option>
                            <option value="4">4 ay</option>
                            <option value="5">5 ay</option>
                            <option value="6">6 ay</option>
                            <option value="7">7 ay</option>
                            <option value="8">8 ay</option>
                            <option value="9">9 ay</option>
                            <option value="10">10 ay</option>
                            <option value="11">11 ay</option>
                            <option value="12">1 il</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="button" id="hbutton" class="ui-btn ui-shadow ui-corner-all">Hesabla</button></td>
                </tr>
            </table>
            <div class="result">
                <div id="inner-block">
                    Cəmi: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="hsmv"></span>
                    <a href="http://online.bakisigorta.az" target="_blank">
                        <button type="button" id="hSend">Onlayn sifariş</button>
                    </a>
                    <!--<div style="clear: both;"></div>
                    <div class="initials">
                        <input type="text" name="full_name" id="full_name" placeholder="Ad, Soyad"><br>
                        <input type="text" name="new_mail" id="new_mail" placeholder="Email"><br>
                        <input type="text" name="mobile" id="mobile" placeholder="Mobil"><br>
                    </div>-->
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            function isNumberKey(evt) {
                var charCode = (document.all) ? event.keyCode :  evt.which;
                if((charCode > 31
                        && (charCode < 48 || charCode > 57)
                        || charCode==46)
                        && charCode!=40 && charCode!=41 && charCode!=45 &&  charCode!=43&&  charCode!=46)
                    return false;
                return true;
            }

            var ak=1.2;
            var st=1.25;
            var ss=1.1;
            var bt1=[4,3,2.96,2.93,2.89,2.85,2.72,-1,2.6,2.5,2.4];
            var bt2=[4.4,3.4,3.35,3.3,3.25,3.2,2.9,-1,2.65,2.54,2.43];
            var bt3=[4.7,-1,-1,-1,-1,3.65,3.5,3.34,3.12,2.88,2.75];
            var bt21=[4.12,3.09,3.05,3.02,2.98,2.94,2.8,-1,2.68,2.58,2.47];
            var bt22=[4.53,3.5,3.45,3.4,3.35,3.3,2.99,-1,2.73,2.62,2.5];
            var bt23=[4.84,-1,-1,-1,-1,3.76,3.61,3.44,3.21,2.95,2.86];
            var frs=[0,100,150,200,250,300,500,750,1000,1500,2000];
            var mds=[0,25,35,40,45,50,60,70,80,85,90,95,100];
            var maxsm=120000;
            var minsm=5000;

            function recalc(event) {
                var sm2 = parseFloat(1 * document.getElementById("sm").value);
                var bi2 = document.getElementById("bi").value;
                var fr2 = document.getElementById("fr").value;
                var md2 = document.getElementById("md").value;

                if(sm2>=minsm && sm2<=maxsm && bi2>0 && md2>0) {
                    if(sm2<=30000){
                        if(bi2==2005) {
                            var bt=bt21[fr2];
                        } else {
                            var bt=bt1[fr2];
                        }
                    }else if(sm2<=60000) {
                        if(bi2==2005) {
                            var bt=bt22[fr2];
                        }else {
                            var bt=bt2[fr2];
                        }
                    } else if(sm2<=120000) {
                        if(bi2==2005) {
                            var bt=bt23[fr2];
                        }else {
                            var bt=bt3[fr2];
                        }
                    }else {
                        var bt=-1;
                    }
                    if(bt==-1) {
                        document.getElementById("hsmv").innerHTML = "<span>?</span>" + " AZN";
                        return;
                    }

                    var bsm = sm2*bt/100;
                    var akm = sm2*bt*ak/100 - bsm;
                    var stm = sm2*bt*st/100 - bsm;
                    var usm = bsm;
                    var hsm = usm*mds[md2]/100;
                    var hsm = Math.round(hsm * 100) / 100;

                    document.getElementById("hsmv").innerHTML = hsm + " AZN";
                }
            }

            document.getElementById("hbutton").onclick = function() {
                document.getElementById("inner-block").style.display = "block";
                /*$(".kasko .result").css("height", "100px");*/
                recalc(event);
                var result_pay = document.getElementById("hsmv").innerHTML.trim();
                var count = 0;
                /*document.getElementById("hSend").onclick = function() {
                 count++;
                 if(result_pay.length > 4) {
                 var bi = document.getElementById("bi"); bi = bi.options[bi.selectedIndex].text;
                 var sm = document.getElementById("sm").value;
                 var fr = document.getElementById("fr"); fr = fr.options[fr.selectedIndex].text;
                 var md = document.getElementById("md"); md = md.options[md.selectedIndex].text;

                 if(count == 1) {
                 $.ajax({
                 type: "post",
                 url:  app.url + "/register/kaskoSender",
                 async: false,
                 data: "bi=" + bi + "&sm=" + sm + "&fr=" + fr + "&md=" + md,
                 success: function(data) {
                 if(data == "success") {
                 alert("Məlumat göndərildi");
                 } else {
                 alert("Təyin olunmamış səhv");
                 }
                 },
                 error: function (status) {
                 alert("Təyin olunmamış səhv");
                 }
                 });
                 }
                 }
                 }*/
            }
        });
</script>

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

<script type="html/template" id="t-user-activation-op">
    <div class="signin-container">
        <p>&nbsp;Siz öz iniciallarınızı dəyişə bilərsiniz</p><br>
        <div class="user-activation-block">
            <table>
                <tbody>
                <tr>
                    <td>Ad: </td>
                    <td><input type="text" name="name" id="name" minlength="3"></td>
                </tr>
                <tr>
                    <td>Soyad: </td>
                    <td><input type="text" name="surname" id="surname" minlength="3"></td>
                </tr>
                <tr>
                    <td>E-mail: </td>
                    <td><input type="text" name="email" id="email"></td>
                </tr>
                <tr>
                    <td>Mobil telefon: </td>
                    <td><input type="text" name="mobile" id="mobile"></td>
                </tr>
                </tbody>
            </table>
            <input type="button" value="Təsdiq"><br>
        </div>
    </div>
</script>
<script type="html/template" id="t-user-activation-op-2">
    <div class="signin-container">
        <p>&nbsp;Sizin telefon nömrənizə təsdiq kodu göndərilmişdir.</p><br>
        <div class="user-activation-block">
            <table>
                <tbody>
                <tr>
                    <td>Təsdiq kodun daxil edin: </td>
                    <td><input type="text" name="approve_code-op" id="approve_code-op" maxlength="5" class="reg_input"></td>
                </tr>
                </tbody>
            </table><br>
            <input type="button" class="button-2" value="Təsdiq"><br>
        </div>
    </div>
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
                <td><input type="checkbox" name="remember" id="remember_me"/>
                    <label for="remember_me">Məni yadda saxla</label>
                </td>
                <td>
                    <input type="button" onclick="func_send()"  id="autorization" value="Giriş"
                           style="font-size: 14px;padding: 3px;margin-left: 2px;width: 70px;color: #000000;cursor: pointer;">
                </td>
            </tr>
            <tr>
                <td>Abunən yoxdur?</td>
                <td><a href="{$app_url}/register" onclick="reg_question();" style="">Qeydiyyatdan keç</a></td>
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
                    <input type="button" onclick="" value="Şifrəni göndər" style="cursor:pointer;font-size: 14px;padding: 3px;margin-left: 2px;width: 150px;color: #000000"/>
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

        <!--<div id="calc-tb-first-res-1">Yol vergisi: <span>0</span> AZN</div>-->
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



{literal}
<script type="html/template" id="t-player">
    <object type="application/x-shockwave-flash" data="http://85.132.81.184:8080/flu/jwplayer.swf" width="640" height="480" id="video" style="visibility: hidden;"><param name="allowFullScreen" value="true"><param name="allowNetworking" value="all"><param name="flashvars" value="file=atv2&amp;streamer=rtmp://85.132.81.184:1935/radio&amp;rtmp.tunneling=false&amp;autostart=true"></object>
</script>
{/literal}
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

<script type="text/javascript" src="{$app_url}/client/javascripts/jquery.maskedinput.js"></script>
<script type="text/javascript">
    jQuery(function($){
        //$("#date").mask("99/99/9999");
        $("#mobile2").mask("(099) 999-99-99");
        //$("#tin").mask("99-9999999");
        //$("#approve_code").mask("99999");
    });
</script>
{literal}
    <script type="text/javascript">
        $(document).ready(function() {

            function validateEmail(email) {
                var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }
            function paintToRedColor(id) {
                document.getElementById(id).style.borderColor = "red";
            }

            $("body").on( "click", "#changeFile", function( event ) {
                $("#file").trigger("click");
            });

            $("body").on( "change", "#file", function( event ) {
                var url = document.getElementById("file").value.trim();
                $("#changeFile span").html(url);
            });

            /*$("body").on( "change", "#file", function( event ) {
             var url = document.getElementById("file").value.trim();
             $("#file").css("display", "none");
             $("#maxSize").css("display", "none");
             $(".after-change-file").append("<a id='changeFile' style='color: red; display: block; margin: 12px 0px; text-decoration: underline;'>" + url + "</a>");
             });

             $("body").on( "click", "#changeFile", function( event ) {
             $(".after-change-file").html("<input type='file' name='file' id='file' style='border: none; float: left; width: 58%; margin-left: -5px; margin-top: 0px;'><span id='maxSize' style='margin-top: 9px; display: block;'>(max 3 MB)</span><br>");
             });*/

            document.getElementById("submit_button").onclick = function() {
                var full_name = document.getElementById("full_name").value.trim();
                var new_mail = document.getElementById("new_mail").value.trim();
                var mobile = document.getElementById("mobile2").value.trim();
                var complaint_text = document.getElementById("complaint_text").value.trim();
                var file = document.getElementById("file").value.trim();

                //alert(document.getElementById("file").value);

                if(full_name.length < 5) {paintToRedColor("full_name"); return false;}
                if(!validateEmail(new_mail)) {paintToRedColor("new_mail"); return false;}
                if(mobile.length < 5) {paintToRedColor("mobile2"); return false;}
                if(complaint_text.length < 3) {paintToRedColor("complaint_text"); return false;}
                //if(file.length < 3) {alert("Faylı seçin"); return false;}
            }
        });
    </script>
{/literal}

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
