{extends file="base.tpl"}

{block name="content"}
	<div class="faq-title print">Axtarış nəticəsi</div>
	{foreach from=$foundData item=d}
		<div class="search-item">
			<a href="{$app_url}/{$d->url->value}">{$d->recordTitle->value}</a>
			<div class="search-item-description">{$d->content->value}</div>
		</div>
	{/foreach}
	
{/block}