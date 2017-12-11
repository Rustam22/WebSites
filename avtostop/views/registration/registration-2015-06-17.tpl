 {extends file="base.tpl"}

{block name="content"}
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

                $("#slider-container").css("cursor", "wait");
                $("#reg_ok").css("cursor", "wait");

                if(count_of_send < 1) {
                    var name = document.getElementById("name").value.trim();
                    var surname = document.getElementById("surname").value.trim();
                    var email = document.getElementById("email").value.trim();
                    var mobile = getCorrectPhoneNumber(document.getElementById("mobile").value.trim());
					glob_mobile = mobile;
                    var password = document.getElementById("password").value.trim();
                    var password_retry = document.getElementById("password_retry").value.trim();
                    var serviceid = "9c4ea758c077e2dc8d59dc611b309d6d".trim();

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
                                    showMessage("Sizin telefon nömrənizə təsdiq kodu göndəriləcək. Qeydiyyatı tamamlamaq üçün həmin kodu aşağıdakı xanaya daxil edin.");
                                    getCode(mobile);
                                }
                            }
                        });
                    }

		            document.getElementById("code_ok").onclick = function() {
					    var code = document.getElementById("approve_code").value.trim();
						if(code.length == 5) {
						    approveCode(name, surname, email, mobile, password, code);
						} else {
                            showMessage("Təsdiq kodu düzgün deyil.");
						}
						return false;
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
			function approveCode(name, surname, email, mobile, password, approve_code) {
			    //alert(approve_code);
				$.ajax({
					type: 'post',
					url: app.url + '/register/approve_code',
					data: "code=" + approve_code,
					dataType: "xml",
					success: function(xml) {
						$(xml).find('response').each(function(){
						    $(this).find("responsecode").each(function(){
								var responsecode = $(this).text();
								var result = getResponseCode(responsecode);
								if(result == true) {
								    $.ajax({
										type: 'post',
										url: app.url + '/register/userActivate',
										data: "name=" + name + "&surname=" + surname + "&email=" + email + "&mobile=" + mobile + "&password=" + password,
										success: function(data) {
                                            showMessage(data);
											location.reload();
										}
									});
								}
							});					
						});		
					}
				});
			}
			function getCode(mobile) {
			    //alert(mobile);
				$.ajax({
					type: 'post',
					url: app.url + '/register/getCode',
					data: "mobile=" + mobile,
					dataType: "xml",
					success: function(xml) {
						$(xml).find('response').each(function(){
							var get_code = $(this).first().text()
						    getResponseCode(get_code);						
						});
					}
				});
			}
			function getResponseCode(get_code) {
			    //success_type
				//alert(get_code);
				if(get_code == 201) {
                    showMessage("Xidmət Moderatora əlavə olunub!");
					return false;
				}if(get_code == 202) {
                    showMessage("Xidmət aktivləşdirilməyib!");
					return false;
				}if(get_code == 203) {
                    $("#slider-container").css("cursor", "default");
                    $("#reg_ok").css("cursor", "default");
                    //showMessage("Sizin telefon nömrənizə təsdiq kodu göndərilmişdir.");
					$(".container_1").slideUp();
					$(".container_2").slideDown();
					return false;
				}if(get_code == 204) {
                    showMessage("Təsdiq kodu qəbul edilmişdir.");
					return false;
				}if(get_code == 206) {
                    showMessage("Xidmət aktivləşdirilməyib!");
					return false;
				}if(get_code == 209) {
                    showMessage("Sizin balansınızdan 1 manat çıxılmışdır.");
					//alert(glob_mobile);
					$.ajax({
                        type: 'get',
                        url: 'http://vas.lsim.az/2/avto/api/get_sms.php?',
                        data: "message=site" + "&src=" + glob_mobile + "&key=mislarut",
                        success: function(data) {
                            showMessage(data);
                        }
                    });
					return true;
					
				}if(get_code == 210) {
                    showMessage("Qeydiyyat tamamlanmadı. Balansınızda kifayət qədər vəsait yoxdur.");
					return false;
				}
				//errors_type
				if(get_code == 401) {
                    showMessage("Mesaj T Mövcud deyil!");
					return false;
				}if(get_code == 402) {
                    showMessage("Mesaj C Mövcud deyil!");
					return false;
				}if(get_code == 403) {
                    showMessage("Mesaj Etibarsız uzunlugdadı!");
					return false;
				}if(get_code == 404) {
                    showMessage("Mesaj Etibarsız kodlaşdırılmadadı!");
					return false;
				}if(get_code == 405) {
                    showMessage("Etibarsız TARİF!");
					return false;
				}if(get_code == 406) {
                    showMessage("Etibarsız Bool DƏYƏRİ!");
					return false;
				}if(get_code == 407) {
                    showMessage("Etibarsız MSISDN!");
					return false;
				}if(get_code == 411) {
                    showMessage("Etibarsız KONTÖR GÜN DƏYƏRİ!");
					return false;
				}if(get_code == 413) {
                    showMessage("Etibarsız Servis ID!");
					return false;
				}if(get_code == 414) {
                    showMessage("Servis Abunə Deyil!");
					return false;
				}if(get_code == 416) {
                    showMessage("Təsdiq kodu düzgün deyil.");
					return false;
				}if(get_code == 417) {
                    showMessage("Etibarsız ABUNƏ!");
					return false;
				}if(get_code == 418) {
                    showMessage("Pulsuz qalan gün!");
					return false;
				}if(get_code == 421) {
                    showMessage("Etibarsız İstifadəçi!");
					return false;
				}if(get_code == 422) {
                    showMessage("Etibarsız sorğu.");
					return false;
				}if(get_code == 423) {
                    showMessage("Çıxış Təmin Olunmadı!");
					return false;
				}if(get_code == 502) {
                    showMessage("Təyin olunmamış səhf.");
					return false;
				}	
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