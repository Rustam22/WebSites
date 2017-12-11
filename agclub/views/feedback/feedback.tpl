{extends file="base.tpl"}

{block name="page-title"}
	:: {$messages.feedback.title}
{/block}

{block name="content"}
	<div class="view-page-content font16 view-page-content-small">
		<div class="page-title font25">{$messages.feedback.title}</div>
		<form action="{$app_url}/{$currentLang}/feedback/add" method="post">
			<div class="feedback-container">
				<div class="feedback-error-container">
					{if isset($errors)}
						{foreach from=$errors item=e}
							{if $e != 'csrf_key'}
								{$messages.common[{$e}]} {$messages.common.wrong_filled}<br/>
							{else}
								{$messages.common.csrf_key}<br/>
							{/if}
						{/foreach}
					{/if}
				</div>
				<div class="feedback-success-container">
					{if isset($added)}
						{$messages.feedback.success}
					{/if}
				</div>
				<div class="feedback-field-container">
					<div class="feedback-field-title font15">{$messages.feedback.name}</div>
					<div class="feedback-field-input"><input type="text" class="font13" name="name" value="{if $logged_in}{$logged_in.name}{/if}" /></div>
					<div class="clear"></div>
				</div>
				<!--
				<div class="feedback-field-container">
					<div class="feedback-field-title font13">{$messages.feedback.address}</div>
					<div class="feedback-field-input"><input type="text" class="font13" name="address" /></div>
					<div class="clear"></div>
				</div>
				-->
				<div class="feedback-field-container">
					<div class="feedback-field-title font15">{$messages.feedback.email}</div>
					<div class="feedback-field-input"><input type="text" class="font13" name="email" value="{if $logged_in}{$logged_in.email}{/if}" /></div>
					<div class="clear"></div>
				</div>
				<div class="feedback-field-container">
					<div class="feedback-field-title font15">{$messages.feedback.message}</div>
					<div class="feedback-field-input"><textarea class="font13" name="text"></textarea></div>
					<div class="clear"></div>
				</div>
				<div class="feedback-field-container">
					<div class="feedback-submit-button">
						<input type="submit" name="f_submit" value="{$messages.common.send}" class="submit-button" />
					</div>
				</div>
			</div>
			<input type="hidden" name="csrf_key" class="csrf-key" value="{$csrf_key}" />
		</form>
	</div>
	<!-- tool for adaptive -->
	
	<div class="clear show-in-767"></div>
	<!-- tool for adaptive end -->
	<!-- content block -->
	<div class="content-container-item relative horoscope-content-container hide-in-767" style="width: 20%; margin-left: 2%; visibility: hidden;">
		<img src="{$static_url}/img/transparent-img.png" class="width100 horoscope-carcas" />
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
	<div class="clear show-in-767"></div>
	<div class="clear"></div>
{/block}