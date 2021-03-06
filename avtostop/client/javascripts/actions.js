
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
    }
    function saveItemPaymentShow() {
        //showMessage(tmpl($('#t-itemPayment').html(), {}));
    }

    function calcTechnicalShow() {
        showMessage(tmpl($('#t-calc-tb').html(), {}));
    }

    function calcTechnicalTimeShow() {
        showMessage(tmpl($('#t-calc-tb-time').html(), {}));
    }

    function calcKasko() {
        showMessage(tmpl($('#t-calc-tb-kasko').html(), {}));
    }

    function advTitleToggle() {
        $(this).toggleClass('adv-title-other');
    }

    function advTitleItemClick() {
        $('.adv-item-tab').toggleClass('hide');
    }

    function askQuestion() {
        var question = $('#no_auth_question').val();
        var email = $('#question-email').val();

        if (question == '') return;

        $(".uploadFileds #submit").trigger("click");

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
    var onlyOne = false;

    function initLive() {
        if (playerActive) {
            muteLive();
            playerActive = false;
        } else {
            if(!$(".red-button").hasClass('live-inactive')) {
                if(!onlyOne) {
                    $('body').append(tmpl($('#t-player').html(), {}));
                    onlyOne = true;
                    playerActive = true;
                    $('.volume-disabled').hide();
                }
            }
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

         /*$('#calc-tb-first-res-1 span').html(result); 
        $('#calc-tb-first-res span').html(yv);
        $('#calc-tb-first-res-2 span').html(result + yv);*/
		
		//$('#calc-tb-first-res-1 span').html(result);
        //$('#calc-tb-first-res span').html(yv);
        $('#calc-tb-first-res-2 span').html(result);

    }


    function doScript() {

        $('#t-dynamic-content').html(tmpl($('#dynamic-content-1').html(), {}));
        $(".adv-title div:nth-child(1)").click(function() {
            $(".competition-template-header .adv-title").css("background-position", "-262px -45px");
            $('#t-dynamic-content').html(tmpl($('#dynamic-content-1').html(), {}));
        });
        $(".adv-title div:nth-child(2)").click(function() {
            $(".competition-template-header .adv-title").css("background-position", "-262px -85px");
            $('#t-dynamic-content').html(tmpl($('#dynamic-content-2').html(), {}));

            for(var i = 0; i < UsersData.length; i++) {
                var userBlock = '';
                if(UsersData[i].penalty_points == '') {
                    UsersData[i].penalty_points = " - ";
                }if(UsersData[i].distance_traveled == '') {
                    UsersData[i].distance_traveled = " - ";
                }if(UsersData[i].car_brand == '' && UsersData[i].car_model == '') {
                    UsersData[i].car_brand = " - ";
                }if(UsersData[i].competition_active == '0') {
                    userBlock = "<tr style='text-decoration: line-through;'>";
                } else {
                    userBlock = "<tr>";
                }
                userBlock += "<td>" + (i+1) + "</td>" +
                             "<td><img src='" + app.url + "/public" + UsersData[i].image + "'>" +
                                  UsersData[i].name + "&nbsp" + UsersData[i].surname + "</td>" +
                             "<td>" + UsersData[i].penalty_points + "</td>" +
                             "<td>" + UsersData[i].distance_traveled + "</td>" +
                             "<td>" + UsersData[i].car_brand + "&nbsp" + UsersData[i].car_model + "</td>";
                userBlock += "</tr>";
                $(".dynamic-content table").append(userBlock);
                //alert($(".dynamic-content table tr td").html());
            }

            for(var i = personCount; i < fullCount; i++) {
                var txt = "<tr><td>" + (i+1) + "</td><td><span>boşdur</span></td><td>-</td><td>-</td><td>-</td></tr>";
                $(".dynamic-content table").append(txt);
            }
            $(".dynamic-content table tr td img, .adv-title-item-1 .current-user img").error(function() {
                $(this).attr("src", app.url + "/client/competition/no-face.png");
                $(this).css({
                    "width": "30px",
                    "margin-left": "-2px"
                });
            });
        });
        $("body").on( "click", ".dynamic-content button", function( event ) {signinCustomShow();});
    }
    function competitionSigninCustomAfterAuthShow() {
        competitionShowMessage(tmpl($('#t-competition-after-auth-1').html(), {}));
        $('.begin-test-button').click(function() {
            competitionShowMessage(tmpl($('#t-competition-after-auth-2').html(), {}));

            //test operations script
            var DATA = '';
            var dataLength = 0;

            function getAllData() {
                $.ajax({
                    type: 'get',
                    url:  app.url + '/getAllCompetitionQuestions',
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        DATA = JSON.parse(JSON.stringify(data));
                        dataLength = DATA.length;
                        //console.log(DATA);
                    }
                });
            }getAllData();

            var cnq = 0;
            function getNextQuestion() {
                if(cnq <= DATA.length) {
                    var txt = "<p>Sual " + (cnq + 1) + ":</p>" +
                        "<h2>" + DATA[cnq].question + "</h2><br>" +
                        "<div class='options'>" +
                        "<input type='radio' name='answer[]' id='id_1' value='" + DATA[cnq].id_1 + "'><div>" + DATA[cnq].var1 + "</div><br><br>" +
                        "<input type='radio' name='answer[]' id='id_2' value='" + DATA[cnq].id_2 + "'><div>" + DATA[cnq].var2 + "</div><br><br>" +
                        "</div><div class='clear'></div><br><br><div class='true-answer'></div>";
                    $('.competition-template-header .adv-title-1 .question').html(txt);
                    cnq++;
                }
            }getNextQuestion();


            var answerValue = '';
            var id = '';
            $("body").on( "click", "input:radio[name=answer[]]", function( event ) {
                answerValue = this.value;
                id = this.id;
                $('.competition-template-header .adv-title-1 .answering').addClass('may-answer');
            });
            $("body").on( "click", ".competition-template-header .adv-title-1 .may-answer", function( event ) {
                $.ajax({
                    type: 'post',
                    url:  app.url + '/getAnswerResult',
                    async: false,
                    data: "value=" + answerValue + "&userId=" + userId + "&id=" + id,
                    dataType: 'json',
                    success: function(data) {
                        var NewData = JSON.parse(JSON.stringify(data));
                        var status = NewData.status;
                        var answer = NewData.answer;

                        if(status == "success_end") {
                            $('.competition-template-header .adv-title-1 .true-answer').html(answer);
                            $('.competition-template-header .adv-title-1 .expectation').html("<p class='green'>Təbrik edirik! Siz müsabiqənin iştirakçısı oldunuz.</p>");
                        }else if(status == "next") {
                            $('.competition-template-header .adv-title-1 .answering').removeClass('may-answer');
                            $('.competition-template-header .adv-title-1 .next-question').addClass('may-next');
                            $('.competition-template-header .adv-title-1 .true-answer').html(answer);
                        }else if(status == "error") {
                            $('.competition-template-header .adv-title-1 .answering').removeClass('may-answer');
                            $('.competition-template-header .adv-title-1 .next-question').addClass('may-next');
                            $('.competition-template-header .adv-title-1 .true-answer').html(answer);
                        }else if(status == "bad_end") {
                            $('.competition-template-header .adv-title-1 .true-answer').html(answer);
                            $('.competition-template-header .adv-title-1 .expectation').html("<p class='red'>Təəssüf ki, siz 2 səhv edərək test imtahanından keçə bilmədiz. Növbəti cəhdi 2 saat sonra edə bilərsiniz.</p>");
                        }else if(status == "10") {
                            showMessage('Təəsüf ki müsabiqədə yer məhduddur');
                            //alert("Təəsüf ki müsabiqədə yer məhduddur");
                        }else if(status == "no_time") {
                            showMessage('Növbəti cəhdi 2 saat bitənnən sonra edə bilərsiniz');
                            //alert("Növbəti cəhdi 2 saat bitənnən sonra edə bilərsiniz");
                        }
                    }
                });
            });
            $("body").on( "click", ".competition-template-header .adv-title-1 .may-next", function( event ) {
                $('.competition-template-header .adv-title-1 .next-question').removeClass('may-next');
                getNextQuestion();
            });

        });
    }
    function competitionShowMessage(content) {
        $('#competition-message-content').html(content);
        doScript();
        $('.competition-block-display').show();
    }
    function competitionSigninCustomShow() {
        competitionShowMessage(tmpl($('#t-competition').html(), {}));
    }
    function competitionHideMessage() {
        $('.competition-block-display').hide();
    }


    var glob_nameOP = '';
    var glob_surnameOP = '';
    var glob_emailOP = '';
    var glob_mobileOP = '';
    var glob_idOP = '';
    function userActivationOP() {
        var id      = document.getElementById("div11").innerHTML;
        var name    = document.getElementById("div22").innerHTML;
        var surname = document.getElementById("div33").innerHTML;
        var email   = document.getElementById("div44").innerHTML;
        var mobile  = document.getElementById("div55").innerHTML.substr(3);

        showMessage(tmpl($('#t-user-activation-op').html(), {}));

        $(".user-activation-block input[name='name']").val(name);
        $(".user-activation-block input[name='surname']").val(surname);
        $(".user-activation-block input[name='email']").val(email);
        $(".user-activation-block input[name='mobile']").val(mobile);

        jQuery(function($){
            $(".user-activation-block input[name='mobile']").mask("(099) 999-99-99");
        });

        $("body").on("click", ".user-activation-block input[type='button']", function(event) {
            var name    = $(".user-activation-block input[name='name']").val();
            var surname = $(".user-activation-block input[name='surname']").val();
            var email   = $(".user-activation-block input[name='email']").val();
            var mobile  = getCorrectPhoneNumberOP($(".user-activation-block input[name='mobile']").val());
            if((name.length < 2) || (surname.length < 2) || !validateEmailOP(email) || (mobile.length < 5)) {
                alert("Xahiş edirik xanaları tam və düzgün doldurasınız.");
                return false;
            }
            glob_nameOP = name;
            glob_surnameOP = surname;
            glob_emailOP = email;
            glob_mobileOP = mobile;
            glob_idOP = id;
            updateUserRequestOP(id, name, surname, email, mobile);
        });

        return false;
    }
    function getCorrectPhoneNumberOP(number) {
        number = number.replace("(", "");
        number = number.replace(")", "");
        number = number.replace("-", "");
        number = number.replace("-", "");
        number = number.replace(" ", "");
        number = number.replace("0", "");
        number = 994 + number;
        return number;
    }
    function updateUserRequestOP(id, name, surname, email, mobile) {
        $.ajax({
            type: 'post',
            url: app.url + '/register/update',
            async: false,
            data: "id=" + id + "&name=" + name + "&surname=" + surname + "&email=" + email + "&mobile=" + mobile,
            success: function (data) {
                if(data == 'inCorrectEmailAddress') {
                    alert("Email adress düzgün daxil edilməyib");
                } else if(data == 'errorEmailAndMobile') {
                    alert("Bu elektron ünvan və mobil nömrə artıq qeydiyyatdan keçmişdir.");
                } else if(data == 'errorEmail') {
                    alert("Bu elektron ünvan artıq qeydiyyatdan keçmişdir.");
                } else if(data == 'errorMobile') {
                    alert("Bu nömrə artıq qeydiyyatdan keçmişdir.");
                } else if (data == "true") {
                    getCodeOP(mobile);
                }
            }
        });
    }
    function getCodeOP(mobile) {
        //alert(mobile);
        $.ajax({
            type: 'post',
            url: app.url + '/register/getCode',
            data: "mobile=" + mobile,
            dataType: "xml",
            success: function(xml) {
                $(xml).find('response').each(function(){
                    var get_code = $(this).first().text()
                    getResponseCodeOP(get_code);
                });
            }
        });
    }
    $("body").on("click", ".user-activation-block .button-2", function(event) {
        var code = document.getElementById("approve_code-op").value.trim();
        if(code.length == 5) {
            approveCodeOP(glob_idOP, glob_nameOP, glob_surnameOP, glob_emailOP, glob_mobileOP, code);
        } else {
            showMessage("Təsdiq kodu düzgün deyil.");
        }
        return false;
    });
    function approveCodeOP(id, name, surname, email, mobile, approve_code) {
        //alert(id);
        $.ajax({
            type: 'post',
            url: app.url + '/register/approve_codeOP',
            data: "code=" + approve_code,
            dataType: "xml",
            success: function(xml) {
                $(xml).find('response').each(function(){
                    $(this).find("responsecode").each(function(){
                        var responsecode = $(this).text();
                        var result = getResponseCodeOP(responsecode);
                        if(result == true) {
                            $.ajax({
                                type: 'post',
                                url: app.url + '/register/userActivateOP',
                                data: "id=" + id,
                                success: function(data) {
                                    showMessage(data);
									signinCustomShow();
                                    location.reload();
                                }
                            });
                        }
                    });
                });
            }
        });
    }
    function getResponseCodeOP(get_code) {
        //success_type
        //alert(get_code);
        if(get_code == 201) {
            alert("Xidmət Moderatora əlavə olunub!");
            return false;
        }if(get_code == 202) {
            alert("Xidmət aktivləşdirilməyib!");
            return false;
        }if(get_code == 203) {
            //alert("Sizin telefon nömrənizə təsdiq kodu göndərilmişdir.");
            showMessage(tmpl($('#t-user-activation-op-2').html(), {}));
            jQuery(function($){$("#approve_code-op").mask("99999");});
            return false;
        }if(get_code == 204) {
            alert("Təsdiq kodu qəbul edilmişdir.");
            return false;
        }if(get_code == 206) {
            alert("Xidmət aktivləşdirilməyib!");
            return false;
        }if(get_code == 209) {
            alert("Sizin balansınızdan 1 manat çıxılmışdır.");
            //alert(glob_mobile);
            $.ajax({
                type: 'get',
                url: 'http://vas.lsim.az/2/avto/api/get_sms.php?',
                data: "message=site" + "&src=" + glob_mobileOP + "&key=mislarut",
                success: function(data) {
                    showMessage(data);
                }
            });
            return true;

        }if(get_code == 210) {
            alert("Qeydiyyat tamamlanmadı. Balansınızda kifayət qədər vəsait yoxdur.");
            return false;
        }
        //errors_type
        if(get_code == 401) {
            alert("Mesaj T Mövcud deyil!");
            return false;
        }if(get_code == 402) {
            alert("Mesaj C Mövcud deyil!");
            return false;
        }if(get_code == 403) {
            alert("Mesaj Etibarsız uzunlugdadı!");
            return false;
        }if(get_code == 404) {
            alert("Mesaj Etibarsız kodlaşdırılmadadı!");
            return false;
        }if(get_code == 405) {
            alert("Etibarsız TARİF!");
            return false;
        }if(get_code == 406) {
            alert("Etibarsız Bool DƏYƏRİ!");
            return false;
        }if(get_code == 407) {
            alert("Etibarsız MSISDN!");
            return false;
        }if(get_code == 411) {
            alert("Etibarsız KONTÖR GÜN DƏYƏRİ!");
            return false;
        }if(get_code == 413) {
            alert("Etibarsız Servis ID!");
            return false;
        }if(get_code == 414) {
            alert("Servis Abunə Deyil!");
            return false;
        }if(get_code == 416) {
            alert("Təsdiq kodu düzgün deyil.");
            return false;
        }if(get_code == 417) {
            alert("Etibarsız ABUNƏ!");
            return false;
        }if(get_code == 418) {
            alert("Pulsuz qalan gün!");
            return false;
        }if(get_code == 421) {
            alert("Etibarsız İstifadəçi!");
            return false;
        }if(get_code == 422) {
            alert("Etibarsız sorğu.");
            return false;
        }if(get_code == 423) {
            alert("Çıxış Təmin Olunmadı!");
            return false;
        }if(get_code == 502) {
            alert("Təyin olunmamış səhf.");
            return false;
        } else {
            alert("local");
        }
    }
    function validateEmailOP(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    function init() {
        $('.auth-container').click(signinCustomShow);
        $('.advice-item .buy').click(saveItemPaymentShow);
        $('.headers .out').click(competitionSigninCustomShow);
        $("body").on( "click", ".user-activation-op", function( event ) {userActivationOP();});
        //$('.after-change-file a').click(signinCustomShow);
        $('#search-button').click(searchAction);
        $('#ask-question').click(askQuestion);
        $('.adv-title-item').click(advTitleItemClick);
        $('.adv-title').click(advTitleToggle);
        $('#calc-custom').click(calcCustomShow);
        $('#calc-technical').click(calcTechnicalShow);
        $('#calc-technical-time').click(calcTechnicalTimeShow);
        $('#calc-kasko').click(calcKasko);
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

    //$(init);
    init();

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