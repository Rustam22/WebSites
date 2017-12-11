{extends file="base.tpl"}

{block name="page-title"}
	:: {$messages.category.list}
{/block}

{block name="content"}
	<div class="view-page-content font16" style="width: 96%;">
		<div class="page-title news-page-title font25">{$messages.category.list}</div>
		
		
		{foreach from=$categories item=c name=category_list}
			{if $smarty.foreach.category_list.index != 0 && $smarty.foreach.category_list.index % 3 == 0}
				<div class="clear hide-in-767"></div>
			{/if}
			{if $smarty.foreach.category_list.index != 0 && $smarty.foreach.category_list.index % 2 == 0}
				<div class="clear show-in-767"></div>
			{/if}
			<div class="clear show-in-479"></div>
			<div class="category-list-item">
				<div class="category-item-image"><a href="{$app_url}/{$currentLang}/category/view/{$c->id->value}"><img src="{$public_url}/{$c->categoryItemImage->value}" /></a></div>
				<div class="category-item-title"><a href="{$app_url}/{$currentLang}/category/view/{$c->id->value}" class="font15">{$c->categoryItemTitle->value} ({$c->objCount})</a></div>
			</div>
		{/foreach}
		
		<div class="clear"></div>
		
		{if count($paginator) > 3}
		<div class="paginator-container">
			<div class="paginator-content">
				{foreach from=$paginator item=p}
					{if $currentPage == $p.key}
						<div class="paginator-item paginator-item-active">
							<span class="font13" >{$p.title}</span>
						</div>
					{else}
						<div class="paginator-item">
							{if isset($p.inactive)}
								<span class="font13" style="color: #000;" >{$p.title}</span>
							{else}
								<a href="{$app_url}/{$currentLang}/category/page/{$p.key}" class="font13" >{$p.title}</a>
							{/if}
						</div>
					{/if}
				{/foreach}
				<div class="clear"></div>
			</div>
		</div>
		{/if}
		
	</div>
	<div class="clear"></div>
{/block}