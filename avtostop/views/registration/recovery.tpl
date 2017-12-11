{extends file="base.tpl"}

{block name="content"}
    <script type="text/javascript" src="{$app_url}/jquery.js"></script>
    <script type="text/javascript" src="{$app_url}/client/javascripts/jquery.maskedinput.js"></script>
    <script type="text/javascript">
        jQuery(function($){
            $("#date").mask("99/99/9999");
            $("#mobile").mask("(099) 999-99-99");
            $("#tin").mask("99-9999999");
            $("#ssn").mask("999-99-9999");
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
		    window.scrollTo(0, 0);
            document.getElementById("reg_ok").onclick = function() {
			    var password = document.getElementById("password").value.trim();
			    var password_retry = document.getElementById("password_retry").value.trim();
				var key = document.getElementById("key").innerHTML;
								
				if(password.length < 5 || password_retry.length < 5) {
                    showMessage('Şifrədə ən azı 5 simvol olmalıdır.');
				    //alert("Şifrədə ən azı 5 simvol olmalıdır.");
					return false;
				}
				if(password != password_retry) {
                    showMessage('Təkrar şifrə səhf yığılmışdır.');
				    //alert("Təkrar şifrə səhf yığılmışdır.");
					return false;
				}
				
				$.ajax({
					type: 'post',
					url: app.url + '/register/changedPass',
					data: "password=" + password + "&key=" + key,
					success: function(data) {
						if(data == 'true') {
                            showMessage('Şifrəniz dəyişildi.');
						    //alert("Şifrəniz dəyişildi.");
						}
						else if(data == 'false') {
                            showMessage('Təyin olunmayan səhf aşkarlandı.');
						    //alert("Təyin olunmayan səhf aşkarlandı.");
						}
						window.location = app.url;
					}
				});
				return false;
			}
        });
    </script>

    <div class="faq-title print">Şifrənin bərpası</div>
    <span id="key" style="display: none;">{$key}</span>
    <div class="page-register">
        <form method="post">
            {if isset($errors)}
                <br><h2 style="text-align: center;">Qeydiyyat Ugursuz Başa Çatdı!</h2>
            {else}
                {if isset($added)}
                    <br><h2 style="text-align: center;">Qeydiyyat Ugurla Başa Çatdı!</h2>
                {else}
                    <table>
                        <tr>
                            <td>Şifrə</td>
                            <td><input type="password" name="password" id="password" class="reg_input" minlength="5"/></td>
						</tr>
						<tr>
                            <td>Təkrar şifrə</td>
                            <td><input type="password" name="password_retry" id="password_retry" class="reg_input" minlength="5"/></td>
                        </tr>
                    </table><br/>
                    
                    <!--<input type="checkbox" name="policy_ok" id="policy_ok"/><label for="policy_ok">Qaydaları qəbul edirəm</label>-->
                    <br/>
                    <input type="submit" name="reg_ok1" value="Təstig edirəm" id="reg_ok" style="margin-top: -15px; float: left; margin-left: 301px;"/>
                    <input type="hidden" name="csrf_key"  value="{$csrf_key}" />
                {/if}
            {/if}
        </form>
    </div>
{/block}