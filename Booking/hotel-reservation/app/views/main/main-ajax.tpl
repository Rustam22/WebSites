{foreach from=$categories item=c name=categories_f}
	{if $smarty.foreach.categories_f.index != 0 && $smarty.foreach.categories_f.index % 4 == 0}
		<div class="clear show-in-960"></div>
	{/if}
	{if $smarty.foreach.categories_f.index != 0 && $smarty.foreach.categories_f.index % 3 == 0}
		<div class="clear show-in-767"></div>
	{/if}
	{if $smarty.foreach.categories_f.index != 0 && $smarty.foreach.categories_f.index % 2 == 0}
		<div class="clear show-in-479"></div>
	{/if}
	<div class="element-container left relative">
		<a href="javascript:loadUrl('{$app_url}/category/view/{$c->id->value}');"><img src="{$static_url}/img/element-bg.png" class="width100" /></a>
		<div class="absolute element-icon category-icon">
			<div class="width100">
				<a href="javascript:loadUrl('{$app_url}/category/view/{$c->id->value}');"><img src="{$public_url}/{$c->categoryItemImage->value}" class="width100" /></a>
			</div>
		</div>
		<div class="element-title">
			<a href="javascript:loadUrl('{$app_url}/category/view/{$c->id->value}');" class="txt-color-dark no-decoration font20 bold">{$c->categoryItemTitle->value}</a>
		</div>
	</div>
{/foreach}
<div class="clear"></div>

<script>
	activateListButton();
</script>