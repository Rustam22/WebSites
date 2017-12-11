{extends file="base.tpl"}

{block name="content"}
	
	<script>
		var packageChoosed = 0;
		var allowAjax = true;
	</script>
	
	<script>
		
		function updatePrice() {
			var form = document.getElementById('choose-package-form');
			
			var formData = [];
			for (i = 0, c = form.length; i < c; i++) {
				formData.push($(form[i]).attr('name') + '=' + $(form[i]).val());
			}
			
			formData.push('csrf_key=' + $('.csrf-token').val());
			
			$.ajax({
				url: app.url + '/vacancy/package/get/price',
				type: 'post',
				dataType: 'json',
				data: formData.join('&'),
				beforeSend: function() {
					allowAjax = false;
				},
				success: function(d) {
					if (d.success) {
						$('#package-price').html(parseInt(d.price));
						$('#package-currency').html(d.currency);
					}
					$('.csrf-token').val(d.csrfKey);
					allowAjax = true;
				}
			});
		}
	
		function setPrice() {
		
			var __i = setInterval(function() {
			
				if (allowAjax) {
					
					updatePrice();
					
					clearInterval(__i);
					
				}
			
			}, 100);
		
			
		}
		
	</script>
	
	<div class="layer-right-block-options-content">
		<form action="" method="post" id="choose-package-form">
			
			<input type="hidden" name="recordId" value="{$recordId}" />
			
			<div class="layer-options-to-account">
				<div class="layer-options-to-account-title">
					<span class="tx-green-light tx-18">Дополнительные опции платного аккаунта</span>
				</div>
				<br/>
				
				<div class="afc-field-container select-field" style="margin: 0;">
					<div class="afc-field-label">Currency:</div>
					<div class="afc-field-input afc-field-own">
						<div id="select-currency" class="select-container p-relative" {if isset($value)}sel-val="1"{/if} >
							<div class="selected-option p-relative c-pointer">
								<div class="selected-option-html"></div>
								<div class="select-icon select-options-icon p-absolute sprite"></div>
							</div>
							<div class="options-container hide p-absolute">
								{foreach from=$currency item=v key=k}
									<div class="option-item c-pointer" opt-val="{$k}">{$v}</div>
								{/foreach}
							</div>
							<input type="hidden" name="currency" class="select-input" value="1"/>
						</div>
					</div>
				</div>
				<script>
					new SelectController('select-currency', null, function() {
						setPrice();
					});
				</script>
				
				<div class="clear"></div>
				<br/>
				<div class="layer-options-to-account-selects">
					<div class="layer-options-to-account-selects-checkbox left">
						<div class="layer-options-to-account-selects-checkbox-first">
							
							<div class="tx-margin-top-6px">
								<div class="check-button-container c-pointer" id="check-to-main" data-name="showOnMain" >
									<div class="afc-check-container check-button-item-container" data-value="1" data-price="13"  >
										<div class="div left check-button-own">
											<div class="sprite check-sprite" data-checked="0"></div>
										</div>
										<div class="left check-button-title">
											<span>Выводить сбоку</span>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							
							<!--
							<div class="tx-margin-top-6px left">
							
								<div class="check-button-container" id="check-to-newspaper" data-name="to_newspaper" >
									<div class="afc-check-container check-button-item-container" data-value="1" >
										<div class="div left check-button-own">
											<div class="sprite check-sprite" data-checked="0"></div>
										</div>
										<div class="left check-button-title">
											<span>Публиковать в газете</span>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							
							</div>
							
							
							<div class="tx-margin-top-6px ">
								<div class="check-button-container c-pointer" id="check-to-map" data-name="showOnMap" >
									<div class="afc-check-container check-button-item-container" data-value="1" data-price="14"  >
										<div class="div left check-button-own">
											<div class="sprite check-sprite" data-checked="0"></div>
										</div>
										<div class="left check-button-title">
											<span>Указать на карте</span>
										</div>
										<div class="clear"></div>
									</div>
								</div>
								
							</div>
							-->
							<!--
							<div class="tx-margin-top-6px ">
								<div class="check-button-container c-pointer" id="check-is-premium" data-name="is_premium" >
									<div class="afc-check-container check-button-item-container" data-value="1" data-price="15" data-currency="1" >
										<div class="div left check-button-own">
											<div class="sprite check-sprite" data-checked="0"></div>
										</div>
										<div class="left check-button-title">
											<span>Premium</span>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							-->
							<div class="tx-margin-top-6px ">
								<div class="check-button-container c-pointer" id="check-is-quickly" data-name="isQuickly">
									<div class="afc-check-container check-button-item-container" data-value="1"  data-price="16"  >
										<div class="div left check-button-own">
											<div class="sprite check-sprite" data-checked="0"></div>
										</div>
										<div class="left check-button-title">
											<span>Quickly</span>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							
						</div>	
						<div class="clear"></div>
						
						<script>
							
							new CheckController('#check-to-main', function(el) {
								setPrice();
							}, function(el) {
								setPrice();
							});
							new CheckController('#check-to-map', function(el) {
								setPrice();
							}, function(el) {
								setPrice();
							});
							new CheckController('#check-is-premium', function(el) {
								setPrice();
							}, function(el) {
								setPrice();
							});
							new CheckController('#check-is-quickly', function(el) {
								setPrice();
							}, function(el) {
								setPrice();
							});
							
							/*
							new CheckController('#check-to-newspaper', function() {
								newspaperInterval.checkFirst();
							}, function() {
								newspaperInterval.unCheckAll();
							});
							*/
						</script>
						
					</div>
					<div class="layer-options-to-account-selects-colors tx-margin-top-6px left">
						<div class="layer-options-to-account-selects-colors-picker left">
							<div class="layer-color-picker-body" id="package-color-picker">
								<div class="color-item color-none color-picker-white left" data-value="1"></div>
								<div class="color-item color-none color-picker-light left" data-value="2"></div>
								<div class="color-item color-none color-picker-yellow left" data-value="3"></div>
								<div class="color-item color-none color-picker-red left" data-value="4"></div>
								<div class="color-item color-none color-picker-green left" data-value="5"></div>
								<div class="color-item color-none color-picker-easy-green left" data-value="6"></div>
								<div class="color-item color-none color-picker-dark-green left" data-value="7"></div>
								<div class="color-item color-none color-picker-blue left" data-value="8"></div>
								<div class="color-item color-none color-picker-easy-blue left" data-value="9"></div>
								<div class="color-item color-none color-picker-dark-blue left" data-value="10"></div>
								<div class="color-item color-none color-picker-pink left" data-value="11"></div>
								<div class="color-item color-none color-active color-picker-dark-red left" data-value="12"></div>
								<div class="color-item color-none color-picker-black left" data-value="13"></div>
								<!-- Value -->
								<input type="hidden" name="advertisementColor" id="adv-color" value="0" />
								<!-- Value end -->
							</div>
						</div>
						<script>
							new ColorPicker('#package-color-picker', function() {
								var i = setInterval(function() {
									setPrice();
									clearInterval(i);
								}, 100);
							});
						</script>
						<div class="clear"></div>
						<!--
						<div class="layer-options-to-account-selects-date account-options-set-time">
							<div class="layer-options-to-account-selects-date-1 left tx-margin-right-40px">
								<div class="radio-button-container" id="radio-time-interval" data-name="newspaper_interval" >
									<div class="afc-radio-container radio-button-item-container left newspaper-interval-first" data-value="1" >
										<div class="div left radio-button-own">
											<div class="sprite radio-sprite"></div>
										</div>
										<div class="left radio-button-title">
											<span>на неделю</span>
										</div>
										<div class="clear"></div>
									</div>
									<div class="afc-radio-container radio-button-item-container left" data-value="1" >
										<div class="div left radio-button-own">
											<div class="sprite radio-sprite"></div>
										</div>
										<div class="left radio-button-title">
											<span>на месяц</span>
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
								<script>
									var newspaperInterval = new RadioController('#radio-time-interval');
								</script>
							</div>
							<div class="clear"></div>
						</div>
						-->
						
						<div class="clear"></div>
						
						
					</div>
				</div>
				
				<div class="clear"></div>
				
				
				
				<div class="clear"></div>
				
				<div class="clear"></div>
				<br/>
			</div>
			<div class="clear"></div>
			<div class="bottom-parametrs">
				<div class="bottom-parametrs-title tx-green-light tx-18">
					<span>Пакет размещения</span>
				</div>
				<div class="bottom-parametrs-tables tx-margin-top-10px">
					<div class="layer-first-table left tx-margin-right-15px">
						<div class="layer-first-table-title">
							<div class="left layer-first-table-title-item"><span>Бесплатные</span></div>
							<div class="sprite layer-person-info-questb-icon-parametrs left"></div>
						</div>
						<div class="clear"></div>
						<div class="layer-first-table-content">
							<div class="layer-first-table-content-top">
								<div class="layer-first-table-content-top-icon sprite left tx-margin-right-5px"></div>
								<div class="tx-margin-top-6px left"><span class="tx-green-light left">Размещение: <span class="tx-yellow"> 7 </span> дней </span></div>
							</div>
							<div class="clear"></div>
							<div class="layer-first-table-content-bottom left tx-margin-top-6px">
								<div class="layer-first-table-content-bottom-icon sprite left tx-margin-right-5px"></div>
								<div class="tx-margin-top-6px left"><span class="tx-green-light left">Максимум слов: <span class="tx-yellow"> 20 </span></span></div>
							</div>									
						</div>
						<div class="clear"></div>
						<div class="layer-first-table-button">
							<div class="radio-button-container radio-free-adv" data-name="packageType" >
								<div class="afc-radio-container radio-button-item-container left" data-value="1" >
									<div class="div left radio-button-own">
										<div class="sprite radio-sprite"></div>
									</div>
									<div class="left radio-button-title">
										<span>Выбрать</span>
									</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
					
					<div class="layer-second-table left tx-margin-right-15px">					
						<div class="layer-second-table-title">
							<div class="left layer-first-table-title-item"><span>Платные на сайт</span></div>
							<div class="sprite layer-person-info-questb-icon-parametrs-free left"></div>
						</div>
						<div class="clear"></div>
						<div class="layer-second-table-content">
							<div class="layer-first-table-content-top">
								<div class="layer-first-table-content-top-icon-1day sprite left tx-margin-right-5px"></div>
								
								<div class="radio-button-container radio-adv-package-1-interval left" data-name="packagePremiumInterval" >
									<div class="afc-radio-container radio-button-item-container left" data-value="1" data-price="3"  >
										<div class="div left radio-button-own">
											<div class="sprite radio-sprite"></div>
										</div>
										<div class="left radio-button-title">
											<span><span class="tx-green-light left"><span class="tx-yellow"> 1 </span> день </span></span>
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="layer-first-table-content-second-icon-comp sprite right tx-margin-right-5px"></div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
							<div class="layer-second-table-content-center">
								<div class="sprite layer-first-table-content-top-icon sprite left tx-margin-right-5px"></div>
								
								<div class="radio-button-container radio-adv-package-1-interval left" data-name="packagePremiumInterval" >
									<div class="afc-radio-container radio-button-item-container left" data-value="2" data-price="4" >
										<div class="div left radio-button-own">
											<div class="sprite radio-sprite"></div>
										</div>
										<div class="left radio-button-title">
											<span class="tx-green-light left"><span class="tx-yellow"> 7 </span> дней </span>
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="layer-first-table-content-second-icon-comp sprite right tx-margin-right-5px"></div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
							<div class="layer-second-table-bottom-center">
								<div class="sprite layer-first-table-content-top-icon-30days sprite left tx-margin-right-5px"></div>
								
								<div class="radio-button-container radio-adv-package-1-interval left" data-name="packagePremiumInterval" >
									<div class="afc-radio-container radio-button-item-container left" data-value="3" data-price="5" >
										<div class="div left radio-button-own">
											<div class="sprite radio-sprite"></div>
										</div>
										<div class="left radio-button-title">
											<span class="tx-green-light left"><span class="tx-yellow"> 30 </span> дней </span>
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="layer-first-table-content-second-icon-comp sprite right tx-margin-right-5px"></div>
								<div class="clear"></div>
							</div>
						</div>
						<script>
							var package1Price = 0;
							var package1Options = new RadioController('.radio-adv-package-1-interval', function(el) {
								setPrice();
							}, function(el) {
								setPrice();
							}, function() {
								if (packageChoosed == 2) return true;
							});
						</script>
						<div class="clear"></div>
						<div class="layer-second-table-button">
							<div class="radio-button-container radio-free-adv" data-name="packageType" >
								<div class="afc-radio-container radio-button-item-container left" data-value="2" >
									<div class="div left radio-button-own">
										<div class="sprite radio-sprite"></div>
									</div>
									<div class="left radio-button-title">
										<span>Выбрать - 499 руб.</span>
									</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
					
					
					<div class="layer-second-table left">
						<div class="layer-second-table-title">
							<div class="left layer-first-table-title-item"><span>Платные в газету</span></div>
							<div class="sprite layer-person-info-questb-icon-parametrs-forMagazine left"></div>
						</div>
						<div class="clear"></div>
						<div class="layer-second-table-content">
							<div class="layer-first-table-content-top tx-margin-top-6px">
								<div class="layer-third-magazine-icon sprite left tx-margin-right-5px"></div>
								
								<div class="radio-button-container radio-adv-package-2-edition " data-name="packagePaperInterval" >
									<div class="afc-radio-container radio-button-item-container left" data-value="1" data-price="7" >
										<div class="div left radio-button-own">
											<div class="sprite radio-sprite"></div>
										</div>
										<div class="left radio-button-title">
											<span class="tx-green-light left"><span class="tx-yellow"> 1 </span> выпуск </span>
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
								
							</div>
							<div class="clear"></div>
							<div class="layer-second-table-content-center tx-margin-top-6px">
								<div class="layer-third-magazine-icon sprite left tx-margin-right-5px"></div>
								
								<div class="radio-button-container radio-adv-package-2-edition " data-name="packagePaperInterval" >
									<div class="afc-radio-container radio-button-item-container left" data-value="2" data-price="8" >
										<div class="div left radio-button-own">
											<div class="sprite radio-sprite"></div>
										</div>
										<div class="left radio-button-title">
											<span class="tx-green-light left"><span class="tx-yellow"> 4 </span> выпуска </span>
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
								
							</div>
							<div class="clear"></div>
							
						</div>
						<script>
							var package2Price = 0;
							var package2Edition = new RadioController('.radio-adv-package-2-edition', function(el) {
								setPrice();
							}, function(el) {
								setPrice();
							}, function() {
								if (packageChoosed == 3) return true;
							});
						</script>
						<div class="clear"></div>
						<div class="layer-third-table-button">
							<div class="radio-button-container radio-free-adv" data-name="packageType" >
								<div class="afc-radio-container radio-button-item-container left" data-value="3" >
									<div class="div left radio-button-own">
										<div class="sprite radio-sprite"></div>
									</div>
									<div class="left radio-button-title">
										<span>Выбрать - 499 руб.</span>
									</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
					<script>
						var advPackageType = new RadioController('.radio-free-adv', function(el) {
							var val = $(el).attr('data-value');
							packageChoosed = val;
							if (val == 2) {
								package1Options.checkFirst();
								package2Edition.unCheckAll();
								$('#to-newspaper-symbols-count').hide();
							}
							if (val == 3) {
								package2Edition.checkFirst();
								package1Options.unCheckAll();
								$('#to-newspaper-symbols-count').show();
							}
							if (val == 1) {
								package2Edition.unCheckAll();
								package1Options.unCheckAll();
								$('#to-newspaper-symbols-count').hide();
							}
							return true;
						});
						advPackageType.checkFirst();
					</script>
				</div>
				<div class="clear"></div>
				<div class="layer-options-to-account-info tx-margin-top-6px hide" id="to-newspaper-symbols-count">
					<div class="layer-options-to-account-info-count">
						<span class="tx-14">Количество символов сверх нормы: <span class="tx-green-light">{$symCount}</span></span>
					</div>
				</div>
				<div class="bottom-parametrs-buttons tx-margin-top-10px p-relative">
					<div class="bottom-parametrs-buttons-info left">
						<span class=" tx-14">Итого: <span class="tx-green-light"><b id="package-price">0</b> <span id="package-currency">AZN</span></span></span>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			
			<div class="advertisement-pay-button">
				<input type="submit" class="blue-button" name="choose_package" value="Pay" />
			</div>
		</form>
	</div>
	
{/block}