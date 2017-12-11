{extends file="base.tpl"}

{block name="page-title"}
	:: {$messages.auth.restore_psw}
{/block}

{block name="content"}
	<div class="view-content-container margin-problem-v">
		<div class="view-content-title-container width100">
			<div class="left view-content-title-pointer"><img src="{$static_url}/img/block-pointer-yellow.gif" /></div>
			<div class="left view-content-title text-color-blue font16"><span>{$messages.auth.restore_psw}</span></div>
			<div class="clear"></div>
		</div>
		<div class="view-content-page-content text-color-blue font14">
			<p align="center" class="font14 text-color-blue">{if isset($message)}{$message}{/if}</p>
			<div style="width: 70%; margin-left: 15%;">
			<form action="" method="post">
				{$lpw_form}
				<input type="hidden" name="csrf_key" value="{$csrf_key}" class="csrf-key" />
				<p align="center"><input type="submit" name="save_psw" value="{$messages.common.save}" class="std-button" /></p>
			</form>
			</div>
		</div>
	</div>
{/block}