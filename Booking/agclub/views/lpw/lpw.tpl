{extends file="base.tpl"}

{block name="page-title"}
	:: {$messages.auth.restore_psw}
{/block}

{block name="content"}
	<div class="view-page-content view-page-content-small font16 relative" style="width: 96%;" >
		<div class="page-title font25">{$messages.auth.restore_psw}</div>
		<p align="center" class="font14 text-color-blue">{if isset($message)}{$message}{/if}</p>
		<div style="width: 60%; margin-left: 20%;">
		<form action="" method="post" class="std-form">
			{$lpw_form}
			<input type="hidden" name="csrf_key" value="{$csrf_key}" class="csrf-key" />
			<p align="center"><input type="submit" name="save_psw" value="{$messages.common.save}" class="std-button" /></p>
		</form>
		</div>
	</div>
	<div class="clear"></div>
{/block}