{extends file="base.tpl"}

{block name="page-title"}
	:: {$messages.profile.title}
{/block}

{block name="content"}
	<div class="view-page-content font16">
		<div class="page-title font25">{$messages.profile.title}</div>
		<form action="{$app_url}/{$currentLang}/profile/save" method="post" enctype="multipart/form-data">
		<div class="profile-page-container">
			<div class="profile-left-side">
				<div class="profile-left-tab font15 profile-left-tab-active">{$messages.profile.private_info}</div>
				<div class="profile-left-tab font15">{$messages.profile.interests}</div>
			</div>
			<div class="profile-right-side">
				<div class="profile-content">
					<div class="profile-field-container">
						<div class="field-title font13">{$messages.common.name}</div>
						<div class="field-own"><input type="text" class="font13" name="name" value="{$user->name->value}" /></div>
						<div class="clear"></div>
					</div>
					<div class="profile-field-container">
						<div class="field-title font13">{$messages.common.surname}</div>
						<div class="field-own"><input type="text" class="font13" name="surName"  value="{$user->surName->value}" /></div>
						<div class="clear"></div>
					</div>
					<div class="profile-field-container">
						<div class="field-title font13">{$messages.profile.photo}</div>
						<div class="field-own">
							<div class="avatar-container">
								<img src="{$public_url}/{$user->avatar->value}" />
							</div>
							<div class="avatar-change">
								<div class="submit-button avatar-select-button" id="avatar-change-button">{$messages.profile.change_photo}</div>
							</div>
							<div class="clear"></div>
							<input type="file" name="avatar" class="hide" id="avatar-input" />
						</div>
						<div class="clear"></div>
					</div>
					<div class="profile-field-container">
						<div class="field-title font13">{$messages.profile.password}</div>
						<div class="field-own"><input type="password" name="password" /></div>
						<div class="clear"></div>
					</div>
					<div class="profile-field-container">
						<div class="field-title font13">{$messages.profile.sex}</div>
						<div class="field-own">
							<div id="profile-sex-select">
								<div class="select-container relative">
									<div class="selected-value-container">
										<div class="selected-value left">{$sexOptions[$user->sex->value]}</div>
										<div class="selected-value-pointer"><img src="{$static_url}/img/select-arrow.png" /></div>
										<div class="clear"></div>
									</div>
									<div class="select-options-container absolute hide">
										{foreach from=$sexOptions key=k item=v}
											<div class="select-option" key="{$k}" >{$v}</div>
										{/foreach}
									</div>
									<input type="hidden" name="sex" value="{$user->sex->value}" />
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="profile-field-container">
						<div class="field-title font13">{$messages.profile.birthday}</div>
						<div class="field-own">
							<div id="date-{$randNum}" class="relative"></div>
							<input type="text" name="birthDay" value="{$user->birthDay->value}" id="input-{$randNum}" />
							<script>
								$('#date-{$randNum}').DatePicker({
									flat: true,
									format:'Y-m-d',
									date: $('#input-{$randNum}').val(),
									current: $('#input-{$randNum}').val(),
									starts: 1,
									position: 'r',
									onBeforeShow: function(){
										$('#input-{$randNum}').DatePickerSetDate($('#input-{$randNum}').val(), true);
									},
									onChange: function(formated, dates){
										$('#input-{$randNum}').val(formated);
										$('.datepickerDays tr td a').mouseup(function(){
											//alert(0);
											$('#date-{$randNum} .datepicker').hide();
										});
									},
								});
								$('#date-{$randNum} .datepicker').hide();
								$('#input-{$randNum}').click(function(){
									$('#date-{$randNum} .datepicker').css({
										'position': 'absolute',
										'z-index': 999,
										'display': 'block',
										'top': '25px'
									});
								});
							</script>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="profile-content hide">
					<div class="color-green">{$messages.common.interest_text}</div>
					{foreach from=$categories item=v key=k name=f_categories}
						{if $smarty.foreach.f_categories.index != 0 && $smarty.foreach.f_categories.index % 2 == 0}
							<div class="clear"></div>
						{/if}
						<div class="profile-interest">
							<div class="checkbox"><input type="checkbox" name="interests[]" value="{$k}" {if in_array($k, $user->interests->value)}checked="checked"{/if} /></div>
							<div class="title">{$v}</div>
							<div class="clear"></div>
						</div>
					{/foreach}
					<div class="clear"></div>
				</div>
				<input type="submit" class="submit-button save-profile" value="{$messages.common.save}" />
			</div>
			<div class="clear"></div>
		</div>
		<input type="hidden" name="csrf_key" value="{$csrf_key}" />
		</form>
	</div>
	<!-- tool for adaptive -->
	<div class="clear show-in-960"></div>
	<!-- tool for adaptive end -->
	<!-- content block -->
	<div class="content-container-item relative hide-in-767" style="width: 20%; margin-left: 2%;">
		<img src="{$static_url}/img/transparent-img.png" class="width100" />
		<div class="text-layer" class="absolute" >
			<div class="text-right">
				<a href="#">
					<img src="{$static_url}/img/horoscope.png" class="horoscope-icon" />
				</a>
			</div>
			<div class="font25">{$messages.horoscope.title}</div>
			<br/>
			
			<div><img src="{$static_url}/img/horoscope-arrow.png" class="horoscope-arrow" /><a href="javascript:void(0);" class="color-green a-rhover font16 show-horoscope" sex="0">{$messages.horoscope.man}</a></div>
			<div><img src="{$static_url}/img/horoscope-arrow.png" class="horoscope-arrow" /><a href="javascript:void(0);" class="color-green a-rhover font16 show-horoscope" sex="1">{$messages.horoscope.woman}</a></div>
		</div>
	</div>
	<!-- content block end -->
	<div class="clear"></div>
{/block}