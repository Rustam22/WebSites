{extends file="base.tpl"}

{block name="content"}
	<div class="login-page">
	
		<form action="" method="post" class="layer-for-filedset">
			<div class="autorization-image-icon-rightside p-absolute hide">
				<div class="sprite autorization-image-icon left c-pointer">
				</div>
			</div>
		
			<div class="message-content-social">
				<div class="message-content-social-title left tx-margin-top-4px tx-margin-right-5px">
					<span class="tx-white">Вход через соц сети: </span>
				</div>
				<div class="message-content-social-icons left tx-margin-right-15px">
					<div class="sprite layer-autorization-vk left tx-margin-right-15px"></div>
					<div class="sprite layer-autorization-google left tx-margin-right-15px"></div>
					<div class="sprite layer-autorization-facebook left"></div>
				</div>
				<div class="message-content-social-href left tx-margin-top-4px">
					<span class="a-underline tx-white c-pointer">Disqus.com</span>
				</div>
			</div>
			<div class="clear"></div>
			<div class="layer-blue-line"></div>
			<div class="layer-content-registation-input">
				<div class="layer-content-registation-items-input">
					<div class="layer-registation-input-title">
						
					</div>
					<div class="layer-registation-input-fileld">
						<div class="left field-container field-container-first">
							<div class="field-title">Mail</div>
							<input type="text" name="email" {if isset($postData['email'])}value="{$postData['email']}"{/if} class="layer-for-autorization-input" />
						</div>
						<div class="left field-container">
							<div class="field-title">Пароль</div>
							<input type="password" name="password" class="layer-for-autorization-input" value="123456" />
						</div>
						<div class="clear"></div>
					</div>
				</div>
				
				{if isset($show_captcha_for_login)}
					<div class="login-captcha-container">
						<div class="field-label left captcha-login"  data-src="{$app_url}/libs/kcaptcha/index.php">
							<div>&nbsp;</div>
							<img src="{$app_url}/libs/kcaptcha/index.php?" class="no-selection" />
							<div class="update-login-captcha" onclick="updateLoginCaptcha();"></div>
						</div>
						<div class="field-own right">
							<div>Код на картинке</div>
							<input type="text" name="captcha_code" />
						</div>
						<div class="clear"></div>
					</div>
				{/if}
				
				<div class="clear"></div>
				<div class="layer-registration-select">
					<div class="layer-registration-save-me left">
						
						<div class="check-button-container" id="check-save-me" data-name="save_me" >
							<div class="afc-check-container check-button-item-container" data-value="1" >
								<div class="div left check-button-own">
									<div class="sprite check-sprite" data-checked="0"></div>
								</div>
								<div class="left check-button-title">
									<span class="c-pointer no-selection">Запомнить меня</span>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<br/>
						<div class="layer-registration-save-me-title tx-white a-underline">
							<span class="c-pointer action" data-url="#registration">Зарегистрироваться</span>
						</div>
					</div>
					
					<div class="layer-registration-submits right">
						<div class="layer-registration-submits-title tx-white a-underline p-absolute">
							<span class="c-pointer">Забыли пароль?</span>
						</div>	
						<div class="auth-button layer-registration-button-enter c-pointer">
							<button type="submit" name="user_login">Вход</button>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</form>
	
	</div>
	
	<script>
		new CheckController("#check-save-me");
	</script>

{/block}