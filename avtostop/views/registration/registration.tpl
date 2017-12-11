 {extends file="base.tpl"}

{block name="content"}
    <script type="html/template" id="t-regPayment">
        <div class="signin-container">
            <form action="{$app_url}/goldenPay/saveitem.php" method="post">
                <table>
                    <tr>
                        <td>Məbləğ: </td>
                        <td><input type="text" name="amount" value="1 AZN" /></td>
                    </tr>
                    <tr>
                        <td>Ad, Soyad: </td>
                        <td><input type="text" name="item" value=""  /></td>
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
                        <td><input type="button" id="selectItems" name="selectItem" style="cursor: pointer; padding: 3px 5px;" value="Təstiq et&nbsp;&nbsp;&nbsp;"></td>
                    </tr>
                </table>
            </form>
        </div>
    </script>
    <script type="text/javascript" src="{$app_url}/jquery.js"></script>
    <script type="text/javascript" src="{$app_url}/client/javascripts/jquery.maskedinput.js"></script>
    <script type="text/javascript">
        jQuery(function($){
            $("#date").mask("99/99/9999");
            $("#mobile").mask("(099) 999-99-99");
            $("#tin").mask("99-9999999");
            $("#approve_code").mask("99999");
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            window.scrollTo(0, 225);
            var count_of_send = 0;
			var count = false;
			$(".container_2").hide();
			var glob_mobile;

            /*******************File Select Operations*******************/
            {literal}
                var fileChangeStatus = false;
                var countOfFileChange = 0;
                $(".dyp-file-fields .check-file a").click(function() {
                    var currentId = $(this).attr("id");
                    $(".dyp-file-fields #" + currentId + " input").trigger("click");
                    $(".dyp-file-fields #" + currentId + " input").change(function() {
                        var fileName = $(".dyp-file-fields #" + currentId + " input").val().split('/').pop().split('\\').pop();
                        if(fileName.length > 23) {fileName = fileName.substring(0, 20) + "...";}

                            if(fileName.length == 0) {
                                $(".dyp-file-fields #" + currentId + " a p").html("Şəkil seçin");
                                fileChangeStatus = false;
                            } else {
                                fileChangeStatus = true;
                                $(".dyp-file-fields #" + currentId + " a p").html(fileName);
                            }
                        countOfFileChange++;
                        addFileChangeField(countOfFileChange);
                    });
                });
                function addFileChangeField(value) {
                    if(value < 3) {
                        $(".dyp-file-fields .check-file:eq(" + value + ")").css("display", "block");
                    }
                }
            {/literal}
            /**********************************/

            document.getElementById("reg_ok").onclick = function() {

                if(count_of_send < 1) {
                    var name = document.getElementById("name").value.trim();
                    var surname = document.getElementById("surname").value.trim();
                    var email = document.getElementById("email").value.trim();
                    var mobile = getCorrectPhoneNumber(document.getElementById("mobile").value.trim());
					glob_mobile = mobile;
                    var password = document.getElementById("password").value.trim();
                    var password_retry = document.getElementById("password_retry").value.trim();
                    var serviceid = "9c4ea758c077e2dc8d59dc611b309d6d".trim();
                    var DATA = '';

                    //Ajax Upload Script
                    var uploadImageName = '';
                    $('#submitAccountImage').on('click', function() {
                        var file_data = $('.dyp-file-fields .check-file .file21-class').prop('files')[0];
                        var form_data = new FormData();
                        form_data.append('file', file_data)
                        $.ajax({
                            url: '{$app_url}/uploadAccountImage/add', // point to server-side PHP script
                            dataType: 'text',  // what to expect back from the PHP script, if anything
                            cache: false,
                            //async: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: 'post',
                            beforeSend: function() {
                                $("#slider-container").css("cursor", "wait");
                                $("#reg_ok").css("cursor", "wait");
                            },
                            uploadProgress: function(event, position, total, percentComplete) {
                                $("#slider-container").css("cursor", "wait");
                                $("#reg_ok").css("cursor", "wait");
                            },
                            success: function(php_script_response){
                                $("#slider-container").css("cursor", "wait");
                                $("#reg_ok").css("cursor", "wait");
                                if(php_script_response.search(/.png|.jpeg|.jpg|.gif/)) {
                                    //showMessage('Şəkil yükləndi');
                                    uploadImageName = php_script_response;
                                    addNewUserRequest();
                                } else {
                                    showMessage(php_script_response);   // display response from the PHP script, if any
                                    return false;
                                }
                            },
                            complete: function(xhr) {
                                $("#slider-container").css("cursor", "wait");
                                $("#reg_ok").css("cursor", "wait");
                            }
                        });
                    });

                    if((name.length < 2) || (surname.length < 2) || !validateEmail(email) || (mobile.length < 5) || (password.length < 5) || (password_retry.length < 5)) {
                        //alert("Xahiş edirik xanaları tam və düzgün doldurasınız.");
                        showMessage("Xahiş edirik xanaları tam və düzgün doldurasınız.");
                        return false;
                    }
                    if(password != password_retry) {
                        showMessage("Şifrə səhv yığılmışdır.");
                        return false;
                    }
                    if(!fileChangeStatus) {
                        showMessage("Faylı seçin.");
                        return false;
                    } else {
                        $("#slider-container").css("cursor", "wait");
                        $("#reg_ok").css("cursor", "wait");
                        $(".dyp-file-fields #submitAccountImage").trigger("click");
                    }

                    //Add New User Ajax Request
                    function addNewUserRequest() {
                        $.ajax({
                            type: 'post',
                            url: app.url + '/register/add',
                            data: "name=" + name + "&surname=" + surname + "&email=" + email + "&mobile=" + mobile + "&password=" + password + "&image=" + uploadImageName,
                            success: function (data) {
                                count_of_send++;
                                if (data == "errorEmailAndMobile") {
                                    showMessage("Bu elektron ünvan və mobil nömrə artıq qeydiyyatdan keçmişdir.");
                                } else if (data == "errorEmail") {
                                    showMessage("Bu elektron ünvan artıq qeydiyyatdan keçmişdir.");
                                } else if (data == "errorMobile") {
                                    showMessage("Bu nömrə artıq qeydiyyatdan keçmişdir.");
                                } else if (data == "true") {
                                    $("#slider-container").css("cursor", "default");
                                    $("#reg_ok").css("cursor", "default");
                                    showMessage(tmpl($('#t-regPayment').html(), {}));
                                    setDefaultData(name, surname);
                                    var cardType = $(".signin-container select[name=cardType]").val();
                                    $.ajax({
                                        type: 'post',
                                        url: app.url + '/regSaveItem',
                                        async: "false",
                                        dataType: "json",
                                        data: "cardType=" + cardType + "&mobile=" + mobile + "&email=" + email + "&itemTitle=" + (name + ", " + surname),
                                        success: function (data) {
                                            DATA = JSON.parse(JSON.stringify(data));
                                        }
                                    });
                                }
                            }
                        });
                    }

                    $("body").on( "click", "#selectItems", function( event ) {
                        if(DATA['status'].code == '1' && DATA['status'].message == 'success') {
                            window.open(DATA['urlRedirect']);
                        } else {
                            getPaymentKeyStatus(DATA['status'].code);
                            location.reload();
                        }
                    });

                    function setDefaultData(name, surname) {
                        $(".signin-container input[name=item]").val(name + ", " + surname);
                        $(".signin-container input[name=amount], input[name=item]").prop('disabled', true);
                    }
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
					
                    return false;
                }
            }
            function validateEmail(email) {
                {literal}var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;{/literal}
                return re.test(email);
            }
            function getCorrectPhoneNumber(number) {
                number = number.replace("(", "");
                number = number.replace(")", "");
                number = number.replace("-", "");
                number = number.replace("-", "");
                number = number.replace(" ", "");
                number = number.replace("0", "");
                number = 994 + number;
                return number;
            }
        });
    </script>
    <style>
	    #code_ok {
		    border: 1px solid #EC1B23;
			color: #EC1B23;
			padding: 3px 10px;
			font-weight: bold;
			float: right;
			font-family: Calibri,Arial;
			background-color: white;
			font-size: 16px;
			margin-right: 10px;
			cursor: pointer;
		}
	</style>
    <div class="faq-title print">Abunəçinin qeydiyyatı</div>

    <div class="page-register">

            {if isset($errors)}
                <br><h2 style="text-align: center;">Qeydiyyat Ugursuz Başa Çatdı!</h2>
            {else}
                {if isset($added)}
                    <br><h2 style="text-align: center;">Qeydiyyat Ugurla Başa Çatdı!</h2>
                {else}



					<div class="container_1">
						<table>
							<tr>
								<td>Ad:</td>
								<td><input type="text" name="name" id="name" minlength="3" class="reg_input" /></td>
								<td>Soyad:</td>
								<td><input type="text" name="surname" id="surname" minlength="3" class="reg_input" /></td>
							</tr>
							<tr>
								<td>E-mail</td>
								<td><input type="text" name="email" id="email" class="reg_input" /></td>
								<td>Mobil telefon</td>
								<td><input type="text" name="mobile" id="mobile" class="reg_input" /></td>
							</tr>
							<tr>
								<td>Şifrə</td>
								<td><input type="password" name="password" id="password" class="reg_input" /></td>
								<td>Təkrar şifrə</td>
								<td><input type="password" name="password_retry" id="password_retry" class="reg_input" /></td>
							</tr>
						</table><br/>
                        {literal}
                            <style type="text/css">
                                .dyp-file-fields {
                                    width: 205px;
                                    margin-top: 30px;
                                    margin-left: 85px;
                                    margin-bottom: -15px;
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
                                    margin: -16px 0px 0px -25px;
                                }
                                .dyp-file-fields .check-file:not(:first-child) {
                                    display: none;
                                }
                            </style>
                        {/literal}
                        <form id="sendFiles" enctype="multipart/form-data" action="{$app_url}/uploadAccountImage/add" method="POST">
                            <div class="dyp-file-fields">
                                <div class="check-file" id="file21">
                                    <a id="file21">
                                        <p id="file21">Şəkil seçin</p>
                                        <img class="file21" src="{$app_url}/client/images/clip.png">
                                    </a>
                                    <input type="file" name="file21" id="file21" class="file21-class" accept=".png,.jpg,.jpeg,.gif">
                                </div><br>
                                <input type="text" id="submitAccountImage" value="Upload" style="display: none;">
                            </div>
                        </form><br>

						<b>Abuneçilik nedir?</b><br/>
						Avtostop saytının abunəçisi olaraq, siz aşağıdakı genişlənmiş imkanlarından faydalana bilərsiniz:<br/>
						1. Dj Turala sual vermek <br/>
						2. Saytın avtomobil alqı-satqısı bölməsində elan yerləşdirmək.<br/>
						3. Saytın onlayn-imtahan bölməsindən istifadə etmək.<br/><br/>
						<b>Abunəçiliyin SMS-sorğudan və Dj Turala zəngdən nə üstünlüyü var?</b><br/>
						Abunəçiliyin əsas üstünlüyü odur ki, sms və ya telefon zəngi formatında verə bilmədiyiniz
						suallara, məsələn, çətin və ya cavabı yazılı şəkildə lazım olan suallara Avtostop saytı cavabları ala
						bilərsiniz. Bir sözlə, Dj Turaldan ətraflı konsultasiya almaq imkanınız var. Digər üstünlük odur ki,
						siz Dj Turala daha çox sual verə bilərsiniz, abunə haqqı isə stabil olaraq ayda cəmi 1 manat qalır.<br/><br/>
						<b>Abunə haqqı nə qədərdir?</b><br/>
						Abunəçilik üçün aylıq ödeniş cəmi 1 manat təşkil edir, üstəlik ödeniş forması da rahatdır –
						abunə haqqı qeydiyyat vaxtı göstərilən telefon nömrəsinin balansından her ayın əvvəlində silinir.<br/><br/>
						<b>Abunəçi olmaq üçün nə etmək lazımdır?</b><br/>
						Avtostop saytına abunə olmaq üçün yuxarıdakı formanı dolduraraq, qeydiyyatdan keçmək lazımdır.
						<br/><br/>
						<span style="color: red;"><b>Diqqət!</b><br/></span>
						<span style="color: red;">Nəzərinizə çatdırırıq ki, gold nömrələr, gara siyahıda olan nomrələr və daşınan nömrələr geydiyyatdan keçə bilməzlər.</span>
						<br/><br/>
						<input type="checkbox" name="policy_ok" id="policy_ok"/><label for="policy_ok">Abunəçilik qaydalarını qəbul edirəm</label>
						<br/>
						<input type="submit" name="reg_ok" value="Göndər" id="reg_ok" disabled="disabled" />
						<input type="hidden" name="csrf_key"  value="{$csrf_key}" />
					</div>
					<div class="container_2">
                        <b>Təsdiq kodu sizin telefonıza göndərilmişdir.</b><br>
					    <table style="width: 60%; margin: auto;">
							<tr>
								<td>Təsdiq kodun daxil edin: </td>
								<td><input type="text" name="approve_code" id="approve_code" maxlength="5" class="reg_input" /></td>
							</tr>
						</table><br/><br>
						Təstiq kodun daxil etdikdən sonra balansınızdan 1 manat çıxılacag:<br/><br/>
						<br/>
						<input type="submit" name="code_ok" value="Göndər" id="code_ok" />
						<input type="hidden" name="csrf_key"  value="{$csrf_key}" />
					</div>
                {/if}
            {/if}

    </div>
{/block}