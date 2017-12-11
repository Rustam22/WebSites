{extends file="base.tpl"}

{block name="page-title"}
	:: {$news->itemTitle->value}
{/block}

{block name="content"}
	<div class="view-page-content font16" style="width: 96%;">
		<div class="page-title font25">{$news->itemTitle->value}</div>
		{$news->content->value}
		<p align="right"><a href="{$app_url}/{$currentLang}/companies" class="font13 color-green" >{$messages.common.all_companies}</a></p>
	</div>
	<div class="clear"></div>
{/block}