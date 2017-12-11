{extends file="base.tpl"}

{block name="page-title"}
	:: {$messages.category.list}
{/block}

{block name="content"}
	<div class="view-page-content font16" style="width: 96%;">
		<div class="page-title news-page-title font25">{$messages.category.list}</div>
		
		
		{foreach from=$categories item=c}
			<div class="category-list-item">
				<div class="category-item-image"><a href="{$app_url}/{$currentLang}/category/view/{$c->id->value}"><img src="{$public_url}/{$c->categoryItemImage->value}" /></a></div>
				<div class="category-item-title"><a href="{$app_url}/{$currentLang}/category/view/{$c->id->value}" class="font15">{$c->categoryItemTitle->value}</a></div>
			</div>
		{/foreach}
		
		<div class="clear"></div>
		
	</div>
	<div class="clear"></div>
{/block}