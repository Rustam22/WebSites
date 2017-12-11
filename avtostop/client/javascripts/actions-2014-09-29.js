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
    function func_send() {
        var email = document.getElementById("custom_engine_1").value.trim();
        var password = document.getElementById("custom_engine_2").value.trim();
        var remember = document.getElementById("remember_me").checked;
		var question = document.getElementById("no_auth_question").value.trim();

        if(!validateEmail(email) || password.length < 5) {
            alert("Xahiş edirik xanaları düzgün doldurasınız!");
            return false;
        }
        
		if(question.length > 0) {
		    $.ajax({
				type: 'post',
				url:  app.url + '/register/isLoggedIn',
				data: "email=" + email + "&password=" + password + "&checked=" + remember + "&question=" + question,
				success: function(data) {
					if((data !="cookie") && (data !="session")) {
						alert(data);
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
						alert(data);
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
    function passRecovery() {
        var email = document.getElementById("forget_email").value;

        if(!validateEmail(email)) {
            alert("Xahiş edirik xananı düzgün doldurasınız!");
            return false;
        }

        $.ajax({
            type: 'post',
                url: app.url + '/register/passRecovery',
                data: 'email=' + email,
                success: function(data) {
                    alert(data);
					location.reload();
                }
        });
    }

    function showMenuChilds() {

        var el = parseInt($(this).attr('data-el'));

        $(this).parents('.menu-item').find('.child-3-level').html($('.menu-item-child-content-' + el).html());

        $('.menu-item-child').removeClass('menu-item-child-selected');

        $(this).parents('.menu-item').find('.child-side-first').css('width', '40%');
        $(this).parents('.menu-item').find('.child-3-level').show();

        $(this).addClass('menu-item-child-selected');
    }


    function showMessage(content) {

        $('#message-content').html(content);
        $('.block-display').show();

    }
    function showMessageAuth(content) {

        $('#message-content').html(content);
        $('.block-display').show();

    }

    function hideMessage() {
        $('.block-display').hide();
    }





    function calcCustomShow() {
        showMessage(tmpl($('#t-calc-custom').html(), {}));
    }
    function signinCustomShow() {
        showMessage(tmpl($('#t-signin').html(), {}));
            $('#restore').click(fadeRestore);
    }

    function calcTechnicalShow() {
        showMessage(tmpl($('#t-calc-tb').html(), {}));
    }

    function calcTechnicalTimeShow() {
        showMessage(tmpl($('#t-calc-tb-time').html(), {}));
    }

    function advTitleToggle() {
        $(this).toggleClass('adv-title-other');
    }

    function advTitleItemClick() {
        $('.adv-item-tab').toggleClass('hide');
    }

    function askQuestion() {
        var question = $('#question-text').val();
        var email = $('#question-email').val();

        if (question == '') return;
        $.ajax({
            url: app.url + '/faq/add/question',
            type: 'post',
            data: 'question=' + question + '&email=' + email,
            success: function() {
                showMessage('Sualınız qəbul olundu.');
                $('#question-text').val('');
            }
        });
    }

    function calculateCustom() {

        $('#custom_calc_result').html("");

        var certificatePrice=20;
        var operationFee= 10;

        var customStatus = parseInt($('#custom_status').val()); //0:yeni 1:kohne

        var customDollarRate= $('#custom_dollar_rate').val();
        if(customDollarRate=='')
        {
                alert('Dolların kursunu daxil edin!');
                return;
        }

        customDollarRate=parseFloat(customDollarRate);

        var customPrice = $('#custom_price').val();
        var customEngine= $('#custom_engine').val();

        if(customPrice=='' || customEngine=='')
        {
                alert('Məlumatları tam daxil edin!');
                return;
        }

        customPrice=parseFloat(customPrice);
        customEngine=parseFloat(customEngine);

        if(customPrice<1)
        {
                alert('Avtomobilin alınma qiyməti 0 dan böyük olamlıdır!');
                return;
        }

        if(customEngine<1)
        {
                alert('Mühərrikin işçi həcmi 0 dan böyük olamlıdır!');
                return;
        }

        if(customPrice<1272)
                operationFee=10;
        else if(customPrice<12718)
                operationFee=50;
        else if(customPrice<127178)
                operationFee=100;
        else
                operationFee=275;

        var customCalc=0.0;

        if(customStatus==1)
                customCalc=customEngine*0.4;
        else
                customCalc=customEngine*0.7;

        customCalc*=customDollarRate;
        customCalc=Math.round(customCalc*Math.pow(10,2))/Math.pow(10,2);

        var aksiz=0.0;

        if(customEngine<=2000)
                aksiz=customEngine*0.15;
        else if(customEngine<=3000)
                aksiz=300+(customEngine-2000);
        else if(customEngine<=4000)
                aksiz=1300+(customEngine-3000)*2;
        else
                aksiz=3300+(customEngine-4000)*4;

        aksiz=Math.round(aksiz*Math.pow(10,2))/Math.pow(10,2);

        customPrice*=customDollarRate;
        customPrice=Math.round(customPrice*Math.pow(10,2))/Math.pow(10,2);

        var EDV=(customPrice+aksiz+customCalc+certificatePrice+operationFee)*0.18;
        EDV=Math.round(EDV*Math.pow(10,2))/Math.pow(10,2);

        var sum=aksiz+customCalc+EDV+certificatePrice+operationFee;
        sum=Math.round(sum*Math.pow(10,2))/Math.pow(10,2);

            $table = "<table cellspacing='0' cellpadding='5'  style='border:1px solid #B7B7B8;font-size:12px;'><tr style='background-color:#F4F4F4'><td style='font-weight:bold;width:170px'>Aksiz vergisi</td><td style='width:170px'>"
                + aksiz +" AZN </td></tr><tr  style='background-color:white'><td style='font-weight:bold'>Gömrük vergisi</td><td>"
                + customCalc+" AZN </td></tr><tr style='background-color:#F4F4F4'><td style='font-weight:bold'>�?məliyyat haqqı</td><td>"
                + operationFee+" AZN </td></tr><tr style='background-color:white'><td style='font-weight:bold'>Vəsiqə haqqı</td><td>"
                + certificatePrice+" AZN </td></tr><tr style='background-color:#F4F4F4'><td style='font-weight:bold'>�?DV</td><td>"
                + EDV+" AZN</td></tr><tr style='background-color:white'><td style='font-weight:bold'>Cəmi</td><td>"
                + sum+" AZN </td></tr></table>";

        //showMessage($table);

        $('#custom_calc_result').html($table);

    }

    function isNumberKey(evt) {
        var charCode = (document.all) ? event.keyCode :  evt.which;
        if((charCode > 31
            && (charCode < 48 || charCode > 57)
            || charCode==46)
            && charCode!=40 && charCode!=41 && charCode!=45 &&  charCode!=43&&  charCode!=46)
            return false;
        return true;
    }

    function calculate_tex_baxis() {

        $('#result_tex_baxis').html("");

        var engine = $('#engine').val();

        if(engine=='')
            return;

        engine=parseFloat(engine);

        var sum=10;

        if(engine<=2000){
            sum+=engine*0.01;
        }
        else{
            sum+=20;
            sum+=(engine-2000)*0.02
        }

        sum=Math.round(sum*Math.pow(10,2))/Math.pow(10,2);

        var result="Avtomobilin texniki baxış rüsumu : <b>"+sum+" AZN dir</b><br/>";
        $('#result_tex_baxis').html(result);
    }

    function initMainAccordion() {
        $('.faq-menu-item-content').hide();
        $($('.faq-menu-item-content').first()).show();

        $('.faq-menu-item').hover(function() {
            $('.faq-menu-item-content').hide();
            $(this).find('.faq-menu-item-content').show();
        }, null);
    }

    initMainAccordion();

    function searchAction() {
        var sText = $('#search-query').val();
        if (sText == '') return;

        location.href = app.url + '/search/' + sText;

    }

    var playerActive = false;

    function initLive() {
        if (playerActive) {
            muteLive();
            playerActive = false;
        } else {
            $('body').append(tmpl($('#t-player').html(), {}));
            playerActive = true;
            $('.volume-disabled').hide();
        }
    }
    function fadeRestore() {
            $(".signin-container").fadeOut( "slow", function() {
                   $(".forget-container").fadeIn();
            });
            $("#back_to_register").click(function(){
               $(".forget-container").fadeOut( "slow", function() {
                   $(".signin-container").fadeIn();
               });
            });
             //alert("salam");

    }
    function muteLive() {
        $('#player-container').remove();
        playerActive = false;
        $('.volume-disabled').show();
    }

    function docClick(e) {
        if ($(e.target).hasClass('block-display')) {
            hideMessage();
        }
    }

    function calcTechnicalTimeShowFirst() {
        showMessage(tmpl($('#t-calc-tb-first').html(), {}));
    }

    function calcTech() {
        var avtoType = parseInt($('#tb-avto-type').val());
        var vol = parseInt($('#tb-engine-vol').val());

        var result = 0;

        var yv = 0;
        if (vol < 2000)
        if (avtoType == 1) {
            result = 20;
        } else {
            result = 10;
        }

        if (vol >= 2000 && vol < 3000) {
            result = 20;
            result += (vol - 2000) * 0.02;
        }

        if (vol >= 3000 && vol < 4000) {
            result = 40;
            result += (vol - 3000) * 0.03;
        }

        if (vol >= 4000 && vol < 5000) {
            result = 70;
            result += (vol - 4000) * 0.04;
        }

        if (vol >= 5000) {
            result = 110;
            result += (vol - 5000) * 0.05;
        }

        if (avtoType == 1) {
             yv = 20;
        } else {
             yv = 10;
        }

        $('#calc-tb-first-res-1 span').html(result);
        $('#calc-tb-first-res span').html(yv);
        $('#calc-tb-first-res-2 span').html(result + yv);

    }

    function init() {
        $('.auth-container').click(signinCustomShow);
        $('#search-button').click(searchAction);
        $('#ask-question').click(askQuestion);
        $('.adv-title-item').click(advTitleItemClick);
        $('.adv-title').click(advTitleToggle);
        $('#calc-custom').click(calcCustomShow);
        $('#calc-technical').click(calcTechnicalShow);
        $('#calc-technical-time').click(calcTechnicalTimeShow);
        $('#calc-technical-tb-first-time').click(calcTechnicalTimeShowFirst);
        $('.menu-item-have-child').mouseenter(showMenuChilds);
        $('#in-site').click(initLive);
        $(document).click(docClick);
        $('#search-query').keypress(function(e) {
            if (parseInt(e.keyCode) == 13) {
                searchAction();
            }
        });
            $("#policy_ok").change(

                    function(){
                        if($("#policy_ok").is(":checked")){
                            //alert('salam');
                            $("input").prop('disabled', false);
                        }
                        else{
                            $("#reg_ok").prop('disabled', true);

                        }

                    }   );
             $("#reg_ok").click(
                     function(){
                        //alert("salam");
                     });
    }

    $(init);

    var insCalc = [];
    // 1 - xarici olke
    // 2 - priv or company
    // 3 - option value

    insCalc[1] = [];
    insCalc[0] = [];

    insCalc[1][1] = [];
    insCalc[1][0] = [];
    insCalc[0][1] = [];
    insCalc[0][0] = [];

    insCalc[1][1][0] = [];
    insCalc[1][1][1] = [];
    insCalc[1][0][0] = [];
    insCalc[1][0][1] = [];

    insCalc[2] = [];
    insCalc[2][1] = [];
    insCalc[2][0] = [];

    insCalc[2][1][0] = [];
    insCalc[2][1][1] = [];
    insCalc[2][0][0] = [];
    insCalc[2][0][1] = [];

    insCalc[3] = [];
    insCalc[3][1] = [];
    insCalc[3][0] = [];

    insCalc[3][1][0] = [];
    insCalc[3][1][1] = [];
    insCalc[3][0][0] = [];
    insCalc[3][0][1] = [];

    insCalc[4] = [];
    insCalc[4][1] = [];
    insCalc[4][0] = [];

    insCalc[4][1][0] = [];
    insCalc[4][1][1] = [];
    insCalc[4][0][0] = [];
    insCalc[4][0][1] = [];

    insCalc[5] = [];
    insCalc[5][1] = [];
    insCalc[5][0] = [];

    insCalc[5][1][0] = [];
    insCalc[5][1][1] = [];
    insCalc[5][0][0] = [];
    insCalc[5][0][1] = [];

    insCalc[6] = [];
    insCalc[6][1] = [];
    insCalc[6][0] = [];

    insCalc[6][1][0] = [];
    insCalc[6][1][1] = [];
    insCalc[6][0][0] = [];
    insCalc[6][0][1] = [];

    insCalc[7] = [];
    insCalc[7][1] = [];
    insCalc[7][0] = [];

    insCalc[7][1][0] = [];
    insCalc[7][1][1] = [];
    insCalc[7][0][0] = [];
    insCalc[7][0][1] = [];

    insCalc[2][1][0] = [];
    insCalc[2][1][1] = [];
    insCalc[2][0][0] = [];
    insCalc[2][0][1] = [];

    insCalc[3][1][0] = [];
    insCalc[3][1][1] = [];
    insCalc[3][0][0] = [];
    insCalc[3][0][1] = [];

    insCalc[4][1][0] = [];
    insCalc[4][1][1] = [];
    insCalc[4][0][0] = [];
    insCalc[4][0][1] = [];

    insCalc[5][1][0] = [];
    insCalc[5][1][1] = [];
    insCalc[5][0][0] = [];
    insCalc[5][0][1] = [];

    insCalc[6][1][0] = [];
    insCalc[6][1][1] = [];
    insCalc[6][0][0] = [];
    insCalc[6][0][1] = [];


    insCalc[1][0][0][1] = 50;
    insCalc[1][0][0][2] = 75;
    insCalc[1][0][0][3] = 100;
    insCalc[1][0][0][4] = 125;
    insCalc[1][0][0][5] = 150;
    insCalc[1][0][0][6] = 175;
    insCalc[1][0][0][7] = 200;
    insCalc[1][0][0][8] = 225;
    insCalc[1][0][0][9] = 250;

    insCalc[1][0][1][1] = 60;
    insCalc[1][0][1][2] = 90;
    insCalc[1][0][1][3] = 120;
    insCalc[1][0][1][4] = 150;
    insCalc[1][0][1][5] = 180;
    insCalc[1][0][1][6] = 210;
    insCalc[1][0][1][7] = 240;
    insCalc[1][0][1][8] = 270;
    insCalc[1][0][1][9] = 300;

    insCalc[1][1][0][1] = 12.5;
    insCalc[1][1][0][2] = 18.75;
    insCalc[1][1][0][3] = 25;
    insCalc[1][1][0][4] = 31.25;
    insCalc[1][1][0][5] = 37.5;
    insCalc[1][1][0][6] = 43.75;
    insCalc[1][1][0][7] = 50;
    insCalc[1][1][0][8] = 56.25;
    insCalc[1][1][0][9] = 62.5;

    insCalc[1][1][1][1] = 15;
    insCalc[1][1][1][2] = 22.5;
    insCalc[1][1][1][3] = 30;
    insCalc[1][1][1][4] = 37.5;
    insCalc[1][1][1][5] = 45;
    insCalc[1][1][1][6] = 52.5;
    insCalc[1][1][1][7] = 60;
    insCalc[1][1][1][8] = 67.5;
    insCalc[1][1][1][9] = 70;

    insCalc[2][0][0][1] = 150;
    insCalc[2][0][0][2] = 200;

    insCalc[2][0][1][1] = 180;
    insCalc[2][0][1][2] = 240;

    insCalc[2][1][0][1] = 37.5;
    insCalc[2][1][0][2] = 50;

    insCalc[2][1][1][1] = 45;
    insCalc[2][1][1][2] = 60;

    insCalc[3][0][0][1] = 150;
    insCalc[3][0][0][2] = 200;
    insCalc[3][0][0][3] = 250;

    insCalc[3][0][1][1] = 180;
    insCalc[3][0][1][2] = 240;
    insCalc[3][0][1][3] = 300;

    insCalc[3][1][0][1] = 37.5;
    insCalc[3][1][0][2] = 50;
    insCalc[3][1][0][3] = 62.5;

    insCalc[3][1][1][1] = 45;
    insCalc[3][1][1][2] = 60;
    insCalc[3][1][1][3] = 75;

    insCalc[4][0][0][1] = 50;
    insCalc[4][0][1][1] = 60;
    insCalc[4][1][0][1] = 12.5;
    insCalc[4][1][1][1] = 15;

    insCalc[5][0][0][1] = 25;
    insCalc[5][0][1][1] = 30;
    insCalc[5][1][0][1] = 6.25;
    insCalc[5][1][1][1] = 7.5;

    insCalc[6][0][0][1] = 50;
    insCalc[6][0][1][1] = 60;
    insCalc[6][1][0][1] = 12.5;
    insCalc[6][1][1][1] = 15;

    insCalc[7][0][0][1] = 100;
    insCalc[7][0][1][1] = 120;
    insCalc[7][1][0][1] = 0;
    insCalc[7][1][1][1] = 0;

    function calcIns() {

        var i1 = parseInt($('#avto-type').val());

        var i2 = 0;
        if ($('#from-another-country').is(':checked')) i2 = 1;

        var i3 = 0;
        if ($('#company-user').is(':checked')) i3 = 1;

        var i4 = 1;

        if (i1 == 1) {
            i4 = parseInt($('#engine-vol').val());
        }

        if (i1 == 2) {
            i4 = parseInt($('#passenger-count').val());
        }

        if (i1 == 3) {
            i4 = parseInt($('#weight').val());
        }

        $('#c-result-container span').html(insCalc[i1][i2][i3][i4]);

    }

    function showImage(src) {

        showMessage(tmpl($('#t-image').html(), {src: src}));

    }